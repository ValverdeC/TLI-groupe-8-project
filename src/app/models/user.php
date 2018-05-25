<?php
	class User {
		var $id = -1;
        var $name = "";
        var $email = "";
		
		function __construct($id, $name, $email) {
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
        }
		
		function getId() {
			return $this->id;
		}
		
		function getName() {
			return $this->name;
		}
		
		function getEmail() {
			return $this->email;
		}
	}
?>
