<?php

 	error_reporting(E_ERROR);

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Cadastro de Cliente</title>
<script src="http://www.google.com/jsapi"></script>
<link type="text/css" rel="stylesheet" href="main.css"  />
<script type="text/javascript" src="main.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script>

$.ready = function()
{

	//Send assinc data and register callback
	submit = function()
	{

		$('#btnInserir').val(" ");

		$('#btnInserir').attr("disabled", true);

		$('#loader').css("display", "block");

		$.ajax({
			  url: "busCliente.php",
			  type: "POST",
			  data: $("#form1").serialize(),
			  dataType: "json",
			  success: callback
		   })
	};

	//Callback for assinc call above
	callback = function(data)
	{
		$('#btnInserir').val("Cadastrar");

		$('#btnInserir').removeAttr("disabled");

		$('#loader').css("display", "none");

		if(data.length > 0)
		{

			if(data[0] == 0)
			{
				document.location = 'cadRecibo.php?cliEmail=' + data[1];
			}
			else
			{
				marcaCampoObrigatorio($('#' + data[1]));
			}
		}
	}

	//Captures enters on form, avoid form.submit and make the asinc call
	$("input").bind("keypress", function(e)
	{
		if (e.keyCode == 13)
		{
			submit();
			return false;
		}
	});

	//Sets the click action on main button
	$("#btnInserir").bind("click", submit);

	$('input, textarea').corner("round 4px");

	$('#cliEmail').val('<?php echo $_REQUEST['cliEmail']; ?>');

	$('input, textarea').first().focus();

}
</script>
</head>
<body>
<form id='form1' method='post' onsubmit="return false;">

    <table>
    	<tr>
			<td>
				Dados do cliente:
			</td>
	   	</tr>
        <tr>
            <td>
                Nome:
            </td>
            <td>
                <input id='cliNome' name='cliNome' type='text' onfocus="txtFocus(this)" />
            </td>
        </tr>
        <tr>
            <td>
                Telefone:
            </td>
            <td>
                <input id='cliTelefone' name='cliTelefone' type='text' onfocus="txtFocus(this)" />
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input id='cliEmail' name='cliEmail' type='text' onfocus="txtFocus(this)" />

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
                <textarea id='cliEndereco' name='cliEndereco' onfocus="txtFocus(this)" ></textarea>
            </td>
        </tr>
		<tr>
        	<td align='right' colspan ='2'>
	        	<input type='button' id='btnInserir' name="btnInserir" value='Cadastrar'/>
	        	<div id="loader"><img src="ajax-loader.gif"></div>
            </td>
        </tr>
    </table>
</form>
<script>

</script>

</body>
</html>
