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
	
	$email = $_REQUEST['atendimentoClienteId'];
	
	if(verificaCampoObrigatorio('atendimentoClienteId', 'txtCliente') &&
		verificaCampoObrigatorio('atendimentoData') &&
		verificaCampoData('atendimentoData') &&		
		verificaCampoObrigatorio('atendimentoDescricao') &&
		verificaCampoObrigatorio('atendimentoValor'))
	{
		
		if(trim($_REQUEST["atendimentoEndereco"]) == "")
		{
	
			$res1 = db_query("SELECT ENDERECO FROM CLIENTE WHERE CLIENTEID = " . 
				$_REQUEST["atendimentoClienteId"]);
			
			$v = mysql_fetch_array($res1);
			
			$_REQUEST["atendimentoEndereco"] = $v[0];
		}

		if( $_REQUEST['atendimentoAtendimentoId'] != "")
		{
			$id = db_update("atendimento", $_REQUEST);
		}
		else
		{
			$id = db_insert("atendimento", $_REQUEST);
		}
		
		if(!$id)
			exit();

		$res[] = 0;
		$res[] = $id;
		$res[] = $_REQUEST["atendimentoClienteId"];		

		echo json_encode($res);
	}



?>
