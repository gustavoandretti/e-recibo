<?php

	error_reporting(E_ERROR);

	include("./validacao.php");

	include("./db.php");

	$data = date('d-m-Y');
	$data_ = explode('-',$data);
	$dia = $data_[0];
	$mes = $data_[1];
	$ano = $data_[2];

	#Servico

	$email = $_POST['email'];

	if(verificaCampoObrigatorio('hdnClienteId', 'txtCliente') &&
		verificaCampoObrigatorio('servicoDescricao') &&
		verificaCampoObrigatorio('servicoValor') )
	{
		$s = db_query("select * from cliente");

		if(!$s)
			exit();

	/*
		if($_POST['servicoDescricao'] != '')
		{
			$servicoDescricao = $_POST['servicoDescricao'];
		}

		if($_POST['servicoValor'] != '')
		{
			$servicoValor = $_POST['servicoValor'];
		}
		if($_POST['servicoValorExt'] != "")
		{
			$servicoValorExt = $_POST['servicoValorExt'];
		}

		if($_POST['formaPgto'] != "")
		{
			$formaPgto = $_POST['formaPgto'];
		}

		if($_POST['numeroRecibo'] != '')
		{
			$numeroRecibo = $_POST['numeroRecibo'];
		}

		if($_POST['obsRec'] != '')
		{
			$obsRec = $_POST['obsRec'];
		}

		if($_POST['obsInt'] != '')
		{
			$obsInt = $_POST['obsInt'];
		}
		if($_POST['localServico'] != '')
		{
			$localServico = ucwords($_POST['localServico']);
		}

		$selectCli = "SELECT * FROM cliente WHERE clienteEmail = '$email'";

		$queryCli = db_query($selectCli);

		$res = mysql_fetch_array($queryCli);


		$idCliente      = $res[0];
		$cliNome        = $res[1];
		$cliCPF         = $res[2];
		$cliEndereco    = ucwords($res[5]);
		$servicoData = date('Y-m-d');

		$insertServ = "INSERT INTO servico(idCliente, descricaoServico, valorServico, numeroRecibo, observacoesRec, observacoesInt, servicoData) VALUES
		('$idCliente','$servicoDescricao', '$servicoValor', '$numeroRecibo', '$obsRec', '$obsInt', '$servicoData')";


		db_query($insertServ) or die('Erro ao inserir na tabela de servicos :'.mysql_error());

		$to = 'deisefontoura@gmail.com';

		$subject = 'Recibo de serviço nº $numeroRecibo - '.date('d-m-Y');

		include("recibo.php");

		echo $body;

		exit();


		if (mail($to, $subject, $body)) {

			echo('<p>Mensagem enviada com sucesso!</p>');

		} else {

			echo('<p>Mensagem falhou. </p>');
		}

*/
		/*echo $cliNome.'<br>';
		echo $cliEmail.'<br>';
		echo $cliTelefone.'<br>';
		echo $cliEndereco.'<br>';
		echo $servicoDescricao.'<br>';
		echo $servicoValor.'<br>';
		echo $ObsOS.'<br>';
		echo $ObsInt.'<br>';*/


	}



?>
