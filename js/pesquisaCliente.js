if(typeof($.ready) == 'function')
	var main_ready = $.ready;

$.ready = function()
{
	if(typeof(main_ready ) == 'function')
		main_ready();
	
	$("#frmCliente input[type=text]").autocomplete({
			source: "bus/busPesquisaCliente.php",
			minLength: 1,
			select: function(event, ui) {
				if(ui.item)
					carrega_cliente(ui.item.id);
			}
	});
	
	sucess_callback_carrega_cliente = function(data)
	{
		$("#frmCliente #tdClienteNome").text(data[1].Nome);
		$("#frmCliente #tdClienteTelefone").text(data[1].Telefone);
		$("#frmCliente #tdClienteEndereco").text(data[1].Endereco);
		$("#frmCliente #tdClienteEmail").text(data[1].Email);		

		$("#frmCliente #contratoAtivoId").val(data[1].ContratoId);
		
		if(typeof(document.clieteComContratoAtivo) == 'function')
			document.clieteComContratoAtivo(data[1].ContratoId);

		if(document.location.href.toLowerCase().indexOf("cadcontrato.php") == -1 &&
			document.location.href.toLowerCase().indexOf("cadatendimento.php") == -1)
		{
			$("#frmCliente .trInfoPesquisar").css("display", "table-row");
					
			var button = "<input type='button' value='#value#' class='button' onclick='javascript:load_url(\"cad#pagina#.php?clienteId=#clienteId#";
			
			var href = "<a href='javascript:false' onclick='javascript:load_url(\"cad#pagina#.php?clienteId=#clienteId#\")' >#value#</a>";
			button = button.replace("#clienteId#", data[1].ClienteId);
			href = href.replace("#clienteId#", data[1].ClienteId);
			href = href.replace("#pagina#", "cliente");
			
			var buttonClosing = "\")' /><br />";
			
			href = href.replace("#value#", data[1].Nome);
			
			$("#frmCliente #tdClienteNome").text("");
			
			$(href).appendTo($("#frmCliente #tdClienteNome"));
			
			var buttonAte = button.replace("#pagina#", "atendimento");
			
			if(data[2])
			{
				for(var i=0;i<data[2].length;i++)
				{
					if(!data[2][i])
						continue;
					$(buttonAte.replace("#value#", formata_data(data[2][i].Data)) + "&atendimentoId=" + data[2][i].AtendimentoId + buttonClosing).appendTo($("#frmCliente #divButtonAtendimento"));		
				}
				
				$("#divButtonAtendimento input").corner("round 4px");
				
				$("#divButtonAtendimento input").css("cursor", "pointer");				
			}

			if(data[3])
			{			
				var buttonAte = button.replace("#pagina#", "contrato");
				
				for(var i=0;i<data[3].length;i++)
				{
					if(!data[3][i])
						continue;
					$(buttonAte.replace("#value#", formata_data(data[3][i].DataInicio)) + "&contratoId=" + data[3][i].ContratoId + buttonClosing).appendTo($("#frmCliente #divButtonContrato"));
					
				}
				
				$("#divButtonContrato input").corner("round 4px");
				
				$("#divButtonContrato input").css("cursor", "pointer");
			}
			
			

						
			setTimeout(function() {
				$("#frmCliente #txtCliente").focus();
			}, 1);
	
		}
		else
		{
			setTimeout(function() {
				$("#form1 .firstField").focus();
			}, 1);
		}
		
		var target = $("#form1 > input[name$=ClienteId]");
		
		target.val(data[1].ClienteId);
		
		if(typeof(document.validateClienteId) == 'function')
			document.validateClienteId();
		
		$("#frmCliente .trInfo").css("display", "table-row");

		
	}

	carrega_cliente = function(id)
	{
		$("#frmCliente > #clienteId").val(id);
		
		$("#frmCliente .trInfo").css("display", "none");
		$("#frmCliente .trInfoPesquisar").css("display", "none");

		internal_submit('bus/busCarregaCliente.php', $('#frmCliente'), sucess_callback_carrega_cliente);
		
		$("#frmCliente > #clienteId").val();
	}
	
	capturaEnters('frmCliente', function() { });
	
	var id = $.getUrlVar('clienteId');

	if(typeof(id) != 'undefined')
	{
		carrega_cliente(id);
	}
	else
	{
		$("#frmCliente .trInfo").css("display", "none");
		$("#frmCliente .trInfoPesquisar").css("display", "none");		
		$(".firstField").first().focus();
	}
	
	$("#frmCliente #btnCliente").bind("click", function()
	{	
		var returnPage = "?returnPage=";
		
		if(document.location.href.indexOf("ontrato") > -1)
			returnPage += "contrato"
		else if(document.location.href.indexOf("tendimento") > -1)
			returnPage += "atendimento"
		else 
			returnPage = ""
		
		load_url('cadCliente.php' + returnPage);
	});

	ajustes_ui();
}