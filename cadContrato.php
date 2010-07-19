<?php
	error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link type="text/css" rel="stylesheet" href="css/main.css"  />
<script type="text/javascript" src="js/jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/main.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/cadContrato.js" xmlns="http://www.w3.org/1999/xhtml"></script>

<title>Recibo eletrônico</title>
</head>

<body>
<div id="img-logo1"></div>
<div id="img-logo"></div>
<div id="div-conteudo"> 
  
  <!-- Logo & Nuvens Topo -->
  <div id="img-nuvem1"></div>
  <div id="img-slogan"></div>

  <div id="div-innerContent">
    <?php 
		
		include("pesquisaCliente.php");
	?>

    <form id='form1' onsubmit="return false;" method='post'>
      <input type="hidden" id="contratoContratoId" name="contratoContratoId">
      <input type="hidden" id="contratoClienteId" name="contratoClienteId">
      <table class="innerTable" align="center">
        <tr>
          <td colspan="2" class="tdTitulo">Contrato</td>
        </tr>
        <tr>
          <td class="tdGuia">Visitas Agendadas:</td>
          <td>
            <input id='contratoQtdMensal' name='contratoQtdMensal' type='text'  class="firstField" />
            </td>
        </tr>
        <tr>
          <td class="tdGuia">Visitas Extras:</td>
          <td>
            <input id='contratoQtdExtra' name='contratoQtdExtra' type='text' />
          </td>
        </tr>
        <tr>
          <td> Valor: </td>
          <td><input id='contratoValor' name='contratoValor' type='text' /></td>
        </tr>
        <tr>
          <td class="tdGuia">Data Inicial [/ Final]:</td>
          <td>
            <input id='contratoDataInicio' name='contratoDataInicio' type='text' class='data' />
            <input id='contratoDataFim' name='contratoDataFim' type='text' class='data' />
            </td>
        </tr>
        <tr>
          <td> URL: </td>
          <td><input id='contratoUrl' name='contratoUrl' /></td>
        </tr>
        <tr>
        <tr>
          <td>Observações</td>
          <td><textarea id='contratoObservacao' name='contratoObservacao' type='text' ></textarea></td>
        </tr>
        <tr>
          <td class="tdButtons" colspan="2"><input type='button' id="btnInserir" value='Salvar' class="button" />
            <input type='button' id="btnNovoContrato" value='Cancelar' class="button" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
