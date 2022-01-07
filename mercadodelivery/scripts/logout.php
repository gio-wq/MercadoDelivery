<?php
	session_start(); 
	require('bdconexion.php');

	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header('location:\mercadodelivery/login.html');
	}
	session_destroy();
	header("location: \mercadodelivery/login.html"); 
?>