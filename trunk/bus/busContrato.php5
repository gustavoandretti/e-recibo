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

	if(verificaCampoObrigatorio('contratoClienteId', 'txtCliente') &&
		verificaCampoObrigatorio('contratoQtdMensal') &&
		verificaCampoObrigatorio('contratoQtdExtra')&&
		verificaCampoObrigatorio('contratoValor')&&
		verificaCampoObrigatorio('contratoDataInicio') &&
		verificaCampoData('contratoDataInicio')&&
		verificaCampoData('contratoDataFim') 
		)
	{
		
		if( $_REQUEST['contratoContratoId'] != "")
		{
			$id = db_update("contrato", $_REQUEST);
		}
		else
		{
			$id = db_insert("contrato", $_REQUEST);
		}
		
		if(!$id)
			exit();

		$res[] = 0;
		$res[] = $id;
		$res[] = $_REQUEST["contratoClienteId"];
		
		echo json_encode($res);
	}



?>
