<!DOCTYPE html>
<html>
<head>
	<title>Pesquisa de Funcionários</title>
	<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css"/>
	<meta charset="UTF-8"/>
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
<img src='https://ca12a97fef467f0a0fc5-5680361a3407f33f45d506504554a5a0.ssl.cf3.rackcdn.com/entries/h/e_h0at7w77/posters/4043.jpg' id='background-img'>
<center>
    <div id='catalogo-box'>
<?php
	require('bdconexion.php');

    $valor = $_POST['valor'];
    $campo = $_POST['campo'];

	$sql = "SELECT * FROM tbfuncionarios where $campo='$valor';";
	$result = mysqli_query($conn, $sql);
	$check = mysqli_num_rows($result);
	if ($check >= 1) {
		while ($valores = mysqli_fetch_assoc($result)){
			echo "<div class='prod-item'>";
			echo "<p>Nome: ".$valores['nome_func'];
            echo "<p>CPF: ".$valores['cpf_func'];
            echo "<p>Cargo: ".$valores['cargo'];
            echo "<p>Data de Admissão: ".$valores['adms_func'];
			echo "<p>E-mail: ".$valores['email_func'];
            echo "<p>Celular: ".$valores['cel_func'];
			echo "<p>Data de Nascimento: ".$valores['nasc_func'];
			echo "</div>";
		}
	} else {
		echo "Nenhum Funcionário encontrado!";
	}
?>
    </div>
</body>
</html>