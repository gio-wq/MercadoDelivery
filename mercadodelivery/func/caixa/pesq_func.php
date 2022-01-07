<!DOCTYPE html>
<html>
<head>
<title>Pesquisar Funcionários</title>
<meta charset='UTF-8'>
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css">
</head>
<body>
<img src='https://ca12a97fef467f0a0fc5-5680361a3407f33f45d506504554a5a0.ssl.cf3.rackcdn.com/entries/h/e_h0at7w77/posters/4043.jpg' id='background-img'>

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
                <li><a href="\mercadodelivery/func/caixa/pesq-prod.php">Pesquisar Produtos</a></li>
                <li><a href='\mercadodelivery/func/caixa/pesq-simples.php'>Exibir Todos os Produtos</a></li>
                </li>
            </ul>
        </li>
        <li><a href="#">FUNCIONÁRIOS</a>
             <ul>
                <li><a href="\mercadodelivery/func/caixa/pesq_func.php">Pesquisar Funcion&aacute;rio</a></li>
            </ul>
        </li>
        <li><a href="#">CLIENTES</a>
          <ul> 
                <li><a href="\mercadodelivery/func/caixa/exibe-user.php">Exibir Clientes</a></li>
          </ul>
        </li>
        <li><a href='\mercadodelivery/scripts/logout.php'>SAIR</a></li>
    </ul>
  </nav>
	<center>
	<div class='conteudo'>
	<form name='busca_prod' method='post' action='\mercadodelivery/func/gerente/pesq-func.php'>
		<p><label>Dado do Funcionario:</label>
		<input type='text' name='valor'/></p>
		<p>
		<label>Campo:</label>
		<select name='campo' onchange="funcategoria()">
			<option value=''> </option>
			<option value='nome_func'>Nome</option>
			<option value='cpf_func'>CPF</option>
            <option value='nasc_func'>Data de Nascimento</option>
			<option value='cargo'>Cargo</option>
			<option value='email_func'>Email</option>
            <option value='cel_func'>Celular</option>
            <option value='adms_func'>Data de Admissão</option>
		</select>
	</p>
		<input type='submit' value='Pesquisar'/>
	</form>
</div>
</center>
</body>
</html>