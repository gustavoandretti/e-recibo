<?php

function verificaCampoObrigatorio($campo, $msg)
{
	if(trim($_POST[$campo]) != '')
	{
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
	$res[] = 1;
    $res[] = $campo;

	echo json_encode($res);
}

?>