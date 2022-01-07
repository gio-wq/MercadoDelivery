<!DOCTYPE html>
<html>
<head>
	<title>MercadoDelivery</title>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="\mercadodelivery/css/index-style.css"/>
	<meta charset="UTF-8"/>
	<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet"> 
<style>
		@import url('https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap');
	</style>
<script>
</script>
</head>
<body>
	<a href="\mercadodelivery/index.php">
	<figure><img src='\mercadodelivery/imagens/logo.png' id='logo' width='120'/></figure>
	<figcaption><h1 id='titulo'>Mercado</h1></figcaption></a>
<nav class="menu">
	<ul>
		<li>
			<h3 id='menu'><a href=''/>Categorias</a></h3> 
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
	</nav>
	<center>

	<div id="catalogo-box">
	<?php 
	require('bdconexion.php');
	
	$sql = "SELECT * FROM tbprodutos where categoria = 'alimentos';";
	$result = mysqli_query($conn, $sql);
	$check = mysqli_num_rows($result);
	if ($check >= 1) {
		while ($valores = mysqli_fetch_assoc($result)){
			$prodimg = $valores['url_img'];
			$id = $valores['id_produto'];
  			echo "<div class='prod-item'>";
	        if(empty($prodimg)){
	          echo "<img src='\mercadodelivery/scripts/produtos/produto.png' width='225' height='250'/>";
	        }else{
	          echo "<img src='$prodimg' width='225'/>";  
	        }
			echo "<p>".$valores['nome_prod'];
			echo "&nbsp;".$valores['marca'];
			echo "<br/>R$ ".number_format($valores['preco_prod'],2);
			echo "<form action='add_prod.php'>
			<input type='hidden' name='prod' value='$id'/>
			<input type='submit' class='btn' value='Adicionar ao Carrinho'/>
			</form>";
			echo "</div>";
		}
	} else {
		echo "Nenhum Produto Cadastrado!";
	}
?>
</div>
</center>
</body>
</html>