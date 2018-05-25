<?php
	include_once(dirname( __FILE__ ) . "/../models/user.php");

	class UserController {

		function __construct() {

        }
        
        public function create($connex, $pseudo, $email, $password) {       
            $req = $connex->prepare("INSERT INTO user (pseudonyme, email, password) VALUES (:pseudonyme, :email, :password)");
            $req->execute(array(
                    "pseudonyme" => $pseudo, 
                    "password" => $password,
                    "email" => $email
                ));

            return $this->login($connex, $email, $password);
            
        }

        public function getById($connex, $id) {
			$sql="SELECT * from user WHERE id = " . id;
			
			$query=$connex->query($sql);
            $result=$query->fetchAll();
            
            $user = new User($result[0]['id'], $result[0]['pseudonyme'], $result[0]['email']);
			
			return $user;
        }

		public function login($connex, $email, $mdp) {
			$sql="SELECT * from user WHERE email LIKE '" . $email . "' AND password LIKE '" . $mdp . "'";
			
			$query=$connex->query($sql);
            $result=$query->fetchAll();
            
            $user = new User($result[0]['id'], $result[0]['pseudonyme'], $result[0]['email']);
			
			return $user;
        }
        
        public function isEmailExists($connex, $email) {
            $sql="SELECT email FROM user WHERE email LIKE '" . $email . "'";

            $query=$connex->query($sql);
            $result=$query->fetchAll();
            
            if ($result != null && sizeof($result) == 1) {
                return true;
            } else {
                return false;
            }
        }

        public function isPseudonymeExists($connex, $pseudo) {
            $sql="SELECT pseudonyme FROM user WHERE pseudonyme LIKE '" . $pseudo . "'";

            $query=$connex->query($sql);
            $result=$query->fetchAll();
            
            if ($result != null && sizeof($result) == 1) {
                return true;
            } else {
                return false;
            }
        }
	}
?>