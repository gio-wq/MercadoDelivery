<!DOCTYPE html>
<html>
<head>
	<title>MercadoDelivery</title>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="\mercadodelivery/css/index-style.css"/>
	<meta charset="UTF-8"/>
	<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
</head>
<body onLoad="slide1()">
	<a href="\mercadodelivery/index.php">
	<figure><img src='\mercadodelivery/imagens/logo.png' id='logo' width='120'/></figure>
	<figcaption><h1 id='titulo'>Mercado</h1></figcaption></a>
<nav class="menu">
	<ul>
		<li>
			<h3 id='menu'><a href=''/>Categorias</a></h3> 
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
	<img src='\mercadodelivery/imagens/4043.jpg' id='background-img'>
	<div id='menu-catalogo'>
		<img src='\mercadodelivery/imagens/alimentos.jpg' width='400'/>
		<img src='\mercadodelivery/imagens/bebidas.jpg' width='400'/>
		<img src='\mercadodelivery/imagens/cuidado.jpg' width='400'/>
		<img src='\mercadodelivery/imagens/limpeza.jpg' width='400'/>
	</div>
	<footer>
		<center>
		<p>Desenvolvido pelo <a href=''>Grupo Ártemis&reg;</a></p>
		<p>Direitos reservados&copy;</p>
		</center>
	</footer>

</body>

</html>