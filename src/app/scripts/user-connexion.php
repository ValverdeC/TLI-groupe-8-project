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

                $_SESSION["SessionIsOpen"] = true;
                $_SESSION["User"] = $user;
                
                echo "true";
            } else{
                echo "false";
            }
		} else {
			echo "false";
		}
	} else {
        echo "false";
    }

    Deconnexion_BDD($connex);
?>