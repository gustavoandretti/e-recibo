<?php

 	error_reporting(E_ERROR);

	function db_query($query)
	{
		
		try
		{
			$connect = mysql_connect('localhost','root','');
			
			if(!$connect)
				throw new Exception(mysql_error());
	
			$mydb = mysql_select_db('os',$connect);
			
			if(!$mydb)
				throw new Exception(mysql_error());
	
			$res = mysql_query($query);
			
			if(!$res)
				throw new Exception(mysql_error());
	
			return $res;
		}
		catch(Exception $e)
		{
			$res[] = 100;
			$res[] = "Erro DB: " . $e->getMessage();
			
			echo(json_encode($res));
			
			return null;
		}
	}

?>