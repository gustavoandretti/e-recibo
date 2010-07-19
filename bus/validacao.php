<?php

date_default_timezone_set("America/Sao_Paulo");

function verificaCampoObrigatorio($campo, $campoFoco)
{
	if(trim($_REQUEST[$campo]) != '')
	{
		return true;
	}
	else
	{
		marcaCampoInvalido((!$campoFoco)? $campo : $campoFoco);
		return false;
	}
}

function verificaCampoData($campo)
{
	$d = trim($_REQUEST[$campo]);

	if($d == '')
		return true;

	try
	{	
		$d = date_create_from_format("d/m/Y", $d);
	}
	catch(Exception $e)
	{
		return marcaCampoInvalido($campo);
	}
	
	if($d == null)
		return marcaCampoInvalido($campo);

	$_REQUEST[$campo] = $d->format("Y-m-d");
	
	return true;
}

function marcaCampoInvalido($campo)
{
	$res[] = 1;
    $res[] = $campo;

	echo json_encode($res);
}

?>