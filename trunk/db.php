<?php

 	error_reporting(E_ERROR);

	function db_query($query)
	{
		$connect = mysql_connect('127.0.0.1','root','') or die('erro ao conectar ao DB'.mysql_error());

		$mydb = mysql_select_db('os',$connect) or die('erro ao selecionar DB'.mysql_error());

		return mysql_query($query);
	}

?>