<!DOCTYPE html>
<html>
<head>
	<title>Área do Entregador</title>
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

	$pesq = mysqli_query($conn, "SELECT * FROM tbfuncionarios WHERE '$logado' = id_func;");
	$check = mysqli_num_rows($pesq);
	if ($check >= 1){
		while ($dados = mysqli_fetch_assoc($pesq)){
			$nome = $dados['nome_func'];
			$cargo = $dados['cargo'];
			$id_func = $dados['id_func'];			
		}
	}
?>
	 <nav id="navbar">
    <header>        <center>    <a href='\mercadodelivery/index.php'><figure><img src='\mercadodelivery/imagens/logo.png' id='logo' width='120'/></figure></a></center>
<?php
      echo "<h1>Bem-vindo, $cargo#$id_func</h1></header>";
 ?>
       <ul>
       <li><a href="\mercadodelivery/func/dados_func.php">SEUS DADOS</a></li>
        <li><a href="#">PRODUTOS</a>
            <ul>
                <li><a href="\mercadodelivery/func/entregador/pesq-prod.php">Pesquisar Produtos</a></li>
                <li><a href="\mercadodelivery/func/entregador/pesq-simples.php">Exibir Todos</a></li>
            </ul>
        </li>
        <li><a href="#">ENTREGAS</a>
            <ul>
                <li><a href="#">Agendadas</a></li>
                <li><a href="#">Em Andamento</a></li>
                <li><a href="#">Realizadas</a></li>
            </ul>
        </li>
        <li><a href='\mercadodelivery/scripts/logout.php'>SAIR</a></li>
    </ul>
  </nav>
<img src='https://ca12a97fef467f0a0fc5-5680361a3407f33f45d506504554a5a0.ssl.cf3.rackcdn.com/entries/h/e_h0at7w77/posters/4043.jpg' id='background-img'>
	<div class='conteudo'>
	<?php
	$esp = strpos($nome, " ");
	$nome_print = substr($nome, 0, $esp);
	echo "
		<h2>Bem-vindo, $nome_print!</h2>
	<p>Escolha uma ação do dia na área de tarefas.</p>";
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