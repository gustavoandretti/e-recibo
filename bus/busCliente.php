 <?php

 	error_reporting(E_ERROR);

 	include("./validacao.php");

 	include("./db.php");

 	#Cliente

 	if(verificaCampoObrigatorio('cliNome') &&
 	verificaCampoObrigatorio('cliTelefone') &&
 	verificaCampoObrigatorio('cliEndereco'))
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

		$s = db_query("select * from cliente");
		if(!$s)
			exit();
/*
 		$insertCli = "INSERT INTO cliente(clienteNome, cpf_cnpj, clienteEmail, clienteTelefone, clienteEndereco) VALUES ('$cliNome', '$cpf_cnpj', '$cliEmail', '$cliTelefone', '$cliEndereco')";

 		db_query($insertCli) or die('Erro ao inserir na tabela de clientes'.mysql_error());

*/		
		$res[] = 0;
		$res[] = $cliEmail;
		echo json_encode($res);

	}
 ?>