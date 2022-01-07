  <!DOCTYPE html>
<html>
<head>
<title>Cadastrar Produtos</title>
<meta charset='UTF-8'>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css">
<link rel='stylesheet' href="\mercadodelivery/css/scripts-style.css"/>
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
<script type="text/javascript"> 
	function funcategoria(){
  	categoria=window.document.cadprod.categoria.value;
  	sub_categoria=window.document.cadprod.sub_categoria;
	 for (I=0; I<=10;I++)
	 {
	     sub_categoria.remove(0);
	 }
	if (categoria == "alimentos")
	  {
	 option=document.createElement("option");
	 option.text=" ";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Hortifruti, Verduras e Legumes";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Cereais, Farinhas e Grãos";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Açogue e Peixaria";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Congelados e Refrigerados";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Laticínios";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Conserva e Enlatados";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Temperos, Condimentos e Ervas";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Ovos";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Padaria";
	 sub_categoria.add(option);
	  }
	if (categoria == "bebidas")
	  {
	 option=document.createElement("option");
	 option.text= " ";
	 sub_categoria.add(option);
	 option = document.createElement("option");
	 option.text="Água e Água de coco";
	 sub_categoria.add(option);
	 option = document.createElement("option");
	 option.text="Sucos e Refrescos";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Refrigerantes";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Vinhos e Espumantes";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Destilados";
	 sub_categoria.add(option);
	  }
	if (categoria == "cuidados")
	  {
	 option=document.createElement("option");
	 option.text= " ";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Perfumaria";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text="Higiene";
	 sub_categoria.add(option);
	  }
	if (categoria == "mat_limpeza")
	  {
	 option=document.createElement("option");
	 option.text= " ";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Desinfetantes";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Aromatizadores";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Inseticida";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Clorados";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Lavanderia";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Limpeza Multiuso";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Limpeza Geral";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Limpeza Pesada";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Lustradores";
	 sub_categoria.add(option);
	 option=document.createElement("option");
	 option.text= "Sabão e Detergentes";
	 sub_categoria.add(option);
	}
}
</script>
</head>
<body>

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

	<form name='cadprod' method='post' action='\mercadodelivery/func/gerente/cad-produtos.php'>
		<p><label>Nome do Produto:</label>
		<input type='text' maxlength='250' name='nome_prod' required/></p>

		<p>
			<label>Marca do Produto:</label>
			<input type='text' name='marca' maxlength='50'/>
		</p>

		<p>
			<label> URL da Imagem do Produto:</label>
			<input type='text' name='url_img'/>
		</p>

		<p><label>Preço:</label>
		<input type='text' name='preco_prod' maxlength='10' required/>
		</p>

		<p><label>Categoria:</label>
		<select name='categoria' onchange="funcategoria()">
			<option value=''> </option>
			<option value='alimentos'>Alimentos</option>
			<option value='bebidas'>Bebidas</option>
			<option value='mat_limpeza'>Materiais de Limpeza</option>
			<option value='cuidados'>Cuidados Pessoais</option>
		</select>
		</p>

		<p><label>Subcategoria</label>
		<select name='sub_categoria'>
		</select>
		</p>
		<p>
			<label>Quantidade:</label>
			<input type='number' name='qtd_produto' min='0'/>
		</p>
		<p>
			<label>Data de Validade:</label>
			<input type='date' name='data_val' min='0'/>
		</p>
		<p>
			<label>Lote:</label>
			<input type='text' name='lote' maxlength='100' />
		</p>
		<input type='submit' value='Cadastrar Produto'/>
	</form>
</div>
</body>
</html>