<?php

 	error_reporting(E_ERROR);
	
	function db_connect()
	{
		return mysql_connect('127.0.0.1','faciltec_user1','111mudar@@');
	}

	function db_update($table, $fields)
	{
		//used for quote_smart below
		db_connect();
				
		$ar_fields = array_keys($fields);
		
		$empty_data = null;
		
		$new_fields = null;
	
		
		foreach($ar_fields as $key)
		{
			if(strpos($key, $table) !== false  &&  trim($fields[$key]) != "")
			{
				$new_key = str_replace($table, "", $key);
				
				$new_fields[$new_key] = quote_smart($fields[$key]);
			}
		}
				
		$ar_fields = array_keys($new_fields);
		
		$tuples = "";
		
		$primary_key = -1;
		$primary_data = -1;
		
		foreach($ar_fields as $key)
		{
			if($primary_key == -1)
			{
				$primary_key = $key;
				$primary_data = $new_fields[$key];
			}
		 
		 	$tuples .= "$key = " . $new_fields[$key] . ", ";
		}
			
		$tuples = substr($tuples, 0, strlen($tuples) - 2);
		
		$sql = "UPDATE $table SET $tuples WHERE $primary_key = $primary_data";
		
		$res = db_query($sql);
		
		return $res ? $primary_data : 0;
	}

	
	function db_insert($table, $fields)
	{
		//used for quote_smart below
		db_connect();
				
		$ar_fields = array_keys($fields);
		
		$empty_data = null;
		
		$new_fields = null;
		
		foreach($ar_fields as $key)
		{
			if(strpos($key, $table) !== false  &&  trim($fields[$key]) != "")
			{
				$new_key = str_replace($table, "", $key);
				
				$new_fields[$new_key] = quote_smart($fields[$key]);
			}
		}
				
		$ar_fields = array_keys($new_fields);
		
		$sData = implode(", ", $new_fields);

		$sFields = implode(", ", $ar_fields);
						
		$sql = "INSERT INTO $table ($sFields) VALUES ($sData) ";
		
		$res = db_query($sql);
		
		return $res ? mysql_insert_id() : 0;
	}
	
	//dont forget to open a connection before call this method
	function quote_smart($value)
	{
		// Stripslashes
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		// Quote if not integer
		if (!is_numeric($value)) {
			$value = "'" . mysql_real_escape_string($value) . "'";
		}
		return $value;
	}

	function db_query($query)
	{
		
		try
		{
			$connect = db_connect();
			
			if(!$connect)
				throw new Exception(mysql_error());
	
			$mydb = mysql_select_db('faciltec_crm',$connect);
			
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