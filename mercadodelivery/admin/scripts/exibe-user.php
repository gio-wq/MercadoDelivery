<!DOCTYPE html>
<html>
<head>
<title>Remover Entregador</title>
<meta charset='UTF-8'>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css">

<style>
        #catalogo-box{
        width: 70%;
        position: absolute;
        right: 105px;
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-template-rows: auto;
        column-gap: 10px;
        grid-row-gap: 15px;
        }
    .prod-item{
        background-color: #FFF;
        border-style: solid;
        border-width: 0.8px;
    }
    </style>
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
	<center>
        <div id='catalogo-box'>
	<?php
		require('bdconexion.php');

		$sql = "SELECT * FROM tbclientes;";
		$result = mysqli_query($conn, $sql);
		$check = mysqli_num_rows($result);
		if ($check >= 1) {
			while ($valores = mysqli_fetch_assoc($result)){
				echo "<div class='prod-item'>";
				echo "<p>Nome: ".$valores['nome'];
				echo "<p>E-mail: ".$valores['email_cliente'];
				echo "<p>Data de Nascimento: ".$valores['nasc_cliente'];
				echo "<p>CPF: ".$valores['cpf_cliente'];
				echo "<p>Logradouro: ".$valores['logra'];
				echo "<p>CEP: ".$valores['cep'];
				echo "<p>Endereço: ".$valores['endereco'];
				echo "<p>Complemento: ".$valores['comple'];
				echo "</div>";
			}
		} else {
			echo "Nenhum Usuário Cadastrado!";
		}
?>
        </div>
</body>
</html>