<?php

    require("smarty/smarty.class.php"); // On inclut la classe Smarty
    $smarty = new Smarty();

    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $dbname = "acuponcture";

    // Create connection
    $connexion = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($connexion->connect_error) {
        die("Connection failed: " . $connexion->connect_error);
    }

    $query = $connexion->prepare("SELECT * FROM symptome where idS = 1");
    $query->execute();

    $list = array();
    $i = 0;
    /*while($data = $query->fetch()){
        $list[$i]['code'] = $data['code'];
        $list[$i]['nom'] = $data['nom'];
        $list[$i]['element'] = $data['element'];
        $list[$i]['yin'] = $data['yin'];
        $i++;
    }*/

    $data = 'toto';

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
    $smarty->assign('data', $data);
    //$smarty->display("src/app/pages/home/home.html");
    $smarty->display($template);

    /*class Router {

        private $url;
        private $routes = [];
        private $namedRoutes = [];

        public function __construct($url){
            $this->url = $url;
        }

        public function get($path, $callable, $name = null){
            return $this->add($path, $callable, $name, 'GET');
        }

        public function post($path, $callable, $name = null){
            return $this->add($path, $callable, $name, 'POST');
        }

        private function add($path, $callable, $name, $method){
            $route = new Route($path, $callable);
            $this->routes[$method][] = $route;
            if(is_string($callable) && $name === null){
                $name = $callable;
            }
            if($name){
                $this->namedRoutes[$name] = $route;
            }
            return $route;
        }

        public function run(){
            if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
                throw new RouterException('REQUEST_METHOD does not exist');
            }
            foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
                if($route->match($this->url)){
                    return $route->call();
                }
            }
            throw new RouterException('No matching routes');
        }

        public function url($name, $params = []){
            if(!isset($this->namedRoutes[$name])){
                throw new RouterException('No route matches this name');
            }
            return $this->namedRoutes[$name]->getUrl($params);
        }

    }*/
?>