 <?php

 	error_reporting(E_ERROR);

 	include("./db.php");

	$id = quote_smart($_REQUEST["contratoContratoId"]);
	
	$clienteId = quote_smart($_REQUEST["contratoClienteId"]);
	
	$sql = "SELECT * FROM CONTRATO WHERE CONTRATOID = $id AND CLIENTEID = $clienteId LIMIT 1";
	
	$res = db_query($sql);
	
	if(!$res)
		exit();

	if(mysql_num_rows($res) == 0)
	{
		$ret[] = 0;
		$ret[] = 1;
		$ret[] = "Contrato não encontrado.";
	}
	else
	{
		$ret[] = 0;
		$ret[] = mysql_fetch_array($res);
	}
	
	echo json_encode($ret);
	
?>