<?php
	
	error_reporting(E_ERROR);
	$connect = mysql_connect('127.0.0.1','root','') or die('erro ao conectar ao DB'.mysql_error());
	$mydb = mysql_select_db('os',$connect) or die('erro ao selecionar DB'.mysql_error());
	
	if($_GET['search'] == true)
	{
		if($_POST['clienteEmail'] != "")
		{
			$email = $_POST['clienteEmail'];
		}
		
		$selectCli = "SELECT * FROM cliente WHERE clienteEmail = '$email'";
		$queryCli = mysql_query($selectCli);
		$res = mysql_fetch_array($queryCli);
		
		if($res == "")
		{

			header("Location: cliente.php?cliEmail=$email");
			exit();
		}
		
		
	}
	if($_GET['send'] == true)
	{
		
		$data = date('d-m-Y');
		$data_ = explode('-',$data);
		$dia = $data_[0];
		$mes = $data_[1];
		$ano = $data_[2];		

		#Servico
		
		$email = $_POST['email'];
		
		
		if($_POST['servicoDescricao'] != '')
		{
			$servicoDescricao = $_POST['servicoDescricao'];
		}
		
		if($_POST['servicoValor'] != '')
		{
			$servicoValor = $_POST['servicoValor'];
		}
		if($_POST['servicoValorExt'] != "")
		{
			$servicoValorExt = $_POST['servicoValorExt'];
		}
		
		if($_POST['formaPgto'] != "")
		{
			$formaPgto = $_POST['formaPgto'];
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
		if($_POST['localServico'] != '')
		{
			$localServico = ucwords($_POST['localServico']);
		}		
		

		$selectCli = "SELECT * FROM cliente WHERE clienteEmail = '$email'";
		echo $selectCli;
		exit();
		
		
		$queryCli = mysql_query($selectCli);
		$res = mysql_fetch_array($queryCli);
		
		print_r($res);
		echo "<br><br><br>";

		$idCliente      = $res[0];
		$cliNome        = $res[1];
		$cliCPF         = $res[2];
		$cliEndereco    = $res[5];

		
		$servicoData = date('Y-m-d');
		
		$insertServ = "INSERT INTO servico(idCliente, descricaoServico, valorServico, numeroRecibo, observacoesRec, observacoesInt, servicoData) VALUES 
		('$idCliente','$servicoDescricao', '$servicoValor', '$numeroRecibo', '$obsRec', '$obsInt', '$servicoData')";
		
	
		mysql_query($insertServ) or die('Erro ao inserir na tabela de servicos :'.mysql_error());
			
		$to = 'deisefontoura@gmail.com';
		
		$subject = 'Recibo de serviço nº $numeroRecibo - '.date('d-m-Y');
		
		
		$body = "
	<div id=\"recibo\">
	<table>
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
				<p><strong>Site: www.faciltec.com.br e-mail: contato@faciltec.com.br</strong></p>
			</td>
		</tr>
	</table>
	<br />
	<br />
	<table>   
	  
		<tr>
			<td>
				<p align='justify'>Recebemos de  $cliNome,"; if($cliCPF != ""){ $body .="CPF / CNPJ nº $cliCPF";} $body.=" estabelecido/residente no endereço $cliEndereco, a importância de R$ $servicoValor ($servicoValorExt), em  $formaPgto, referente aos serviços descritos abaixo:</p>
			</td> 
		</tr>
	</table>		
	<table>
		<tr>
			<td>
				<strong>Descrição dos serviços:</strong>
			</td>
		</tr>
		<tr>
			<td>
				$servicoDescricao
			</td>
		</tr>
		<tr>
			<td>
				<strong>Observa&ccedil;&otilde;es:</strong>
			</td>
		</tr>
		<tr>
			<td>
				<p align='justify'>$obsRec</p>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table>		
		<tr>
			<td>
				<p align='justify'> $localServico, $dia  de  $mes de  $ano. </p>        	
			</td>
		</tr>    
	</table>
</div>	
		";
		
		echo $body;
		exit();
	 
	 
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
