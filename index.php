<?php

    require("smarty/Smarty.class.php"); // On inclut la classe Smarty
    $smarty = new Smarty();

    $servername = "172.17.0.3";
    $username = "acu_www_RW";
    $password = "kDMcbcUDi6rEqzBY";
    $dbname = "acu";

    $list = array();
    
    try
    {
        $dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname.'', $username, $password);
        $dbh->beginTransaction();

        $query = "SELECT * FROM meridien";

        $list = $dbh->query($query);
    }
    catch (Exception $e)
    {
        echo "Unable to connect: " . $e->getMessage() ."<p>";
    }

    // https://stackoverflow.com/questions/14917599/best-way-to-use-multiple-pages-on-smarty?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    $headerBar = "src/app/pages/header-bar/header-bar.html";
    $footer = "src/app/pages/footer/footer.html";
    $smarty->display($headerBar);
    if(empty($_GET["page"])) {
        $template="src/app/pages/home/home.html";
        $smarty->assign('list', $list);
    }else {
        $page = $_GET["page"];
        switch ($page) {
            case "home":
                $template="src/app/pages/home/home.html";
                $smarty->assign('list', $list);
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