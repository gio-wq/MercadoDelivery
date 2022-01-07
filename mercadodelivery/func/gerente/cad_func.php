<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Entregadores</title>
	<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css"/>
	<meta charset="UTF-8"/>
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
                <li><a href="\mercadodelivery/func/gerente/cad_produtos.php">Cadastrar Produtos</a></li>
                <li><a href="\mercadodelivery/func/gerente/pesq-prod.php">Pesquisar Produtos</a></li>
                <li><a href='\mercadodelivery/func/gerente/pesq-simples.php'>Exibir Todos os Produtos</a></li>
                <li><a href="\mercadodelivery/func/gerente/del_prod.php">Deletar Produtos</a>
                </li>
            </ul>
        </li>
        <li><a href="#">FUNCIONÁRIOS</a>
             <ul>
                <li><a href="\mercadodelivery/func/gerente/cad-func.php">Cadastrar Funcion&aacute;rio</a></li>
                <li><a href="\mercadodelivery/func/gerente/pesq_func.php">Pesquisar Funcion&aacute;rio</a></li>
                <li><a href="\mercadodelivery/func/gerente/del_func.php">Remover Funcion&aacute;rio</a>
                    
                </li>
            </ul>
        </li>
        <li><a href="#">CLIENTES</a>
          <ul>
                
                <li><a href="\mercadodelivery/func/gerente/exibe-user.php">Exibir Clientes</a></li>
          </ul>
        </li>
        <li><a href='\mercadodelivery/scripts/logout.php'>SAIR</a></li>
    </ul>
  </nav>
<img src='https://ca12a97fef467f0a0fc5-5680361a3407f33f45d506504554a5a0.ssl.cf3.rackcdn.com/entries/h/e_h0at7w77/posters/4043.jpg' id='background-img'>
	<div class="conteudo">
	<?php
		$nome_func = $_POST['nome_func'];
		$email_func = $_POST['email_func'];
		$nasc_func = $_POST['nasc_func'];
		$cpf_func = $_POST['cpf_func'];
		$adms_func = $_POST['adms_func'];
		$cel_func = $_POST['cel_func'];
		$cargo = $_POST['cargo'];
		$senha = $_POST['senha'];
		
/*CONEXÃO COM BANCO DE DADOS*/
		require('bdconexion.php');

/*VERIFICAÇÃO DE USUÁRIO EXISTENTE*/
		$checagem = mysqli_query($conn, "SELECT cpf_func FROM tbfuncionarios WHERE cpf_func='$cpf_func';");
		$row_check = mysqli_num_rows($checagem);
		if ($row_check >= 1){
			echo "Funcionário já Cadastrado";
		}else{
			$sql = "INSERT INTO tbfuncionarios VALUES ('$nome_func', '$cpf_func', '$nasc_func', '$adms_func','$cargo', '$senha', '$email_func', '$cel_func',id_func);";
			if (mysqli_query($conn, $sql)){
				echo "Cadastrado Com Sucesso!<p>";
				$pesq = mysqli_query($conn, "SELECT * FROM tbfuncionarios WHERE cpf_func = '$cpf_func';");
				$check = mysqli_num_rows($pesq);
				if ($check >= 1){
					while ($dados = mysqli_fetch_assoc($pesq)){
						echo "Nome do Funcionário:".$dados['nome_func']."<p>";
						echo "CPF do Funcionário:".$dados['cpf_func']."<p>";				
						echo "ID do Funcionário:".$dados['id_func']."<p>";
						echo "Senha do Funcionário:".$dados['senha_func']."<p>";
					}
				}
			}else{
				echo "Dados Não Registrados";
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
