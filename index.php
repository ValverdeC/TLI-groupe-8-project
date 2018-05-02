<?php

    require("smarty/Smarty.class.php"); // On inclut la classe Smarty
    require_once './parametres/connexion-bdd.php'; // Fonction de connexion à la BDD
    require_once './parametres/fonctions-bdd.php'; // Fonctions de requetes SQL
    $smarty = new Smarty();

    $conn1=Connexion_BDD();
    $result = Afficher_Meridien($conn1)->fetchAll();
    Deconnexion_BDD($conn1);

    // https://stackoverflow.com/questions/14917599/best-way-to-use-multiple-pages-on-smarty?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    $headerBar = "src/app/pages/header-bar/header-bar.html";
    $footer = "src/app/pages/footer/footer.html";
    $smarty->display($headerBar);
    if(empty($_GET["page"])) {
        $template="src/app/pages/home/home.html";
        $smarty->assign('list', $result);
    }else {
        $page = $_GET["page"];
        switch ($page) {
            case "home":
                $template="src/app/pages/home/home.html";
                $smarty->assign('list', $result);
                break;
            case "symptoms":
                $template="src/app/pages/symptoms/symptoms.html";
                break;
            default:
                $template="404.tpl";
                break;
        }
    }
    $smarty->display($template);
    $smarty->display($footer);
?>