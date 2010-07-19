 <?php

 	error_reporting(E_ERROR);

 	include("./db.php");

	$id = $_REQUEST["clienteClienteId"];
	
	//Pesquisa de clientes nao usa o profixo "cliente"
	if(trim($id) == '') 
		$id = $_REQUEST["clienteId"];
	
	$id = quote_smart($id);
	
	//echo $id;
	$res = db_query("
					SELECT C.*, CC.ContratoId 
					  FROM CLIENTE C
					  LEFT JOIN CONTRATO CC
						ON CC.CLIENTEID = C.CLIENTEID
					 WHERE C.CLIENTEID = $id
					   AND CC.DATAFIM IS NULL 	
					 LIMIT 1");

	if(!$res)
		exit();

	if(mysql_num_rows($res) == 0)
	{
		$ret[] = 100;
		$ret[] = "Cliente não encontrado.";
	}
	else
	{
		$resAte = db_query("SELECT * FROM ATENDIMENTO WHERE CLIENTEID = $id ORDER BY DATA DESC");
		$resAtes[] = null;
		
		while($tmp = mysql_fetch_array($resAte))
			if($tmp)
				$resAtes[] = $tmp;
		
		$resCon = db_query("SELECT * FROM CONTRATO WHERE CLIENTEID = $id ORDER BY IFNULL(DATAFIM, -1), DATAINICIO DESC");
		while($tmp = mysql_fetch_array($resCon))
			if($tmp)		
				$resConts[] = $tmp;

		$ret[] = 0;
		$ret[] = mysql_fetch_array($res);
		
		$ret[] = $resAtes;
		$ret[] = $resConts;
	}
	
	echo json_encode($ret);
	
?>