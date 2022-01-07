<!DOCTYPE html>
<html>
<head>
	<title>MercadoDelivery</title>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="\mercadodelivery/css/index-style.css"/>
	<meta charset="UTF-8"/>
	<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet"> 
<script type="text/javascript">
	function slide1(){
		document.getElementById('id').src="imagens/cuidado.jpg";
		setTimeout("slide2()", 1000)
	}

	function slide2(){
		document.getElementById('id').src="imagens/bebidas.jpg";
		setTimeout("slide3()", 1000)
	}

	function slide3(){
		document.getElementById('id').src="imagens/alimentos.jpg";
		setTimeout("slide1()", 1000)
	}
</script> 
</head>
<body onLoad="slide1()">
	<a href="index.php">
	<figure><img src='imagens/logo.png' id='logo' width='120'/></figure>
	<figcaption><h1 id='titulo'>Mercado</h1></figcaption></a>
<nav class="menu">
	<ul>
		<li>
			<h3 id='menu'><a href='\mercadodelivery/scripts/catalogo.php'/>Categorias</a></h3> 
			 <ul>
                <li><a href="\mercadodelivery/scripts/catalogo1.php">Alimentos</a></li>
                <li><a href="\mercadodelivery/scripts/catalogo2.php">Bebidas</a></li>
                <li><a href="\mercadodelivery/scripts/catalogo3.php">Limpeza</a></li>
                <li><a href="\mercadodelivery/scripts/catalogo4.php">Higiene</a></li>

            </ul>        
		</li>
		
		<?php
		session_start(); 

		if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
			unset($_SESSION['email']);
			unset($_SESSION['senha']);
			echo "<li>
				<h3><a href='\mercadodelivery/login.html'>Login</a></h3>
			</li>";
		}else{
			echo "<li>
			<h3><a href='\mercadodelivery/scripts/area_cliente.php'>Área de Usuário</a></h3>
			</li>";
		}
		?>
		<li>
			<h3><a href='\mercadodelivery/cadastro.html'>Cadastro</a></h3>
		</li>
		
	</ul>
	</nav>
	<div id="texto1">	<img src='\mercadodelivery/imagens/4043.jpg' id='background-img'>

		<center>
			<p id='linha1'><mark>Que tal fazer suas</mark></br><br>
			<p id='linha2'><mark>compras sem sair</mark></br><br>
			<p id='linha3'><mark>de casa ?</mark></br>
		</center> 
</div>
	<div id='container1'>
			<section class='flex-item'>
			<h2>Como Funciona?</h2>
			<p id='texto_1'>Explore nossos catálogos de produtos, adicione-os no carrinho e monte sua lista de compras.<br> Ao terminar, marque sua entrega e receba no conforto da sua casa!</p>
			<img src='\mercadodelivery/imagens/3238048.jpg' width='400'>
		</section>
		<section class='flex-item'>
			<h2>Nosso Mercado</h2>
			<p id='texto_2'>Nosso mercado contém uma alta variedade de alimentos, bebidas, produtos de limpeza e higiene!<br>Garantimos suas compras na sua casa e na hora certa! </p>
			<figure><img src='\mercadodelivery/imagens/WholeFoods-Highland-Village-Dallas-TX_3-2-2500x1674.jpg' width='400'/>
			<a href="#"><div id='ball'>
				<p>Acesse nosso catálogo<br>
				e monte suas compras hoje!</p>
			</div></a></figure>
		</section>
</div>

	<div id='container2'>
		<section>
			<center><h2>O que está esperando?</h2></center>
			<img id="id" width="1000px" height="268px">
			<a href='\mercadodelivery/cadastro.html'><div id='ball2'>
				<h2>Cadastre-se agora!</h2>
			</div></a>
		</section>
	</div>
	<footer>
		<center>
		<p>Desenvolvido pelo <a href=''>Grupo Ártemis&reg;</a></p>
		<p>Direitos reservados&copy;</p>
		</center>
	</footer>

</body>

</html>