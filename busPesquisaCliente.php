<?php

	error_reporting(E_ERROR);

	include("./validacao.php");

//	include("./db.php");

//	$selectCli = "SELECT * FROM cliente WHERE clienteEmail like '%$email%' OR ";

//	$queryCli = db_query($selectCli);

//	$res = mysql_fetch_array($queryCli);

	$ar = Array();

	$a[] = Array("id" => "a", "label" => "teste");
	$a[] = Array("id" => "b", "label" => "teste1");

	//$a[] = "aa";

	$b[] = "2";
	$b[] = "aa";

	$res[] = $a;
	$res[] = $b;

	echo json_encode($a);

?>