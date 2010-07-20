<?php

	$body = 
	"
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Untitled Document</title>
<style>
body
{
	min-width:640px
}

hr
{
	size:1px;
	color:#CCC
}

p.cabecalhoSubtitulo
{

	margin-top:-5px;
	font-family:'Georgia', Times New Roman, Times, serif;
    font-size:14px;
	font-weight:bold;
	color:#187d9a;

}

p.cabecalhoDescricao
{

    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
	font-weight:bold;
	color:#333;

}

table.cabecalho
{
}

table.conteudo
{
	font-family:'Georgia', Times New Roman, Times, serif;
    font-size:14px;
	color:#333;

	
}
table.servicos
{
	font-family:'Georgia', Times New Roman, Times, serif;
    font-size:12px;
	color:#333;
	
}


#header,#menu,#content,#sub-section,#footer {

overflow:hidden;

display:inline-block;
padding:-10px;

}

/* safari and opera need this */

#header,#footer
{
	width:100%;
}

#menu,#content,#sub-section
{
	float:left;
}

#header
{
	background-image:url(backgroundHeader.jpg);
	background-repeat:repeat-x;
}

#menu
{
	width:30%;
	color:#FFF;

}

#content
{
	width:40%;
}


#sub-section
{
	width:29.9%;
}

#footer
{
	clear:left;
	background-color:#699;
}

</style>
</head>

<body>
<div id='header' align='center'>
	<img src='headerRecibo.jpg' alt='faciltec' />
</div>

<div id='menu'>
.
</div>

<div id='content'>
	<table class='cabecalho'>
		<tr>
			<td>

			</td>
			<td>
				<p class='cabecalhoSubtitulo'>F&aacute;cilTec, Consultoria   em Inform&aacute;tica para sua Resid&ecirc;ncia.</p>
				<p class='cabecalhoDescricao'>
                Ag&ecirc;ncia Primeira Proc. de Dados Ltda.<br />
				Av. Maranh&atilde;o, 593 Sala 306 –  CEP 90.230-041<br />
				Bairro S&atilde;o Geraldo – Porto   Alegre / RS<br />
				Fone: (51) 8112-8934<br />
				Site: www.faciltec.com.br<br />
                E-mail: contato@faciltec.com.br<br />
                </p>
			</td>
		</tr>
	</table>
	<hr>
	<table class='conteudo'>   
		<tr>
			<td class='text'>
				<p align='justify'>Recebemos de  <strong>$clienteNome</strong>, "; if($cliCPF != ''){ $body .="CPF / CNPJ nº <strong>$cliCPF</strong> ";} $body.=" estabelecido/residente no endere&ccedil;o <strong>$clienteEndereco</strong> , a import&acirc;ncia de R$ <strong>$atendimentoValor</strong> (<strong>$servicoValorExt</strong>), em  <strong>$formaPgto</strong>, referente aos servi&ccedil;os descritos abaixo:</p>
			</td> 
		</tr>
	</table>
	<table class='servicos'>
		<tr>
			<td>
				<strong>Descri&ccedil;&atilde;o dos servi&ccedil;os:</strong>
			</td>
		</tr>
		<tr>
			<td>
				$atendimentoDescricao
			</td>
		</tr>
		<tr>
			<td>
				<strong>Observa&ccedil;&otilde;es:</strong>
			</td>
		</tr>
		<tr>
			<td>
				$obsRec
			</td>
		</tr>
		<tr>
			<td>
				<p align='justify'> $atendimentoEndereco, $dia  de  $mes de  $ano. </p>        	
			</td>
		</tr>    
	</table>           
</div>

<div id='sub-section'>
</div>

<div id='footer'>
</div>

</body>
</html>	
	";
?>		