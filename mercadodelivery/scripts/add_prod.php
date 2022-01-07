<?php
	require('bdconexion.php');

	session_start(); 

	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header('location:\mercadodelivery/login.html');
	}

	$prod_id = $_GET['prod'];
	/*VERIFICA SE O PRODUTO JÁ ESTÁ NO CARRINHO*/
	if(in_array($prod_id, $_SESSION['carrinho'])){
		header('location:\mercadodelivery/scripts/area_cliente.php');
	}else{
		$_SESSION['carrinho'][] = $prod_id;
		echo '<script>history.back();</script>';
	}
?>