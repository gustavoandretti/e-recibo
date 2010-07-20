<?php

 	error_reporting(E_ERROR);

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Cadastro de Cliente</title>
<link type="text/css" rel="stylesheet" href="css/main.css"  />
<script type="text/javascript" src="js/jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/main.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/cadCliente.js" xmlns="http://www.w3.org/1999/xhtml"></script>
</head>
<body>
<div id="img-logo"></div>
<div id="div-conteudo"> 
  
  <!-- Logo & Nuvens Topo -->
  <div id="img-nuvem1"></div>
  <div id="img-slogan"></div>
  <div id="div-innerContent">
    <form id='form1' method='post' onsubmit="return false;">
        <input type="hidden" id="clienteClienteId" name="clienteClienteId">   
    	<input type="hidden" id="hdnReturnPage" name="hdnReturnPage">
        <input type="hidden" id="clienteData" name="clienteData" class="data">
       <table class="innerTable" align="center">
        <tr>
          <td colspan="2" class="tdTitulo">Cliente</td>
        </tr>
        <tr>
          <td class="tdGuia"> Nome: </td>
          <td><input id='clienteNome' name='clienteNome' type='text' class="firstField" /></td>
        </tr>
        <tr>
          <td> Telefone: </td>
          <td><input id='clienteTelefone' name='clienteTelefone' type='text' /></td>
        </tr>
        <tr>
          <td> [ Email: ]</td>
          <td><input id='clienteEmail' name='clienteEmail' type='text' /></td>
        </tr>
        <tr>
          <td> [ CPF/CNPJ: ]</td>
          <td><input id='clienteCpf' name='clienteCpf' type='text' /></td>
        </tr>
        <tr>
          <td> Endere&ccedil;o: </td>
          <td><textarea id='clienteEndereco' name='clienteEndereco' ></textarea></td>
        </tr>
        <tr>
          <td class="tdButtons" colspan="2"><input type='button' id='btnInserir' name="btnInserir" value='Salvar' class="button" />
            <input type='button' id='btnCancelar' name="btnCancelar" value='Cancelar' class="button" /></td>
        </tr>
      </table>
    </form>
    <script>

</script> 
  </div>
</div>
</body>
</html>
