<?php
	error_reporting(E_ERROR);
	if($_GET['email'] != "")
	{
		$email = $_GET['email'];
	}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link type="text/css" rel="stylesheet" href="css\main.css"  />
<link type="text/css" rel="stylesheet" href="css\smoothness/jquery-ui-1.8.2.custom.css"  />
<script type="text/javascript" src="main.js" xmlns="http://w<ww.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery-1.4.2.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery-ui-1.8.2.custom.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery.corner.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="extenso.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery.formatCurrency-1.4.0.min.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script type="text/javascript" src="jquery.formatCurrency.pt-BR.js" xmlns="http://www.w3.org/1999/xhtml"></script>
<script>

$.ready = function()
{


	submit = function()
	{
		internal_submit('busRecibo.php', $('#frmRecibo'), sucess_callback);
	};

	sucess_callback = function(data)
	{
		alert('ok');
	}

	$("#frmCliente input[type=text]").autocomplete({
			source: "busPesquisaCliente.php",
			minLength: 1,
			select: function(event, ui) {
				if(ui.item)
					carrega_cliente(ui.item.id);
			}
	});

	carrega_cliente = function(id)
	{

		$("#hdnClienteId").val(id);

		$(".trInfo").css("display", "table-row");

		setTimeout(function() {
			$("#frmRecibo :input:visible:enabled:first").focus();
		}, 1);

	}

	novo_cliente = function()
	{
		document.location = 'cadCliente.php'
	}

	formata_e_seta_valor_extenso = function(e)
	{
		$("#servicoValor").attr("lastVal", $("#servicoValor").val());

		$("#servicoValor").formatCurrency($("#servicoValor"), { region: 'pt-BR' });

		s = e.srcElement.value;

		ss = s.split(',');

		res = ss[0].extenso();

		res += (res == 'um')? ' real' : ' reais';

		if(ss[1] > '00')
		{
			res += ' e ' + ss[1].extenso();

			res += (ss[1] == '01')? ' centavo' : ' centavos';
		}

		$("#servicoValorExt").val(res);
	}

	seta_valor_original = function(e)
	{
		s = $("#servicoValor").attr("lastVal");
		if(s != undefined)
			$("#servicoValor").val(s);
	}

	visualiza_endereco = function(e)
	{
		if(e.srcElement.checked == true)
			$("#localServico").css("display", "none");
		else
		{
			$("#localServico").css("display", "block");

			$("#localServico").focus();
		}

	}

	novo_recibo = function()
	{
		document.location = 'cadRecibo.php';
	}

	//Sets the click action on main button
	$("#btnInserir").bind("click", submit);

	$("#btnCliente").bind("click", novo_cliente);

	$("#servicoValor").bind("blur", formata_e_seta_valor_extenso);

	$("#servicoValor").bind("focus", seta_valor_original);

	$("#localServicoCliente").bind("change", visualiza_endereco);

	$("#btnNovoRecibo").bind("click", novo_recibo);

	if(document.location.href.indexOf('clienteId')>-1)
	{
		carrega_cliente(1);
	}
	else
	{
		$(".trInfo").css("display", "none");
		setaFocoPrimeroCampo();
	}

	capturaEnters('frmRecibo', submit);

	capturaEnters('frmCliente', function() { });

	$("#localServico").css("display", "none");

	arredondaCantos();

}

function setHiddenValue()
{

	document.getElementById('email').value = document.getElementById('clienteEmail').value;
	//alert(document.getElementById('email').value);

}
</script>


<title>Recibo eletrônico</title>
</head>

<body>
<form id="frmCliente"  method="post"  onsubmit="return false;">
<table class="innerTable">
	<tr>
		<td colspan="4" class="tdTitulo">
			Pesquisa de Clientes
		</td>
    </tr>
	<tr>
        <td colspan="4">
        	<input type="text"  id="txtCliente" name="txtCliente" />
			<input type='button' id="btnCliente" value='Novo' class="button" />
        </td>
    </tr>

    <tr class="trInfo">
		<td>
			Cliente:
		</td>
		<td id="tdClienteNome" class="tdInfo">Deise Fontoura</td>
		<td>
			Telefone:
		</td>
		<td id="tdClienteTelefone" class="tdInfo">81128934</td>
    </tr>
    <tr class="trInfo">
		<td>
			Endereço:
		</td>
		<td colspan="3" id="tdClienteEndereco" class="tdInfo">Av. Dorival de Oliveira, 1275, Pda. 77 Gravataí Ou um endereço ainda mais longo</td>
    </tr>
</table>
</form>
<br />
<form id='frmRecibo' onsubmit="return false;" method='post'>
<input type="hidden" id="hdnClienteId" name="hdnClienteId">
<table class="innerTable">
		<tr>
        	<td colspan="2" class="tdTitulo">Dados do Serviço</td>
         </tr>
        <tr>
            <td class="tdGuia">
            Recibo:
            </td>
            <td>
                <input id='numeroRecibo' name='numeroRecibo' type='text' disabled="true" value="00001" />
            </td>
        </tr>
        <tr>
            <td>
                Descrição:
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
            <td></td>
            <td>
                <input id='servicoValorExt' name='servicoValorExt' type='text' disabled="true" />
            </td>
        </tr>
        <tr>
            <td>
                Observações:
            </td>
            <td>
                <textarea id='obsInt' name='obsInt' type='text' /></textarea>
            </td>
        </tr>
        <tr>
			<td>
				Local:
			</td>
			<td>
				<input type="checkbox" id="localServicoCliente" checked="true">Usar endereço do cliente.
			</td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td>
                <textarea id='localServico' name='localServico' type='text' /></textarea>
            </td>
        </tr>
		<tr>
        	<td align='right' colspan="2">
        		<input type='button' id="btnInserir" value='Criar Recibo' class="button" />
	        	<input type='button' id="btnNovoRecibo" value='Novo Recibo' class="button" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>
