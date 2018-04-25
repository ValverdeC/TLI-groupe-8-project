<?php
	function Ajouter_Client($connex, $SexeClient,$NomClient,$PrenomClient,$AgeClient,$EmailClient,$Tel,$Rue,$Ville,$LoginClient,$Pass){
		$sql="INSERT INTO LocMoto_CLIENTS(SexeClient,NomClient,PrenomClient,DateNais,EmailClient,Tel,Rue,RefVille,LoginClient,Pass) VALUES('".$SexeClient."','".$NomClient."','".$PrenomClient."','".$AgeClient."','".$EmailClient."','".$Tel."','".$Rue."','".$Ville."','".$LoginClient."','".$Pass."');";
		$result=$connex->query($sql);
		return $result;
	}
	function Ajouter_Moto($connex, $idmodele, $cylindre, $anne, $clientref, $permisref, $reftype, $refetat){
		$sql="INSERT INTO LocMoto_MOTOS ( refmodele, cylindre, annee, refclient, refpermis, reftypemoto, refetatmoto) VALUES ('".$idmodele."','".$cylindre."','".$anne."','".$clientref."','".$permisref."','".$reftype."','".$refetat."') RETURNING idmoto;";
		$result=$connex->query($sql);
		$lire = $result->fetchColumn();
		return $lire;
	}
	function Ajouter_Annonce($connex, $dated, $datef, $prix, $commentaire, $rue, $refville, $refmoto){
		$sql="INSERT INTO LocMoto_ANNONCES(date_a_deb, date_a_fin, prixjour, commentaire, rue, refville, refmoto) VALUES('".$dated."','".$datef."','".$prix."','".$commentaire."','".$rue."','".$refville."','".$refmoto."');";
		$result=$connex->query($sql);
		return $result;
	}
	function Ajouter_Reservation($connex, $dateR_deb, $dateR_fin, $refA, $refEtat, $refCliLoc){
		$sql = "INSERT INTO LocMoto_RESERVATIONS(date_r_deb, date_r_fin, refannonce, refetatreservation, refclientloc) VALUES('".$dateR_deb."','".$dateR_fin."','".$refA."','".$refEtat."','".$refCliLoc."');";
		$result = $connex->query($sql);
		return $result;
	}
	function Ajouter_Marque($connex, $new){
		$sql="INSERT INTO LocMoto_Marques(nommarque) VALUES('".$new."');";
		$result=$connex->query($sql);
		return $result;
	}
	function Ajouter_Permis($connex, $new){
		$sql="INSERT INTO LocMoto_Permis(nompermi) VALUES('".$new."');";
		$result=$connex->query($sql);
		return $result;
	}
	function Ajouter_Modele($connex, $new, $marqueref){
		$sql="INSERT INTO LocMoto_Modele(nommodele, refmarque) VALUES('".$new."', '".$marqueref."');";
		$result=$connex->query($sql);
		return $result;
	}
	
	
	// ###################################### Suppression d'entrée dans la BDD ###################################### //	
	
	function Delete_Annonce($connex, $ida){
		$sql="DELETE FROM LocMoto_annonces WHERE idannonce='".$ida."';";
		$result = $connex->query($sql);
	}
	
	function Delete_Reservation($connex, $ida){
		$sql="DELETE FROM LocMoto_reservations WHERE idreservation='".$ida."';";
		$result = $connex->query($sql);
	}
	
	function Delete_Motos($connex, $ida){
		$sql="DELETE FROM LocMoto_motos WHERE idmoto='".$ida."';";
		$result = $connex->query($sql);
	}
	
	function Delete_Compte($connex, $ida){
		$sql="DELETE FROM LocMoto_Clients WHERE idclient='".$ida."';";
		$result = $connex->query($sql);
	}
	
	function Delete_Permis($connex, $ida){
		$sql="DELETE FROM LocMoto_Permis WHERE idpermi='".$ida."';";
		$result = $connex->query($sql);
	}
	
	function Delete_Marque($connex, $ida){
		$sql="DELETE FROM LocMoto_Marques WHERE idmarque='".$ida."';";
		$result = $connex->query($sql);
	}
	function Delete_Modele($connex, $ida){
		$sql="DELETE FROM LocMoto_Modele WHERE idmodele='".$ida."';";
		$result = $connex->query($sql);
	}
	
	// ###################################### Modification d'entrée dans la BDD ###################################### //
	
	function Update_Reservation($connex, $refetat, $idres){
		$sql="UPDATE LocMoto_RESERVATIONS SET refetatreservation=".$refetat." WHERE idreservation=".$idres.";";
		$result = $connex->query($sql);
		return $result;
	}
	function Update_StatClient($connex, $client, $statut){
		$sql="UPDATE LocMoto_CLIENTS SET admin=".$statut." WHERE idclient=".$client.";";
		$result = $connex->query($sql);
		return $result;
	}
	function Update_Mdp($connex, $cli, $newmdp){
		$sql="UPDATE LocMoto_CLIENTS SET pass='".$newmdp."' WHERE loginclient='".$cli."';";
		$result = $connex->query($sql);
		return $result;
	}
	function Update_Annonce_Etat($connex, $ida, $etat){
		$sql="UPDATE LocMoto_ANNONCES SET etat=".$etat." WHERE idannonce=".$ida.";";
		$result = $connex->query($sql);
		return $result;
	}

	function Update_Annonce_Date($connex, $ida, $dateD, $dateF){
		$sql = "UPDATE LocMoto_ANNONCES SET date_a_deb='".$dateD."', date_a_fin='".$dateF."' WHERE idannonce=".$ida.";";
		$result = $connex->query($sql);
		return $result;
	}
	
	function Update_Client($connex, $mail, $num, $nom_rue, $id_ville, $password, $client){
		$sql = "UPDATE LocMoto_CLIENTS SET emailclient='".$mail."', tel='".$num."', rue='".$nom_rue."', refville='".$id_ville."', pass='".$password."' WHERE idclient='".$client."' ;";
		$result = $connex->query($sql);
		return $result;
	}
		
	// ###################################### V�rification d'entr�e dans la BDD ###################################### //
	
	function Verifier_login($connex, $log){
		$sql="SELECT (loginclient) FROM LocMoto_CLIENTS where loginclient ='".$log."' ;";
		$result=$connex->query($sql);
		return $result;
	}
	function Verifier_email($connex, $ema){
		$sql="SELECT (emailclient) FROM LocMoto_CLIENTS";
		$result=$connex->query($sql);
		return $result;
	}
	
	function Verifiermail_client($connex, $idcli){
		$sql="SELECT emailclient FROM LocMoto_CLIENTS EXCEPT SELECT emailclient FROM LocMoto_CLIENTS WHERE idclient= '".$idcli."'";
		$result=$connex->query($sql);
		return $result;
	}
	
	
	
	// ###################################### //
	
	function Afficher_Ville($connex, $nomville){
		$sql="SELECT nomville FROM LocMoto_VILLES WHERE nomville = '".$nomville."'";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_Clients($connex){
		$sql="SELECT * FROM LocMoto_CLIENTS ORDER BY admin DESC, loginclient ASC ;";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_IdAnnonces_Filtrer($connex, $Date_Debut, $Date_Fin, $refmarque, $refpermis, $reftypemoto, $prixmin, $prixmax, $maxannonces, $offset){ //Affiche les annonces disponibles dans une période par page 
		$sql="SELECT idannonce, datecre FROM LocMoto_ANNONCES 
		INNER JOIN LocMoto_MOTOS ON refmoto=idmoto 
		INNER JOIN LocMoto_MODELE ON refmodele=idmodele 
		WHERE ('".$Date_Debut."' >= date_a_deb AND '".$Date_Debut."' <= date_a_fin AND '".$Date_Fin."' <= date_a_fin AND '".$Date_Fin."' >= date_a_deb ) 
		AND refmarque=".$refmarque." 
		AND refpermis=".$refpermis." 
		AND reftypemoto=".$reftypemoto." 
		AND ".$prixmin."<prixjour 
		AND prixjour<".$prixmax." 
		EXCEPT
		(SELECT IdAnnonce, datecre FROM LocMoto_ANNONCES 
		INNER JOIN LocMoto_RESERVATIONS ON refannonce=idannonce 
		WHERE ((date_r_deb <= '".$Date_Debut."' AND date_r_fin >= '".$Date_Fin."') 
		OR (date_r_deb <= '".$Date_Debut."' AND date_r_fin >= '".$Date_Debut."') 
		OR (date_r_deb >= '".$Date_Debut."' AND date_r_fin <= '".$Date_Fin."') 
		OR (date_r_deb <= '".$Date_Fin."' AND date_r_fin >= '".$Date_Fin."') 
		AND refetatreservation = '1' ))
		ORDER BY datecre DESC
		LIMIT ".$maxannonces." OFFSET ".$offset.";";
		
		//NB : Requete trop longue pour le serveur si elle est en ligne 
		
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_IdAnnonces_Filtrer_Tout($connex, $Date_Debut, $Date_Fin, $refmarque, $refpermis, $reftypemoto, $prixmin, $prixmax){ //Affiche toutes les annonces disponibles dans une période
		$sql="SELECT idannonce FROM LocMoto_ANNONCES 
		INNER JOIN LocMoto_MOTOS ON refmoto=idmoto 
		INNER JOIN LocMoto_MODELE ON refmodele=idmodele 
		WHERE ('".$Date_Debut."' >= date_a_deb AND '".$Date_Debut."' <= date_a_fin AND '".$Date_Fin."' <= date_a_fin AND '".$Date_Fin."' >= date_a_deb ) 
		AND refmarque=".$refmarque." 
		AND refpermis=".$refpermis." 
		AND reftypemoto=".$reftypemoto." 
		AND ".$prixmin."<prixjour 
		AND prixjour<".$prixmax." 
		EXCEPT
		(SELECT IdAnnonce FROM LocMoto_ANNONCES 
		INNER JOIN LocMoto_RESERVATIONS ON refannonce=idannonce 
		WHERE ((date_r_deb <= '".$Date_Debut."' AND date_r_fin >= '".$Date_Fin."') 
		OR (date_r_deb <= '".$Date_Debut."' AND date_r_fin >= '".$Date_Debut."') 
		OR (date_r_deb >= '".$Date_Debut."' AND date_r_fin <= '".$Date_Fin."') 
		OR (date_r_deb <= '".$Date_Fin."' AND date_r_fin >= '".$Date_Fin."') 
		AND refetatreservation = '1' ))";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_Annonces_max($connex){ //Afficher tous les idannonces
		$sql="SELECT Idannonce FROM LocMoto_ANNONCES;";
		$result = $connex->query($sql);
		return $result;
	}
	function Afficher_Annonce($connex, $ida){ //Affiche UNE annonce (selon son ID)
		$sql="SELECT * FROM LocMoto_ANNONCES INNER JOIN LocMoto_motos ON refmoto=idmoto INNER JOIN LocMoto_modele ON refmodele=idmodele INNER JOIN LocMoto_marques ON refmarque=idmarque INNER JOIN LocMoto_villes ON refville=idville INNER JOIN LocMoto_typesmotos ON reftypemoto = idtypemoto INNER JOIN LocMoto_permis ON refpermis = idpermi INNER JOIN LocMoto_etatsmotos ON refetatmoto = idetatmoto INNER JOIN LocMoto_clients ON refclient = idclient WHERE idannonce=".$ida.";";
		$result = $connex->query($sql);
		return $result;
	}
	function Afficher_Annonces_min($connex, $nbvaleurs, $offset){ // Afficher un certain nombre d'annonces
		$sql="SELECT * FROM LocMoto_ANNONCES INNER JOIN LocMoto_motos ON refmoto=idmoto INNER JOIN LocMoto_modele ON refmodele=idmodele INNER JOIN LocMoto_marques ON refmarque=idmarque INNER JOIN LocMoto_villes ON refville=idville ORDER BY datecre DESC LIMIT ".$nbvaleurs." OFFSET ".$offset.";";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_AnnonceClient($connex, $idclient){ //Affiche toutes les annonces d'UN client
		$sql="SELECT * FROM LocMoto_ANNONCES INNER JOIN LocMoto_motos ON refmoto=idmoto INNER JOIN LocMoto_modele ON refmodele=idmodele INNER JOIN LocMoto_marques ON refmarque=idmarque INNER JOIN LocMoto_villes ON refville=idville WHERE refclient = ".$idclient.";";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_AnnoncesClient_min($connex, $idclient,$nbvaleur,$offset){ //Affiche une partie des annonces d'un client
		$sql="SELECT * FROM LocMoto_ANNONCES INNER JOIN LocMoto_motos ON refmoto=idmoto INNER JOIN LocMoto_modele ON refmodele=idmodele INNER JOIN LocMoto_marques ON refmarque=idmarque INNER JOIN LocMoto_villes ON refville=idville WHERE refclient = ".$idclient." LIMIT ".$nbvaleur." OFFSET ".$offset.";";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_Villes($connex){
		$sql="SELECT nomville, IdVille FROM LocMoto_VILLES ORDER BY nomville";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_Modele($connex, $idmoto) {
		$sql="SELECT * FROM LocMoto_MOTOS INNER JOIN LocMoto_modele ON refmodele=idmodele WHERE Idmoto='".$idmoto."';";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_MotoClient_max($connex, $idclient){
		$sql="SELECT idmoto, cylindre, nommodele, nommarque FROM LocMoto_MOTOS INNER JOIN LocMoto_modele ON refmodele=idmodele INNER JOIN LocMoto_marques ON refmarque=idmarque WHERE refclient= ".$idclient." ;";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_MotoClient_min($connex, $idclient, $nbmoto, $offset){
		$sql="SELECT idmoto, cylindre, nommodele, nommarque FROM LocMoto_MOTOS INNER JOIN LocMoto_modele ON refmodele=idmodele INNER JOIN LocMoto_marques ON refmarque=idmarque WHERE refclient= ".$idclient." LIMIT '".$nbmoto."' OFFSET '".$offset."';";
		$result=$connex->query($sql);
		return $result;
	}
	function Afficher_ResClient($connex, $ida){
		$sql = "SELECT idreservation, refetatreservation, loginclient, date_r_deb, date_r_fin FROM LocMoto_RESERVATIONS INNER JOIN LocMoto_CLIENTS ON idclient=refclientloc INNER JOIN LocMoto_ANNONCES ON idannonce=refannonce WHERE refannonce=".$ida.";";
		$result = $connex->query($sql);
		return $result;
	}
	function Afficher_Res($connex, $idres){
		$sql = "SELECT * FROM LocMoto_RESERVATIONS WHERE idreservation=".$idres.";";
		$result = $connex->query($sql);
		return $result;
	}
	function Afficher_reservation($connex, $ida){
		$sql = "SELECT * FROM LocMoto_RESERVATIONS INNER JOIN LocMoto_etatsreservations ON idetatreservation=refetatreservation INNER JOIN LocMoto_ANNONCES ON idannonce=refannonce WHERE refclientloc=".$ida.";";
		$result = $connex->query($sql);
		return $result;
	}
	
	function lister_villes($connex, $ida){
		$sql = "SELECT * FROM `LocMoto_VILLES` WHERE cp = ".$ida." ORDER BY nomville ASC;";
		$result = $connex->query($sql);
		return $result;
	}
	function lister_modeles($connex, $ida){
		$sql = "SELECT * FROM locmoto_MODELE WHERE refmarque = ". $ida ." ORDER BY nommodele ASC";
		$result = $connex->query($sql);
		return $result;
	}
	
	// ###################################### //
	
	function InfosClients($connex, $login){
		$sql="SELECT * FROM LocMoto_CLIENTS WHERE loginclient='".$login."';";
		$result=$connex->query($sql);
		return $result;
	}
	function NbMotos_Client($connex, $login){
		$sql="SELECT COUNT(*) FROM LocMoto_MOTOS WHERE refclient='".$login."';";
		$result=$connex->query($sql);
		return $result;
	}
	function NbAnnonces_Client($connex, $login){
		$sql="SELECT COUNT(*) FROM LocMoto_Annonces inner join LocMoto_MOTOS ON refmoto=idmoto WHERE refclient='".$login."';";
		$result=$connex->query($sql);
		return $result;
	}
	function NbRes_Client($connex, $login){
		$sql="SELECT COUNT(*) FROM LocMoto_RESERVATIONS WHERE refclientloc='".$login."';";
		$result=$connex->query($sql);
		return $result;
	}
	function CompteClients($connex, $idc){
		$sql="SELECT * FROM LocMoto_CLIENTS inner join LocMoto_VILLES ON refville = idville WHERE idclient='".$idc."';";
		$result=$connex->query($sql);
		return $result;
	}
	function InfosMarques($connex){
		$sql="SELECT * FROM LocMoto_MARQUES ORDER BY nommarque;";
		$result=$connex->query($sql);
		return $result;
	}
	function InfosPermis($connex){
		$sql="SELECT * FROM LocMoto_PERMIS ORDER BY nompermi;";
		$result=$connex->query($sql);
		return $result;
	}
	function InfosEtatsMotos($connex){
		$sql="SELECT * FROM LocMoto_EtatsMotos;";
		$result=$connex->query($sql);
		return $result;
	}
	function InfosTypesMotos($connex){
		$sql="SELECT * FROM LocMoto_TypesMotos;";
		$result=$connex->query($sql);
		return $result;
	}
	function NbClients($connex){
		$sql="SELECT count(idclient) FROM locMoto_CLIENTS;";
		$result=$connex->query($sql);
		return $result;
	}
	function NbMotos($connex){
		$sql="SELECT count(idmoto) FROM locMoto_MOTOS;";
		$result=$connex->query($sql);
		return $result;
	}
	function NbAnnonces($connex){
		$sql="SELECT count(idannonce) FROM locMoto_ANNONCES where etat=0;";
		$result=$connex->query($sql);
		return $result;
	}
	function LastUser($connex){
		$sql="Select * FROM locMoto_CLIENTS ORDER BY datecreation DESC LIMIT 1;";
		$result=$connex->query($sql);
		return $result;
	}
	function Birthday($connex){
		$sql="SELECT * FROM locmoto_CLIENTS WHERE Datenais=CURRENT_DATE;";
		$result=$connex->query($sql);
		return $result;
	}
	
	// ###################################### FONCTIONS AUTRES NON LIES A LA BDD ###################################### //
	
	function age($date)
	{
	  $d = strtotime($date);
	  return (int) ((time() - $d) / 3600 / 24 / 365.242);
	}
	// ###################################### FONCTIONS ENVOYE MAIL ###################################### //
	function new_mail($mail, $sujet, $message){
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}
		//=====Déclaration des messages au format texte et au format HTML.
		$message_txt = $message;
		$message_html = "<html><head><meta charset='UTF-8'/></head><body>".$message."</body></html>";
		//==========
		 
		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		 

		//=====Création du header de l'e-mail.
		$header = "From: \"LocaMoto\"<locamoto74@gmail.com>".$passage_ligne;
		$header.= "Reply-to: \"LocaMoto\"<locamoto74@gmail.com>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		 
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
		 
		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message,$header);
		//==========	
	}
?>