<?php
    session_start(); 
    if (isset($_GET["pseudonyme"]) && isset($_GET["email"]) && isset($_GET["password"])) {
        $pseudo = $_GET["pseudonyme"];
        $email = $_GET["email"];
        $pwd = $_GET["password"];
		if (!empty($pseudo) && !empty($email) && !empty($pwd)) {
            require_once '../controllers/user-controller.php';
            require_once '../../../parametres/connexion-bdd.php'; // Fonction de connexion à la BDD
            $UserController = new UserController();

            $connex=Connexion_BDD();
                        
            if ($UserController->isEmailExists($connex, $email)) {
                if ($UserController->isPseudonymeExists($connex, $pseudo)) {
                    echo "emailPseudoUsed";
                }
                else {
                    echo "emailUsed";
                }
            } else{
                if ($UserController->isPseudonymeExists($connex, $pseudo)) {
                    echo "PseudoUsed";
                } else{
                    $user = $UserController->create($connex, $pseudo, $email, $pwd);

                    $_SESSION["IsSessionOpen"] = true;
                    $_SESSION["User"] = $user;
                    
                    echo $user->toString();
                }
            }

            Deconnexion_BDD($connex);
		} else {
			echo "emptyFields";
		}
	} else {
        echo "false";
    }
?>