<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>FácilTec - Transparência, Agilidade & Reconsulta Grátis</title>
    <link type="text/css" rel="stylesheet" href="css/main.css"  />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>

<script>

$.ready = function()
{
	$("#btnRecibo").bind("click", function() {
		document.location = "cadRecibo.php"
	});

	$("#btnCliente").bind("click", function() {
			document.location = "cadCliente.php"
	});
}
</script>
<body>
<div id="img-logo"></div>
  <div id="div-conteudo">

	<!-- Logo & Nuvens Topo -->
	<div id="img-nuvem1"></div>
	<div id="img-slogan"></div>
	<div id="div-innerContent">

		<input type="button" class="button" id="btnRecibo" value="Novo Recibo" />

		<input type="button" class="button" id="btnCliente" value="Novo Cliente" />

	</div>
  </div>
</body>
</html>