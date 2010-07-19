 <?php

 	error_reporting(E_ERROR);

 	include("./db.php");

	$id = quote_smart($_REQUEST["atendimentoAtendimentoId"]);
	
	$clienteId = quote_smart($_REQUEST["atendimentoClienteId"]);
	
	$res = db_query("SELECT * FROM ATENDIMENTO WHERE ATENDIMENTOID = $id AND CLIENTEID = $clienteId LIMIT 1");
	
	if(!$res)
		exit();

	if(mysql_num_rows($res) == 0)
	{
		$ret[] = 0;
		$ret[] = 1;
		$ret[] = "Atendimento não encontrado.";
	}
	else
	{
		$ret[] = 0;
		$ret[] = mysql_fetch_array($res);
	}
	
	echo json_encode($ret);
	
?>