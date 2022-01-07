<html>
<head>
<title>Remover Usuário</title>
<meta charset='UTF-8'>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css">
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
		$nome_cliente = $_POST['nome_cliente'];
		$cpf_cliente = $_POST['cpf_cliente'];

/*CONEXÃO COM BANCO DE DADOS*/
		require('bdconexion.php');
		
/*VERIFICAÇÃO DE USUÁRIO EXISTENTE*/
		$checagem = mysqli_query($conn, "SELECT cpf_cliente FROM tbclientes WHERE cpf_cliente='$cpf_cliente';") or die(mysqli_error($conn));
		$row_check = mysqli_num_rows($checagem);
		if ($row_check == 0){
			echo "Usuário Não Existe";
		}else{
			$sql = "DELETE FROM tbclientes WHERE cpf_cliente='$cpf_cliente';";
			if (mysqli_query($conn, $sql)){
				echo "Removido Com Sucesso!";
			}else{
			echo "Dados Não Removidos";
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