<?php
	class Symptoms {
		var $id = -1;
		var $description = "";
		
		function __construct($id, $description) {
			$this->id = $id;
			$this->description = $description;
        }
		
		function getId() {
			return $this->id;
		}
		
		function getDesc() {
			return $this->description;
		}
	}
?>
