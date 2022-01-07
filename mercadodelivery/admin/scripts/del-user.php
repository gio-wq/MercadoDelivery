<html>
<head>
<title>Remover Entregador</title>
<meta charset='UTF-8'>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css">
</head>
<body>
		<nav id="navbar">
    <header>        <center>    <a href='\mercadodelivery/index.php'><figure><img src='\mercadodelivery/imagens/logo.png' id='logo' width='120'/></figure></a></center>
        <h1>Bem-vindo, Administrador</h1></header>
       <ul>
        <li><a href="#">PRODUTOS</a>
          <ul>
                <li><a href="\mercadodelivery/admin/cad-produtos.html">Cadastrar Produtos</a></li>
                <li><a href="\mercadodelivery/admin/pesq-prod.html">Pesquisar Produtos</a></li>
                <li><a href='\mercadodelivery/admin/scripts/pesq-simples.php'>Exibir Todos os Produtos</a></li>
                <li><a href="\mercadodelivery/admin/del-prod.html">Deletar Produtos</a>
                    
                </li>
            </ul>
        </li>
        <li><a href="#">FUNCIONÁRIOS</a>
            <ul>
                <li><a href="\mercadodelivery/admin/cad-func.html">Cadastrar Funcion&aacute;rio</a></li>
                <li><a href="\mercadodelivery/admin/pesq-func.html">Pesquisar Funcion&aacute;rio</a></li>
                <li><a href="\mercadodelivery/admin/del-func.html">Remover Funcion&aacute;rio</a>
                    
                </li>
            </ul>
        </li>
        <li><a href="#">CLIENTES</a>
          <ul>
                
                <li><a href="\mercadodelivery/admin/scripts/exibe-user.php">Exibir Clientes</a></li>
                <li><a href="\mercadodelivery/admin/del-user.html">Remover Clientes</a>
                    
                </li>
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