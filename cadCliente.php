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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
</head>
<body>

<div class="trigger">Trigger</div>
<div class="result"></div>
<div class="log"></div>

$('.log').ajaxSend(function() {
  $(this).text('Triggered ajaxSend handler.');
});

$('.trigger').click(function() {
  $('.result').load('cadCliente.html');
});

$('.log').ajaxSend(function(e, xhr, settings) {
  if (settings.url == 'ajax/test.html') {
    $(this).text('Triggered ajaxSend handler.');
  }
});


<form id='form1' method='post'>
<h3>Result:</h3> <ol id="result"></ol>
    <table>
        <th>Dados do cliente:</th>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input id='cliEmail' name='cliEmail' type='text' onfocus="txtFocus(this)" value='<?php echo $_REQUEST['cliEmail']; ?>' />

            </td>
        </tr>
        <tr>
            <td>
                Nome:
            </td>
            <td>
                <input id='cliNome' name='cliNome' type='text' onfocus="txtFocus(this)" value='<?php echo $_REQUEST['cliNome']; ?>' />
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
                Telefone:
            </td>
            <td>
                <input id='cliTelefone' name='cliTelefone' type='text' onfocus="txtFocus(this)" value='<?php echo $_REQUEST['cliTelefone']; ?>' />
            </td>
        </tr>
        <tr>
            <td>
                Endere&ccedil;o:
            </td>
            <td>
                <textarea id='cliEndereco' name='cliEndereco' onfocus="txtFocus(this)" value='<?php echo $_REQUEST['cliEndereco']; ?>'> </textarea>
            </td>
        </tr>
		<tr>
        	<td align='right' colspan ='2'>
	        	<input type='submit' id='btnInserir' value='Cadastrar'/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
