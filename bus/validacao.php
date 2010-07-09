<?php

function verificaCampoObrigatorio($campo, $campoFoco)
{
	if(trim($_REQUEST[$campo]) != '')
	{
		return true;
	}
	else
	{
		marcaCampoObrigatorio((!$campoFoco)? $campo : $campoFoco);
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