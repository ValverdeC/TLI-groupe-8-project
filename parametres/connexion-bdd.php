<?php 
	function Connexion_BDD(){
		include 'parametre-connexion.php';
		try {
			$connex = new PDO($dsn, $user, $mdp); // tentative de connexion
			// print('Connecté :D');
	
		} catch (PDOException $e) {
			print "Erreur de connexion à la base de données ! : " . $e->getMessage();
			die(); // Arret du script - sortie.
		}
		return $connex;
	}
	
	function Deconnexion_BDD($connex){
		$connex = null;
	}
?>