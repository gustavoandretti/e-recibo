<?php

error_reporting(E_ERROR);

	$data = date('d-m-Y');
	$data_ = explode('-',$data);
	$dia = $data_[0];
	$mes = $data_[1];
	$ano = $data_[2];

	#Cliente

	function verificaCampoObrigatorio($campo, $msg)
	{
		if($_POST[$campo] != '')
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

	if(verificaCampoObrigatorio('cliNome', 'Nome') &&
	verificaCampoObrigatorio('cliTelefone', 'Telefone') &&
	verificaCampoObrigatorio('cliEndereco', 'Endereco')
	)
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
<link type="text/css" rel="stylesheet" href="main.css"  /> 
<script type="text/javascript" src="main.js" xmlns="http://www.w3.org/1999/xhtml"></script>
</head>

<body>
<form id='form1' method='post'>
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
