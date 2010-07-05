<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Recibo eletrônico</title>
</head>

<body>
<form id='reciboEletrônico' action='reciboEletronico.php?send=true' method='post'>
    <table id='dadosForm'>
        <th>Dados do cliente:</th>
        <!--
        <tr>
            <td>
                <input type='radio' name='tipoP' value='0' />  Pessoa física
            </td>
            <td>
                <input type='radio' name='tipoP' value='1' />  Pessoa jurídica
            </td>
        </tr>
        -->   
        <tr>
            <td>
                Nome: 
            </td>
            <td>
                <input id='cliNome' name='cliNome' type='text' />
            </td>
        </tr>
        <tr>
            <td>
                CPF/CNPJ: 
            </td>
            <td>
                <input id='cpf_cnpj' name='cpf_cnpj' type='text' />
            </td>
        </tr>        
        <!-- 
        <tr>
            <td>
                Empresa: 
            </td>
            <td>
                <input id='cliEmpresa' name='cliEmpresa' type='text' />
            </td>
        </tr> 
       -->   
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
                Telefone: 
            </td>
            <td>
                <input id='cliTelefone' name='cliTelefone' type='text' />
            </td>
        </tr>
        <tr>
            <td>
                Endere&ccedil;o: 
            </td>
            <td>
                <input id='cliEndereco' name='cliEndereco' type='text' />
            </td>
        </tr>
    
        <tr>
        </tr>
        <th>Dados do serviço:</th>
        <tr>
            <td>
                Descrição do serviço: 
            </td>
            <td>
                <textarea id='servicoDescricao' name='servicoDescricao' /></textarea>
            </td>
        </tr>
        <tr>
            <td>
            Valor: 
            </td>
            <td>
                <input id='servicoValor' name='servicoValor' type='text' />
            </td>
        </tr>
        <tr>
            <td>
            (Por extenso) 
            </td>
            <td>
                <input id='servicoValorExt' name='servicoValorExt' type='text' />
            </td>
        </tr>
        <tr>
            <td>
            Forma de Pagamento: 
            </td>
            <td>
                <input id='formaPgto' name='formaPgto' type='text' />
            </td>
        </tr>              
        <tr>
            <td>
            N&uacute;mero do recibo: 
            </td>
            <td>
                <input id='numeroRecibo' name='numeroRecibo' type='text' />
            </td>
        </tr>             
        <tr>
            <td>
               Observações do Recibo: 
            </td>
            <td>
                <input id='obsRec' name='obsRec' type='text' />
            </td>
        </tr>
    
        <tr>
            <td>
                Observações internas: 
            </td>
            <td>
                <input id='obsInt' name='obsInt' type='text' />
            </td>
        </tr>
        <tr>
            <td>
                Local do serviço: 
            </td>
            <td>
                <input id='localServico' name='localServico' type='text' />
            </td>
        </tr>
		<tr>
        	<td>
            </td>
        	<td align='right'>
	        	<input type='submit'  value='Criar Recibo'/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>

<?php

error_reporting(E_ERROR);
if($_GET['send'] == true)
{

	$data = date('d-m-Y');
	echo $data."<br>";
	$data_ = explode('-',$data);
	$dia = $data_[0];
	$mes = $data_[1];
	$ano = $data_[2];


	#Cliente
	
	if($_POST['cliNome'] != '')
	{
		$cliNome = $_POST['cliNome'];
	}
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
	
	
	#Servico
	
	if($_POST['servicoDescricao'] != '')
	{
		$servicoDescricao = $_POST['servicoDescricao'];
	}
	if($_POST['servicoValor'] != '')
	{
		$servicoValor = $_POST['servicoValor'];
	}
	if($_POST['numeroRecibo'] != '')
	{
		$numeroRecibo = $_POST['numeroRecibo'];
	}	
	if($_POST['obsRec'] != '')
	{
		$obsRec = $_POST['obsRec'];
	}
	if($_POST['obsInt'] != '')
	{
		$obsInt = $_POST['obsInt'];
	}
	
	$servicoData = date('Y-m-d');
	
	#insere nova
	
	$connect = mysql_connect('127.0.0.1','root','') or die('erro ao conectar ao DB'.mysql_error());

	$mydb = mysql_select_db('os',$connect) or die('erro ao selecionar DB'.mysql_error());

	$insertCli = "INSERT INTO cliente(clienteNome, cpf_cnpj, clienteEmail, clienteTelefone, clienteEndereco) VALUES ('$cliNome', '$cpf_cnpj', '$cliEmail', '$cliTelefone', '$cliEndereco')";

	$insertServ = "INSERT INTO servico(idCliente, descricaoServico, valorServico, observacoesRec, observacoesInt, servicoData) VALUES (LAST_INSERT_ID(),'$servicoDescricao', '$servicoValor', '$numeroRecibo', '$obsRec', '$obsInt', '$servicoData')";

	mysql_query($insertCli) or die('Erro ao inserir na tabela de clientes'.mysql_error());
	mysql_query($insertServ) or die('Erro ao inserir na tabela de clientes'.mysql_error());
		


	$to = 'deisefontoura@gmail.com';
	
    $subject = 'Recibo de serviço nº $numeroRecibo - '.date('d-m-Y');
	
	
    $body = "

<table width='88%' cellpadding='0' cellspacing='0'>
	<tr>
		<td align='center' valign='middle' width='15%'><div id='ooh8'>
      		<div id='olc.'><img src='http://docs.google.com/File?id=d49dnft_139c8v95kdb_b' alt='faciltec' /></div>
      		</div>
		</td>
		<td width='50%'>
            <p><strong>FácilTec – Consultoria   em Informática para sua Residência</strong></p>
            <p><strong>Agência Primeira Proc.   Dados Ltda.</strong></p>
            <p><strong>Av. Maranhão, 593 Sala 306 –  CEP 90.230-041</strong></p>
            <p><strong>Bairro São Geraldo – Porto   Alegre / RS</strong></p>
            <p><strong>Fone: (51) 8112-8934 </strong></p>
            <p><strong>Site: www.faciltec.com.br - e-mail: contato@faciltec.com.br</strong></p>
		</td>
	</tr>
</table>
<br />
<br />
<table>   
  
	<tr>
		<td>
        	<p align='justify'>Recebemos de  $cliNome, CPF / CNPJ nº $cpf_cnpj estabelecido/residente no endereço $cliEndereco, a importância de R$ $servicoValor ($servicoValorExt), em  $formaPgto, referente aos serviços descritos abaixo:</p>
		</td> 
    </tr>
    <tr>
    	<td>
        	<strong>Descrição dos serviços:</strong>
        </td>
		<td>
			<p>$servicoDescricao</p>
		</td>
    </tr>
    <tr>
    	<td>
        	<strong>Observa&ccedil;&otilde;es:</strong>
        </td>
		<td>
			<p align='justify'>$obsRec</p>
		</td>
    </tr>
    <tr>
    	<td>
			<p align='justify'> $localServico, $dia  de  $mes de  $ano </p>        	
        </td>
    </tr>    
</table> 	
	";
 
 
 	if (mail($to, $subject, $body)) {
   		
		echo('<p>Mensagem enviada com sucesso!</p>');

	} else {
   	
		echo('<p>Mensagem falhou. </p>');
  	}

	
	/*echo $cliNome.'<br>';
	echo $cliEmail.'<br>';
	echo $cliTelefone.'<br>';
	echo $cliEndereco.'<br>';
	echo $servicoDescricao.'<br>';
	echo $servicoValor.'<br>';
	echo $ObsOS.'<br>';
	echo $ObsInt.'<br>';*/


}

?>