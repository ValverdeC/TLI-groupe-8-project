<?php 
	function Connexion_BDD(){
		include 'ParametreConnexion.php';
		try {
			$connex = new PDO($dsn, $user, $mdp); // tentative de connexion
			// print('Connect� :D');
	
		} catch (PDOException $e) {
			print "Erreur de connexion � la base de donn�es ! : " . $e->getMessage();
			die(); // Arr�t du script - sortie.
		}
		return $connex;
	}
	
	function Deconnexion_BDD($connex){
		$connex = null;
	}
?>
