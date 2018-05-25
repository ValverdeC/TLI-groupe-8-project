<?php
	include_once(dirname( __FILE__ ) . "/../models/user.php");

	class UserController {

		function __construct() {

		}

		public function login($connex, $email, $mdp) {
			$sql="SELECT * from user WHERE email LIKE '" . $email . "'";
			
			$query=$connex->query($sql);
            $result=$query->fetchAll();
            
            $user = new User($result['id'], $result['pseudonyme'], $result[$i]['email']);
			
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