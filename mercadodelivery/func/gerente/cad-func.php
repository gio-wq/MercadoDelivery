<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Funcionários</title>
	<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Glegoo&family=Sansita&family=Solway&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="\mercadodelivery/css/scripts-style.css"/>
	<meta charset="UTF-8"/>
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
	function funcsenha(){
		senha=window.document.cad_func.senha.value;
		senha_check= window.document.cad_func.senha_check.value;
		cadastrar= window.document.cad_func.cadastrar;
		if (senha != senha_check){
			document.getElementById('msg_senha').innerHTML = "Suas senhas não conferem! Tente novamente";
		}else if(senha == '' && senha_check == ''){
			document.getElementById('msg_senha').innerHTML = "Confirme sua senha!";
		}else{
			document.getElementById('msg_senha').innerHTML = "Suas senhas conferem!";
			cadastrar.disabled=false;
		}
	}
	function cpf_mask(){
		cpf=window.document.cad_func.cpf_func.value;
		var cpf_input = document.getElementById('campo_cpf');
		var att = document.createAttribute("maxlength");
      	att.value = "14";
		if (cpf!='' && cpf.includes(".")==false){
			cpf_input.setAttributeNode(att);	
			part1 = cpf.slice(0,3);
			part2 = cpf.slice(3,6);
			part3 = cpf.slice(6,9);
			part4 = cpf.slice(9,13);
			cpf_new = part1.concat(".",part2,".",part3,"-",part4);
			window.document.cad_func.cpf_func.value = cpf_new;
		}
	}

	 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	function validar_idade(){
		data = window.document.cad_func.nasc_func.value;
		cadastrar= window.document.cad_func.cadastrar;
		ano = data.slice(0,4);
		data_atual = new Date();
		ano_atual = data_atual.getFullYear();
		idade = ano_atual - ano;
		if (idade<18){
			document.getElementById('msg_idade').innerHTML = "Menores de idade não podem se cadastrar";
			cadastrar.disabled=true;
		}else{
			document.getElementById('msg_idade').innerHTML = "";
			cadastrar.disabled=false;
		}
	}

	function cel_mask(){
			cel=window.document.cad_func.cel_func.value;
			cadastrar= window.document.cad_func.cadastrar;
			var cel_input = document.getElementById('campo_cel');
			var att = document.createAttribute("maxlength");
	      	att.value = "14";
	      	cel_input.setAttributeNode(att);
			if (cel!='' && cel.includes("(")==false){
				part0 = "("
				part1 = cel.slice(0,2);
				part2 = cel.slice(2,7);
				part3 = cel.slice(7,11);
				cel_new = part0.concat(part1,")",part2,"-",part3);
				window.document.cad_func.cel_func.value = cel_new;
			}
			if(window.document.cad_func.cel_func.value.charAt(4) != '9'){
				document.getElementById('msg_tel').innerHTML = "Coloque um Número de Celular Válido";
				cadastrar.disabled = true;
			}else if(window.document.cad_func.cel_func.value.charAt(4) == '9'){
				document.getElementById('msg_tel').innerHTML = "";
				cadastrar.disabled = false;
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
	<form name='cad_func' method='post' action='\mercadodelivery/func/gerente/cad_func.php'>
		<p>
			<label>Nome do Funcion&aacute;rio:</label><br/>
			<input type='text' name='nome_func' size='40' maxlength='255' placeholder='Exemplo: João Veira dos Santos' required/>
		</p>
		<p>
			<label>CPF:</label><br/>
			<input type='text' name='cpf_func' id='campo_cpf' size='40' maxlength='11' onblur='cpf_mask()' onkeypress="return isNumberKey(event)" required/>
		</p>
		<p>
			<label>E-mail do Funcion&aacute;rio:</label><br/>
			<input type='email' size='40' name='email_func' maxlength='255' placeholder='exemplo@hotmail.com' required/>
		</p>
		<p><label>Celular:</label>
		<input type='text' name='cel_func' id='campo_cel' onblur='cel_mask()' onkeypress="return isNumberKey(event)" maxlength='11' required/>
		<p id='msg_tel'></p></p>
		<p>
			<fieldset>
			<label>Senha:</label><br/>
			<input type='password' size='40' name='senha' maxlength='8' placeholder='até 8 caracteres'required/>
		<br>
			<label>Confirme a senha:</label><br/>
			<input type='password' size='40' name='senha_check' onblur='funcsenha()' placeholder='Digite sua senha novamente' required/>
			<p id='msg_senha'></p>
			</fieldset>
		</p>
		<p>
			<label>Data de Nascimento:</label><br/>
			<input type='date' name='nasc_func' onblur='validar_idade()' required/>
			<p id='msg_idade'></p>
		</p>

		<p><label>Cargo do Funcion&aacute;rio:</label>
			<select name='cargo' required>
				<option value='' disabled='true'></option>
				<option value='entregador'>Entregador</option>
				<option value='caixa'>Caixa</option>
			</select>

		</p>

		<p><label>Data de Admissão do Funcion&aacute;rio:</label>
			<input type='date' name='adms_func' required/>
		</p>

			<input type='submit' name='cadastrar' value='Cadastrar' id='btn' disabled='true'/>
		</form>	
</div>

</body>
</html>