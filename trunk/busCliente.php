 <?php

 	error_reporting(E_ERROR);

 	include("./validacao.php");

 	#Cliente

 	if(verificaCampoObrigatorio('cliNome', 'Nome') &&
 	verificaCampoObrigatorio('cliTelefone', 'Telefone') &&
 	verificaCampoObrigatorio('cliEndereco', 'Endereco'))
 	{
 		if($_POST['cpf_cnpj'] != '')
 		{
 			$cpf_cnpj = $_POST['cpf_cnpj'];
 		}
 		if($_POST['cliEmail'] != '')
 		{
 			$cliEmail = $_POST['cliEmail'];
 		}
 		if($_POST['cliTelefone'] != '')
 		{
 			$cliTelefone = $_POST['cliTelefone'];
 		}
 		if($_POST['cliEndereco'] != '')
 		{
 			$cliEndereco = $_POST['cliEndereco'];
 		}

 		$cliEmail = $_REQUEST["cliEmail"];

 		#insere nova

/*
 		$connect = mysql_connect('127.0.0.1','root','') or die('erro ao conectar ao DB'.mysql_error());

 		$mydb = mysql_select_db('os',$connect) or die('erro ao selecionar DB'.mysql_error());

 		$insertCli = "INSERT INTO cliente(clienteNome, cpf_cnpj, clienteEmail, clienteTelefone, clienteEndereco) VALUES ('$cliNome', '$cpf_cnpj', '$cliEmail', '$cliTelefone', '$cliEndereco')";

 		mysql_query($insertCli) or die('Erro ao inserir na tabela de clientes'.mysql_error());

*/
	    $res[] = 0;
	    $res[] = $cliEmail;

		echo json_encode($res);
 		//echo "<script> document.location = 'cadRecibo.php?cliEmail=$cliEmail' </script>";

 }
 ?>