<?php

 	error_reporting(E_ERROR);

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Cadastro de Cliente</title>
<link type="text/css" rel="stylesheet" href="css/main.css"  />
<script type="text/javascript" src="js/main.js" xmlns="http://w<ww.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script>

$.ready = function()
{
	submit = function()
	{
		internal_submit('bus/busCliente.php', $('#form1'), sucess_callback);
	};

	sucess_callback = function(data)
	{
	alert(1);
		document.location = 'cadRecibo.php?clienteId=1';
	}

	cancel = function()
	{
		history.go(-1);
	}

	//Sets the click action on main button
	$("#btnInserir").bind("click", submit);

	$("#btnCancelar").bind("click", cancel);

	//Bind campo email
	$('#cliEmail').val('<?php echo $_REQUEST['cliEmail']; ?>');

	arredondaCantos();

	setaFocoPrimeroCampo();

	capturaEnters('form1', submit);
}
</script>
</head>
<body>
  <div id="div-conteudo">

	<!-- Logo & Nuvens Topo -->
	<div id="img-nuvem1"></div>
	<div id="img-slogan"></div>
	<div id="img-logo"></div>

	<div id="div-innerContent">

<form id='form1' method='post' onsubmit="return false;">

    <table class="innerTable" align="center">
    	<tr>
			<td colspan="2" class="tdTitulo">
				Dados do cliente:
			</td>
	   	</tr>
        <tr>
            <td class="tdGuia">
                Nome:
            </td>
            <td>
                <input id='cliNome' name='cliNome' type='text' />
            </td>
        </tr>
        <tr>
            <td>
                Telefone:
            </td>
            <td>
                <input id='cliTelefone' name='cliTelefone' type='text' />
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input id='cliEmail' name='cliEmail' type='text' />

            </td>
        </tr>

        <tr>
            <td>
                CPF/CNPJ:
            </td>
            <td>
                <input id='cliCpf' name='cliCpf' type='text' value='<?php echo $_REQUEST['cliCpf']; ?>' />
            </td>
        </tr>
        <tr>
            <td>
                Endere&ccedil;o:
            </td>
            <td>
                <textarea id='cliEndereco' name='cliEndereco' ></textarea>
            </td>
        </tr>
		<tr>
        	<td class="tdButtons" colspan="2">
        		<input type='button' id='btnInserir' name="btnInserir" value='Cadastrar' class="button" />
	        	<input type='button' id='btnCancelar' name="btnCancelar" value='Cancelar' class="button" />
            </td>
        </tr>
    </table>
</form>
<script>

</script>
	</div>
  </div>

</body>
</html>
