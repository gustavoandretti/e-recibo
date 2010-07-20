<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>FácilTec - Transparência, Agilidade & Reconsulta Grátis</title>
    <link type="text/css" rel="stylesheet" href="css/main.css"  />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
	<script type="text/javascript" src="js/main.js" xmlns="http://w<ww.w3.org/1999/xhtml"></script>
    <script type="text/javascript" src="js/jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script>

$.ready = function()
{
	$("#form1 #btnAtendimento").bind("click", function() {
		load_url("cadAtendimento.php");
	});

	$("#form1 #btnCliente").bind("click", function() {
		load_url("cadCliente.php");
	});
	
	$("#form1 #btnContrato").bind("click", function() {
		load_url("cadContrato.php");
	});
	
	
	ajustes_ui();
}
</script>
<body>

<div id="img-logo"></div>
  <div id="div-conteudo">
	<!-- Logo & Nuvens Topo -->
	<div id="img-nuvem1"></div>
	<div id="img-slogan"></div>
	<div id="div-innerContent">
	<form id="form1">
		<input type="button" class="button" id="btnAtendimento" value="Novo Atendimento" />

		<input type="button" class="button" id="btnCliente" value="Novo Cliente" />
        
  		<input type="button" class="button" id="btnContrato" value="Novo Contrato" />
    </form>
        <br />
        <?php 
		
			include("pesquisaCliente.php");
		?>

	</div>
  </div>
</body>
</html>