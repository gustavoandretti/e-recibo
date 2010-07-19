 <?php

 	error_reporting(E_ERROR);

 	include("./db.php");

	$id = quote_smart($_REQUEST["contratoClienteId"]);
	
	$res = db_query("SELECT contratoId, clienteId FROM CONTRATO WHERE CLIENTEID = $id  AND DATAFIM IS NULL LIMIT 1");
	
	if(!$res)
		exit();

	if(mysql_num_rows($res) == 0)
	{
		$ret[] = 0; // tech ok
		$ret[] = 0; // bus ok
	}
	else
	{
		$ret[] = 0; //tech ok
		
		$ret[] = mysql_fetch_array($res, MYSQL_ASSOC); //cliente com contrato ativo.	
		
	}
	
	echo json_encode($ret);
	
?>