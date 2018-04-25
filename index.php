<?php

    require("smarty/smarty.class.php"); // On inclut la classe Smarty
    $smarty = new Smarty();

    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $dbname = "acuponcture";

    $list = array();
    
    try
    {
        $dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname.'', $username, $password);
        $dbh->beginTransaction();

        $query = "SELECT * FROM meridien";

        $dbh->query($query);

        $i = 0;
        foreach ($dbh->query($query) as $row)
        {
            $list[$i]['code'] = $row['code'];
            $list[$i]['nom'] = $row['nom'];
            $list[$i]['element'] = $row['element'];
            $list[$i]['yin'] = $row['yin'];
            $i++;
        }
    }
    catch (Exception $e)
    {
        echo "Unable to connect: " . $e->getMessage() ."<p>";
    }

    // https://stackoverflow.com/questions/14917599/best-way-to-use-multiple-pages-on-smarty?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    if(empty($_GET["page"])) {
        $template="src/app/pages/home/home.html";
        $smarty->assign('pagename', ' - Home');
    }else {
        $page = $_GET["page"];
        switch ($page) {
            case "home":
                $template="src/app/pages/home/home.html";
                $smarty->assign('pagename', ' - Home');
                break;
            case "symptoms":
                $template="src/app/pages/symptoms/symptoms.html";
                $smarty->assign('pagename', ' - Symptomes');
                break;
            default:
                $template="404.tpl";
                break;
        }
    }
    $smarty->assign('list', $list);
    $smarty->display($template);
?>