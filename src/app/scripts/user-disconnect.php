<?php
	session_start(); 

	unset($_SESSION["SessionIsOpen"]);
	unset($_SESSION["User"]);

	echo "true";

	session_destroy();
?>
