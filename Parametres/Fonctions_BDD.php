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

?>