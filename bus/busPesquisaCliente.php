<?php

	error_reporting(E_ALL);

	include("./validacao.php");

	include("./db.php");
	
	//used for quote_smart below
	db_connect();
	
	$term = $_REQUEST["term"];
	
	$term = str_replace(",-. \t", ";", $term);
	
	$term = explode(';', $term);
	
	$where = "WHERE (1=1)";
	
	foreach($term as $data)
	{
		$data = quote_smart('%' . $data .'%');
		$where .= " AND (NOME LIKE $data OR ENDERECO LIKE $data OR EMAIL LIKE $data)";
	}
			
	$sql = "SELECT CLIENTEID AS id, CONCAT(NOME, ' | ', TELEFONE, ' | ', EMAIL, ' | ', ENDERECO) AS label FROM CLIENTE " . $where;
	
	
	if($_REQUEST["debug"] == 1)
		echo $sql;
	
	$res = db_query($sql);
	
	if(!$res)
	{
		echo "[]";
		exit();
	}

	if(mysql_num_rows($res) > 0)
	{
		while($t = mysql_fetch_array($res, MYSQL_ASSOC))
			$ret[] = $t;
		
		echo json_encode($ret);
	}
	else
		echo "[]";
	
	

?>