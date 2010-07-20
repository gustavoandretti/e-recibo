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
<script type="text/javascript" src="js/cadAtendimento.js" xmlns="http://www.w3.org/1999/xhtml"></script>

<title>Recibo eletrônico</title>
</head>

<body>
<div id="img-logo"></div>
<div id="div-conteudo"> 
  
  <!-- Logo & Nuvens Topo -->
  <div id="img-nuvem1"></div>
  <div id="img-slogan"></div>

  <div id="div-innerContent">
    <?php 
	
		include('pesquisaCliente.php');
	?>

    <form id='form1' onsubmit="return false;" method='post'>
	  <input type="hidden" id="atendimentoAtendimentoId" name="atendimentoAtendimentoId">              
      <input type="hidden" id="atendimentoClienteId" name="atendimentoClienteId">
      <table class="innerTable" align="center">
        <tr>
          <td colspan="2" class="tdTitulo">Atendimento</td>
        </tr>
        <tr id="trAtendimentoContrato">
          <td>&nbsp;</td>
          <td>
          	<label for='atendimentoContrato'>
	          <input id='atendimentoContrato' name='atendimentoContrato' type='checkbox' /> Contrato
            </label>  
          </td>
        </tr>
        <tr>
          <td> Data: </td>
          <td><input id='atendimentoData' name='atendimentoData' type='text' class="data" /></td>
        </tr>
        <tr>
          <td> Descrição: </td>
          <td><textarea id='atendimentoDescricao' name='atendimentoDescricao' class="firstField" ></textarea></td>
        </tr>
        <tr>
          <td> Valor: </td>
          <td><input id='atendimentoValor' name='atendimentoValor' type='text' /></td>
        </tr>
        <tr>
          <td class="tdGuia">[ Recibo Físico: ]</td>
          <td>
            <input id='atendimentoPapel' name='atendimentoPapel' type='text' /></td>
        </tr>
        <tr>
          <td>&nbsp;  </td>
          <td>
          	<label for='atendimentoRevisita'>
          		<input id='atendimentoRevisita' name='atendimentoRevisita' type='checkbox' value="1" /> Revisita
            </label>
         </td>
        </tr>
        <tr>
          <td>&nbsp; </td>
          <td><input type="checkbox" id="chkAtendimentoObservacaoExibir">
            Exibir Observações </td>
        </tr>
        <tr id="trAtendimentoObservacao">
          <td>&nbsp;</td>
          <td><textarea id='atendimentoObservacao' name='atendimentoObservacao' type='text' ></textarea></td>
        </tr>
        <tr>
          <td>&nbsp; </td>
          <td><input type="checkbox" id="chkLocalServicoCliente" checked="true">
            Usar endereço do cliente </td>
        </tr>
        <tr id="trLocalServico">
          <td>&nbsp;</td>
          <td><textarea id='atendimentoEndereco' name='atendimentoEndereco' type='text'></textarea></td>
        </tr>
        <tr>
          <td class="tdButtons" colspan="2">
          	<input type='button' id="btnEnviarRecibo" value='Enviar Recibo' class="button" />
            <input type='button' id="btnInserir" value='Salvar' class="button" />
            <input type='button' id="btnNovoAtendimento" value='Cancelar' class="button" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
