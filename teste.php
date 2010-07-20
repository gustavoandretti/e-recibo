<?

phpinfo();

 	error_reporting(E_ALL);
echo "asd";	
	
$r = mysql_connect('127.0.0.1','faciltec_user1','111mudar@@') or die(mysql_error());

$mydb = mysql_select_db('faciltec_crm',$r) or die(mysql_error());

$res = mysql_query("SELECT * FROM cliente") or die(mysql_error());
			
			
			echo "asd";	
?>