<?php
	include_once(dirname( __FILE__ ) . "/../models/pathology.php");
	include_once(dirname( __FILE__ ) . "/../models/symptoms.php");

	class PathoController {

		function __construct() {

		}

		public function getAllPatho($connex) {
			$sql="SELECT idP as id, mer as meridien, type, patho.desc as description from patho";
			
			$query=$connex->query($sql);
			$result=$query->fetchAll();

			$arrayPatho = array();
			for ($i = 0; $i < sizeof($result); $i++) {
				$patho = new Pathology($result[$i]['id'], $result[$i]['meridien'], $result[$i]['type'], $result[$i]['description']);
				$patho->setSymptoms($this->getAllSymptomsByPathoId($connex, $patho->getId()));
				array_push($arrayPatho, $patho);
			}
			
			return $arrayPatho;
		}

		public function getPathoByType($connex, $types) {
			$sql="SELECT idP as id, mer as meridien, type, patho.desc as description from patho where ";

			for($i = 0; $i < count($types); ++$i) {
				$sql .= " type like '" . $types[$i] . "%'";
				if ($i < count($types) - 1) {
					$sql .= " or";
				}
			}
			
			$query=$connex->query($sql);
			$result=$query->fetchAll();

			$arrayPatho = array();
			for ($i = 0; $i < sizeof($result); $i++) {
				$patho = new Pathology($result[$i]['id'], $result[$i]['meridien'], $result[$i]['type'], $result[$i]['description']);
				$patho->setSymptoms($this->getAllSymptomsByPathoId($connex, $patho->getId()));
				array_push($arrayPatho, $patho);
			}
			
			return $arrayPatho;
		}

		public function getAllSymptomsByPathoId($connex, $idPatho) {
			$sql="SELECT symptome.idS as id, symptome.desc as description FROM symptpatho LEFT JOIN symptome ON symptome.idS = symptpatho.idS WHERE idP = $idPatho";

			$query=$connex->query($sql);
			$result=$query->fetchAll();

			$arraySymptoms = array();
			for ($i = 0; $i < sizeof($result); $i++) {
				$symptoms = new Symptoms($result[$i]['id'], $result[$i]['description']);
				array_push($arraySymptoms, $symptoms);
			}
			
			return $arraySymptoms;
		}
	}
?>