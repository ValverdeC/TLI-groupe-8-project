<?php
	session_start(); 

	unset($_SESSION["IsSessionOpen"]);
	unset($_SESSION["User"]);

	echo "true";

	session_destroy();
?>
