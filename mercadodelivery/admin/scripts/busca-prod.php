<!DOCTYPE html>
<html>
<head>
<title>Exibir Produtos</title>
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
	<meta charset="UTF-8"/>
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
	$valor = $_POST['valor'];
	$campo = $_POST['campo'];

	require('bdconexion.php');

	$sql = "SELECT * FROM tbprodutos WHERE $campo='$valor';";
	$result = mysqli_query($conn, $sql);
	$check = mysqli_num_rows($result);
	if ($check >= 1) {
		while ($valores = mysqli_fetch_assoc($result)){
			echo "<div class='prod-item'>";
			echo "<img src='\mercadodelivery/scripts/produtos/produto.png' width='225'/>";
			echo "<p>".$valores['nome_prod'];
			echo "&nbsp;".$valores['marca'];
			echo "<br/>R$ ".number_format($valores['preco_prod'],2);
			echo "<br/>Id:".$valores['id_produto'];
			echo "<br/>Categoria:".$valores['categoria'];
			echo "<br/>Sub-Categoria:".$valores['sub_categoria'];
			echo "<br/>Quantidade disponivel:".$valores['qtd_produto'];
			echo "</div>";
		}
	} else {
		echo "</div>
		<div class='conteudo'>Nenhum Produto Encontrado!</div>";
	}
?>
</body>
</html>