<?php 

function verificaCampoObrigatorio($campo, $msg)
{
	if(trim($_POST[$campo]) != '')
	{
		$cliNome = $_POST[$campo];
		return true;
	}
	else
	{
		marcaCampoObrigatorio($campo, $msg);
		return false;
	}
}

function marcaCampoObrigatorio($campo, $msg)
{
	echo "<script>setTimeout(' " .
			
		" document.getElementById(\'$campo\').style.backgroundColor = \'#fDD\'; " .

		" document.getElementById(\'$campo\').focus(); ' " .
			
		" , 200); </script>";
}

?>