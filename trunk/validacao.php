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
	echo "<script> marcaCampoObrigatorio($campo) </script>";
}

?>