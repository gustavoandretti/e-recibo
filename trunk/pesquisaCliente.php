<link type="text/css" rel="stylesheet" href="css/main.css"  />
<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.8.2.custom.css"  />
<script type="text/javascript" src="js/jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/main.js" xmlns="http://w<ww.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="js/pesquisaCliente.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<form id="frmCliente"  method="post"  onsubmit="return false;">
	  <input type="hidden" id="clienteId" name="clienteId">
	  <input type="hidden" id="contratoAtivoId" name="contratoAtivoId">      
      <table class="innerTable" align="center">
        <tr>
          <td colspan="4" class="tdTitulo"> Pesquisa de Clientes </td>
        </tr>
        <tr>
          <td colspan="4"><input type="text"  id="txtCliente" name="txtCliente" class="firstField" />
            <input type='button' id="btnCliente" value='Novo' class="button" /></td>
        </tr>
        <tr class="trInfo">
          <td> Cliente: </td>
          <td id="tdClienteNome" class="tdInfo" colspan="2"></td>
          <td id="tdClienteEditar" class="tdInfo"></td>
        </tr>
        <tr class="trInfo">
          <td> Telefone: </td>
          <td id="tdClienteTelefone" class="tdInfo"></td>
          <td> Email: </td>
          <td id="tdClienteEmail" class="tdInfo"></td>
        </tr>
        <tr class="trInfo">
          <td> Endere&ccedil;o: </td>
          <td colspan="3" id="tdClienteEndereco" class="tdInfo"></td>
        </tr>
        <tr class="trInfoPesquisar">
          <td colspan="4" class="tdTitulo"> <br />Hist&oacute;rico </td>
        </tr>
        <tr class="trInfoPesquisar">
         <td colspan="4">
         	<table align="center">
            	<tr>
                  <td>Atendimentos<div id="divButtonAtendimento"></div>
                   </td>
                  <td>Contratos<div id="divButtonContrato"></div>
                  </td>    
                </tr>
            </table>
         </td>
        </tr>   
      </table>         
    </form>