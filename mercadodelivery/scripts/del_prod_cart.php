<?php
	session_start();
	$prod = $_GET['id'];
	$carrinho_array = $_SESSION['carrinho'];
	$prod_del = array_search("$prod", $carrinho_array);

	if($prod_del !== false){
		unset($_SESSION['carrinho'][$prod_del]);
		ksort($_SESSION['carrinho']);
	}
	header('location: area_cliente.php');
?>
