<?php
	class Pathology {
		var $id = -1;
		var $meridien = "";
		var $type = "";
		var $description = "";
		var $symptoms = array();
		
		function __construct($id, $meridien, $type, $description) {
			$this->id = $id;
			$this->meridien = $meridien;
			$this->type = $type;
			$this->description = $description;
        }
		
		function getId() {
			return $this->id;
		}
		
		function getMer() {
			return $this->meridien;
		}
		
		function getType() {
			return $this->type;
		}
		
		function getDesc() {
			return $this->description;
		}

		function getSymptoms() {
			return $this->symptoms;
		}

		function setSymptoms($symptoms) {
			$this->symptoms = $symptoms;
		}
	}
?>
