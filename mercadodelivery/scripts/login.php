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
$email = $_POST['email_cliente'];
$senha = $_POST['senha'];

require('bdconexion.php');

$pesq_email = mysqli_query($conn, "SELECT * FROM tbclientes WHERE email_cliente='$email';") or die(mysqli_error($conn));
$pesq_senha = mysqli_query($conn, "SELECT * FROM tbclientes WHERE senha='$senha' and email_cliente='$email';") or die(mysqli_error($conn));

if (mysqli_num_rows($pesq_email) <= 0){
	$pesq_func = mysqli_query($conn, "SELECT id_func FROM tbfuncionarios WHERE id_func = '$email' AND senha_func = $senha;") or die("Funcionário não cadastrado ou Dados Incorretos");
	if(mysqli_num_rows($pesq_func)>=1){
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		header('location:\mercadodelivery/scripts/area_cliente.php');
	}else{
		echo "E-mail não cadastrado ou incorreto
		<center>
		<p><a href='\mercadodelivery/login.html'>Voltar</a></p>
		</center>";
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
	}
}else{
	if(mysqli_num_rows($pesq_senha) <= 0){
		echo "Senha incorreta<center>
		<p><a href='\mercadodelivery/login.html'>Voltar</a></p>
		</center>";
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
	}else{
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		header('location:\mercadodelivery/scripts/area_cliente.php');
	}
}	
?>
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