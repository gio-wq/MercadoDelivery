<!DOCTYPE html>
<html>
<head>
<title>Cadastrar Produtos</title>
<meta charset='UTF-8'>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css">
<link rel='stylesheet' href="\mercadodelivery/css/scripts-style.css"/>
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
	<div class='conteudo'>
	<?php
		$nome_prod = $_POST['nome_prod'];
		$marca = $_POST['marca'];
		$preco_prod = floatval($_POST['preco_prod']);
		$categoria = $_POST['categoria'];
		$sub_categoria = $_POST['sub_categoria'];
		$qtd_produto = $_POST['qtd_produto'];
        $data_val = $_POST['data_val'];
        $lote = $_POST['lote'];
        $url_img = $_POST['url_img'];

/*CONEXÃO COM BANCO DE DADOS*/
		require('bdconexion.php');
		
/*VERIFICAÇÃO DE PRODUTO EXISTENTE*/
		$checagem = mysqli_query($conn, "SELECT nome_prod FROM tbprodutos WHERE nome_prod='$nome_prod';");
		$row_check = mysqli_num_rows($checagem);
		if ($row_check >= 1){
			echo "Produto já Cadastrado";
		}else{
			$sql = "INSERT INTO tbprodutos VALUES ('$nome_prod', id_produto,'$preco_prod', '$categoria', '$sub_categoria', '$qtd_produto', '$marca','$data_val','$lote','$url_img');";
			if (mysqli_query($conn, $sql)){
				echo "Produto Cadastrado Com Sucesso!";
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