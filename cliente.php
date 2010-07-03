<?php

	error_reporting(E_ERROR);

	include("./validacao.php");

	$data = date('d-m-Y');
	$data_ = explode('-',$data);
	$dia = $data_[0];
	$mes = $data_[1];
	$ano = $data_[2];

	#Cliente

	if(verificaCampoObrigatorio('cliNome', 'Nome') &&
	verificaCampoObrigatorio('cliTelefone', 'Telefone') &&
	verificaCampoObrigatorio('cliEndereco', 'Endereco'))
	{
		if($_POST['cpf_cnpj'] != '')
		{
			$cpf_cnpj = $_POST['cpf_cnpj'];
		}	
		if($_POST['cliEmail'] != '')
		{
			$cliEmail = $_POST['cliEmail'];
		}
		if($_POST['cliTelefone'] != '')
		{
			$cliTelefone = $_POST['cliTelefone'];
		}
		if($_POST['cliEndereco'] != '')
		{
			$cliEndereco = $_POST['cliEndereco'];
		}
	
		$cliEmail = $_REQUEST["cliEmail"];
	
		#insere nova
	
		$connect = mysql_connect('127.0.0.1','root','') or die('erro ao conectar ao DB'.mysql_error());

		$mydb = mysql_select_db('os',$connect) or die('erro ao selecionar DB'.mysql_error());

		$insertCli = "INSERT INTO cliente(clienteNome, cpf_cnpj, clienteEmail, clienteTelefone, clienteEndereco) VALUES ('$cliNome', '$cpf_cnpj', '$cliEmail', '$cliTelefone', '$cliEndereco')";

		mysql_query($insertCli) or die('Erro ao inserir na tabela de clientes'.mysql_error());

		echo "<script> document.location = 'recibo.php?cliEmail=$cliEmail' </script>";
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Cadastro de Cliente</title>
<script src="http://www.google.com/jsapi"></script>
<link type="text/css" rel="stylesheet" href="main.css"  /> 
<script type="text/javascript" src="main.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
<script>
$(document).ready(function()
{
$("#cliEmail").result = function(a) {alert(a); };

	function findValueCallback(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}
	
	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}

	$("#cliEmail").result(findValueCallback).next().click(function() {
		$(this).prev().search();
	});

	$("#cliEmail").autocomplete("teste.php",  {
		width: 260,
		selectFirst: true, 
		formatItem: function(data, i, n, value) {
			return "asd";
		}
	});

	


	$("#cliEmail").result(function(event, data, formatted) {
		if (data)
			$(this).parent().next().find("input").val(data[1]);
	});
});
</script>
</head>

<body>
<form id='form1' method='post'>
<h3>Result:</h3> <ol id="result"></ol> 
    <table>
        <th>Dados do cliente:</th>
        <tr>
            <td>
                Email: 
            </td>
            <td>
                <input id='cliEmail' name='cliEmail' type='text' autocomplete='off' class='autocomplete' onfocus="txtFocus(this)" value='<?php echo $_REQUEST['cliEmail']; ?>' />
				

<p> 
			<label>Hidden input</label> 
			<input /> 
		</p> 

				
				<div id='divCliEmail' name='divCliEmail' style='display:none; position:relative'></div>

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
