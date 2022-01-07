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
<style>
	.conteudo{
		width: 400px;
		position: absolute;
		top: 250px; /* posiciona na metade da tela */
		left: 38%; /* posiciona na metade da tela */
		padding: 5px;
		font-family: 'Solway', serif;
		font-size: 18px;		
		border-radius: 15px;		
		background-color: #fff;
		text-align: justify: 
	}
	footer {
		font-family: 'Solway', serif;
		color: #FFFFFF;
		font-size: 14px;
		width: 100%;
		padding: 3px;
		margin: 932px 0px 0px 0px;
		background-color: #696D7D;
		position: static;
		bottom: 0px; 
	}
	footer a{
		color: white;
	}
	footer a:visited{
		color: white;
	}
	#background-img{
		position: absolute;
		z-index: -1;
		width: 100%;
		height: 100%;
		margin: 0;
		left: 0px;
		top: 0px;
		opacity: 1.0;
		/* Blue 2 */
		border: 1px solid #2D9CDB;
		box-sizing: border-box;
		filter: blur(3.5px) brightness(80%); 
	}
</style>
<body>
	<img src='\mercadodelivery/imagens/4043.jpg' id='background-img'>
	<a href="\mercadodelivery/index.php">
	<figure><img src='\mercadodelivery/imagens/logo.png' id='logo' width='120'/></figure>
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
	<div class="conteudo">
	<?php
		$nome_cliente = $_POST['nome_cliente'];
		$email_cliente = $_POST['email_cliente'];
		$nasc_cliente = $_POST['nasc_cliente'];
		$cpf_cliente = $_POST['cpf_cliente'];
		$cep = $_POST['cep'];
		$logra = $_POST['logra'];
		$endereco = $_POST['endereco'];
		$comple = $_POST['comple'];
		$senha = $_POST['senha'];
		
/*CONEXÃO COM BANCO DE DADOS*/
		require('bdconexion.php');

/*VERIFICAÇÃO DE USUÁRIO EXISTENTE*/
		$checagem = mysqli_query($conn, "SELECT cpf_cliente FROM tbclientes WHERE cpf_cliente='$cpf_cliente';");
		$row_check = mysqli_num_rows($checagem);
		if ($row_check >= 1){
			echo "Usuário já Cadastrado";
		}else{
			$sql = "INSERT INTO tbclientes VALUES ('$nome_cliente', '$email_cliente', '$nasc_cliente', '$cpf_cliente', '$logra', '$cep', '$endereco', '$comple', '$senha');";
			if (mysqli_query($conn, $sql)){
				echo "Cadastrado Com Sucesso!";
			}else{
			echo "Dados Não Registrados";
			}
		}	
	?>
	<p>Faça seu login <a href="\mercadodelivery/login.html">aqui</a></p>
</div>
</center>
</body>
	<footer>
		<center>
		<p>Desenvolvido pelo <a href=''>Grupo Ártemis&reg;</a></p>
		<p>Direitos reservados&copy;</p>
		</center>
	</footer>
</html>
