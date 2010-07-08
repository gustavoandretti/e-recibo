<?php

function verificaCampoObrigatorio($campo, $campoFoco=0)
{
	if(trim($_POST[$campo]) != '')
	{
		return true;
	}
	else
	{
		marcaCampoObrigatorio(($campoFoco!=0)? $campo : $campoFoco);
		return false;
	}
}

function marcaCampoObrigatorio($campo)
{
	$res[] = 1;
    $res[] = $campo;

	echo json_encode($res);
}

?>