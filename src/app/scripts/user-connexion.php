<?php
    session_start(); 
    if (isset($_GET["email"]) && isset($_GET["password"])) {
        $email = $_GET["email"];
        $pwd = $_GET["password"];
		if (!empty($email) && !empty($pwd)) {
            require_once '../controllers/user-controller.php';
            require_once '../../../parametres/connexion-bdd.php'; // Fonction de connexion à la BDD
            $UserController = new UserController();

            $connex=Connexion_BDD();
            
            $user = $UserController->login($connex, $email, $pwd);
            
            if ($user) {

                $_SESSION["IsSessionOpen"] = true;
                $_SESSION["User"] = $user;
                
                echo "true";
            } else{
                echo "Login/Mot de Passe incorrects";
            }

            Deconnexion_BDD($connex);
		} else {
			echo "Merci de compléter tous les champs";
		}
	} else {
        echo "false";
    }
?>