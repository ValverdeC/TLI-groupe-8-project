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

	function Ajouter_Membre($connex, $nom, $prenom, $email, $pass){
		$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

		$sql = "INSERT INTO membre(nom, prenom, email, pass_hache) VALUES ('".$nom."','".$prenom."','".$email."','".$pass_hache."')";
		$result=$connex->$query($sql);
		return $result;
	}
?>