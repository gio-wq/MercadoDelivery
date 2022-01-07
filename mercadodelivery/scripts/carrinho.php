<?php
	require('bdconexion.php');

	$total = 0;

	if (isset($_SESSION['carrinho']) === true) {
    	$carrinho = $_SESSION['carrinho'];
    	$max = count($carrinho);
	}else{
    	$carrinho = "Carrinho Vazio";
    	$max=0;
	} 
	

	for($i=0;$i<$max;$i++){
		$prod_individual = $carrinho[$i]; 
		$sql = "SELECT * FROM tbprodutos where id_produto = '$prod_individual';";
		$result = mysqli_query($conn, $sql) or die("CARRINHO VAZIO");
		$check = mysqli_num_rows($result);
		if ($check >= 1){
			while ($valores = mysqli_fetch_assoc($result)){
				$prodimg = $valores['url_img'];
				$id = $valores['id_produto'];
	  			echo "<div class='prod-item'><p>";
		        if(empty($prodimg)){
		          $prodimg = "<img src='\mercadodelivery/scripts/produtos/produto.png' width='800' height='800'/>";
		        }else{
		          echo "<img src='$prodimg' width='50'/>";  
		        }
				$nome_prod = $valores['nome_prod'];
				$marca = $valores['marca'];
				$preco = number_format($valores['preco_prod'],2);

				$total +=$preco;
				$val_parc = number_format($total,2);

				echo "
					$nome_prod&nbsp;
					$marca&nbsp;
					R$ $preco
					</p>
					</div>
					<form action='\mercadodelivery/scripts/del_prod_cart.php'>
					<input type='hidden' name='id' value='$id'/>
					<input class='btn' type='submit' value='Remover Produto do Carrinho'/>
					</form>
					<hr>";
			}
		}
	
	}
	echo "Valor Parcial: R$ $val_parc";
	var_dump($_SESSION['carrinho']);
?>
<p>
<a href='comprar.php'>Finalizar Compra</a>