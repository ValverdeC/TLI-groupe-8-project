<?php
	function Ajouter_Client($connex, $SexeClient,$NomClient,$PrenomClient,$AgeClient,$EmailClient,$Tel,$Rue,$Ville,$LoginClient,$Pass){
		$sql="INSERT INTO LocMoto_CLIENTS(SexeClient,NomClient,PrenomClient,DateNais,EmailClient,Tel,Rue,RefVille,LoginClient,Pass) VALUES('".$SexeClient."','".$NomClient."','".$PrenomClient."','".$AgeClient."','".$EmailClient."','".$Tel."','".$Rue."','".$Ville."','".$LoginClient."','".$Pass."');";
		$result=$connex->query($sql);
		return $result;
	}

	function Afficher_Meridien($connex){
		$sql="SELECT * FROM meridien";
		$result=$connex->query($sql);
		return $result;
	}

	function getPathologies($connex){
		$sql="SELECT mer as meridien, type, patho.desc as pathologie from patho";
		$result=$connex->query($sql);
		return $result;
	}
	
	function search()
		$sql="SELECT symptome.desc FROM `symptome`
inner join keySympt on keySympt.idS = symptome.idS
INNER JOIN keywords on keywords.idK = keySympt.idK
WHERE keywords.name = 'aine'"

?>