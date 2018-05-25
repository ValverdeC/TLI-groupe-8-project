<?php
    session_start(); 
    if (isset($_GET["pseudonyme"]) && isset($_GET["email"]) && isset($_GET["password"])) {
		if (!empty($_GET["pseudonyme"]) && !empty($_GET["email"]) && !empty($_GET["password"])) {
            require_once '../controllers/user-controller.php';
            require_once '../../../parametres/connexion-bdd.php'; // Fonction de connexion à la BDD
            $UserController = new UserController();

            $connex=Connexion_BDD();
                        
            if ($UserController->isEmailExists($connex, $_GET["email"])) {
                if ($UserController->isPseudonymeExists($connex, $_GET["pseudonyme"])) {
                    echo "emailAndPseudoAlreadyExist";
                }
                else {
                    echo "emailAlreadyExist";
                }
            } else{
                if ($UserController->isPseudonymeExists($connex, $_GET["pseudonyme"])) {
                    echo "PseudoAlreadyExist";
                } else{
                    /*$User = new User(NULL, $_GET["pseudonyme"], $_GET["email"], $_GET["password"]);
                    $UserController->createUser($User);*/
                    echo "userCreated";
                }
            }
		} else {
			echo false;
		}
	} else {
        echo false;
    }

    Deconnexion_BDD($connex);
?>