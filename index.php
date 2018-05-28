<?php

    include_once('./src/app/models/user.php');

    session_start();
    
    require("smarty/Smarty.class.php"); // On inclut la classe Smarty
    require_once './parametres/connexion-bdd.php'; // Fonction de connexion à la BDD
    require_once 'src/app/controllers/pathology-controller.php'; // Fonctions de requetes SQL
    $smarty = new Smarty();

    $conn1=Connexion_BDD();
    
    if (isset($_SESSION["User"]) && isset($_SESSION["IsSessionOpen"])) {
		if (!empty($_SESSION["User"]) && $_SESSION["IsSessionOpen"] == true) {
			$smarty->assign(array(
				'userSession' => $_SESSION["User"]
			));
		}
	}
    // https://stackoverflow.com/questions/14917599/best-way-to-use-multiple-pages-on-smarty?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    $headerBar = "src/app/pages/header-bar/header-bar.html";
    $footer = "src/app/pages/footer/footer.tpl";
    if(empty($_GET["page"])) {
        $template="src/app/pages/home/home.html";
    } else {
        $page = $_GET["page"];
        switch ($page) {
            case "home":
                $template="src/app/pages/home/home.html";
                break;
            case "pathologies":
                $template="src/app/pages/pathologies/pathologies.html";
                break;
            case "pathoList":
                $template="src/app/pages/pathologies/table/patho-list-table.html";

                if (isset($_GET["type"])) {
                    $type = $_GET["type"];

                    $PathoController = new PathoController();
                    $allPatho = $PathoController->getPathoByType($conn1, $type);

                    $smarty->assign(array(
                        'pathologies' => $allPatho
                    ));
                } else {
                    $PathoController = new PathoController();
                    $allPatho = $PathoController->getAllPatho($conn1);

                    $smarty->assign(array(
                        'pathologies' => $allPatho
                    ));
                }

                echo $smarty->fetch($template);
                die();
                break;
            case "symptomsList":
                $template="src/app/pages/pathologies/table/symptoms-list-table.html";

                if (isset($_GET["idPatho"])) {
                    $idPatho = $_GET["idPatho"];

                    $PathoController = new PathoController();
                    $allSymptoms = $PathoController->getAllSymptomsByPathoId($conn1, $idPatho);

                    $smarty->assign(array(
                        'symptoms' => $allSymptoms
                    ));
                }

                echo $smarty->fetch($template);
                die();
                break;
            case "pathologiesAll":
                $template="src/app/pages/pathologies/pathologies-all.html";
                echo $smarty->fetch($template);
                die();
                break;
            case "pathologiesFiltered":
                $template="src/app/pages/pathologies/pathologies-filtered.html";

                $PathoController = new PathoController();
                $allTypes = $PathoController->getAllPathoTypes($conn1);
                $allMeridien = $PathoController->getAllMeridien($conn1);

                $smarty->assign('types', $allTypes);
                $smarty->assign('meridiens', $allMeridien);
                
                echo $smarty->fetch($template);
                die();
                break;
            default:
                $template="src/app/pages/404.tpl";
                break;
        }
    }
    $smarty->display($headerBar);
    $smarty->display($template);
    $smarty->display($footer);

    Deconnexion_BDD($conn1);
    ?>