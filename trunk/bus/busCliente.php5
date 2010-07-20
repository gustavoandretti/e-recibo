 <?php

 	error_reporting(E_ALL);

 	include("./validacao.php");

 	include("./db.php");
	
 	if(verificaCampoObrigatorio('clienteNome') &&
 	verificaCampoObrigatorio('clienteTelefone') &&
 	verificaCampoObrigatorio('clienteEndereco') &&
	verificaCampoData("clienteData"))
 	{
		
		if( $_REQUEST['clienteClienteId'] != "")
		{
			$id = db_update("cliente", $_REQUEST);
		}
		else
		{
			$id = db_insert("cliente", $_REQUEST);
		}
				
		if(!$id)
			exit();

		$res[] = 0;
		$res[] = $id;

		echo json_encode($res);
	}
 ?>