<!DOCTYPE html>
<html>
<head>
	<title>Área do Cliente</title>
	<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css"/>
	<meta charset="UTF-8"/>
	<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">
</head>
<body>
	<?php
	session_start();  

	require('bdconexion.php');

	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header('location:\mercadodelivery/login.html');
	}
	$logado = $_SESSION['email'];

	if($logado=='ADM'){
		header('location:\mercadodelivery/admin/admin-index.html');
	}

	$pesq = mysqli_query($conn, "SELECT * FROM tbclientes WHERE '$logado' = email_cliente;");
	$check = mysqli_num_rows($pesq);
	if ($check >= 1){
		while ($dados = mysqli_fetch_assoc($pesq)){
			$nome = $dados['nome'];
			$senha = $dados['senha'];
			$nasc = $dados['nasc_cliente'];
			$cpf = $dados['cpf_cliente'];
			$logra = $dados['logra'];
			$cep = $dados['cep'];
			$endereco = $dados['endereco'];
			$comple = $dados['comple'];			
		}
	}
	$esp = strpos($nome, " ");
	$nome_print = substr($nome, 0, $esp);
?>
	<nav id="navbar">
     <header>		
    <center>	
    	<a href='\mercadodelivery/index.php'><figure><img src='\mercadodelivery/imagens/logo.png' id='logo' width='120'/></figure></a>
    </center>
    <?php
    	echo "<h1>Bem-vindo, $nome_print</h1></header>";
    ?>
       <ul>
        <li><a href="\mercadodelivery/scripts/area_cliente.php">SUA SACOLA</a></li>
        <li><a href="#">PEDIDOS ANTERIORES</a></li>
        <li><a href='\mercadodelivery/scripts/logout.php'>SAIR</a></li>
    </ul>
  	</nav><img src='https://ca12a97fef467f0a0fc5-5680361a3407f33f45d506504554a5a0.ssl.cf3.rackcdn.com/entries/h/e_h0at7w77/posters/4043.jpg' id='background-img'>
	<div class='conteudo'>
	<?php
	echo "Nome: $nome
		 <p>Data de Nascimento: $nasc
		 <p>CPF: $cpf
		 <p>Endereço: $logra $endereco, $comple - $cep";
	?>
	</div>			
	</header>
	</div>
</body>
<footer>
		<center>
		<p>Desenvolvido pelo <a href=''>Grupo Ártemis&reg;</a></p>
		<p>Direitos reservados&copy;</p>
		</center>
	</footer>
</html>