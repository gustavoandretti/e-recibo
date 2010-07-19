$.ready = function()
{
	
	document.tableName = "atendimento";
	
	submit = function()
	{
		internal_submit('bus/busAtendimento.php', $('#form1'), sucess_callback);
	};

	sucess_callback = function(data)
	{
		load_url('cadAtendimento.php?atendimentoId=' + data[1] + "&clienteId=" + data[2]);
	}

	visualiza_endereco = function(e)
	{
		if(e.srcElement.checked)
		{
			$("#trLocalServico").css("display", "none");
		}
		else
		{
			$("#trLocalServico").css("display", "table-row");
			
			$("#atendimentoEndereco").focus();
		}

	}

	novo_atendimento = function()
	{
		load_url('cadAtendimento.php');
	}

	exibir_obs = function(e)
	{
		if(!e.srcElement.checked)
			$("#trAtendimentoObservacao").css("display", "none");
		else
		{
			$("#trAtendimentoObservacao").css("display", "table-row");

			$("#atendimentoObservacao").focus();
		}
	}
	
	exibir_contrato = function(b)
	{
		$("#atendimentoContrato").val(b);
				
		if(b > 0)
		{
			//se nao for edicao traz sempre o checked marcado
			if( $("#atendimentoAtendimentoId").val().length == 0 )
				$("#atendimentoContrato").attr("checked", true);
			
			$("#trAtendimentoContrato").css("display", "table-row");
		}
		else
			$("#trAtendimentoContrato").css("display", "none");
			
		$("#atendimentoContrato").trigger("change");
	}
	
	bloquear_valor_atendimento = function()
	{
		$("#atendimentoValor").attr("disabled", $("#atendimentoContrato").attr("checked"));
	}
	
	sucess_carrega_atendimento_callback  = function(data)
	{
		if(data[1] == 1)
		{
			alert(data[2]);
			load_url('cadAtendimento.php');
		}
		else
		{
			form_bind("#form1", data[1]);
			
			setTimeout(function() {
				if($("#atendimentoEndereco").val() != $("#tdClienteEndereco").text())
				{
					$("#chkLocalServicoCliente").attr("checked", false);
					
					$("#trLocalServico").css("display", "table-row");
				}
				
				if($("#frmCliente #contratoAtivoId").val().length > 0)
					$("#trAtendimentoContrato").css("display", "table-row");

				
			}, 1);
		}
	}
	
	var id = $.getUrlVar('atendimentoId');
		
	if(typeof(id) != 'undefined')
	{
		$("#txtCliente").attr("disabled", true);
		
		$("#form1 > #atendimentoAtendimentoId").val(id);	
			
		var clienteId = $.getUrlVar('clienteId');
		
		$("#form1 > #atendimentoClienteId").val(clienteId);
		
		$("#form1 #btnEnviarRecibo").css("display", "inline-block");
		
		internal_submit("bus/busCarregaAtendimento.php", $("#form1"), sucess_carrega_atendimento_callback);
	}
	else
	{
		$("#form1 #btnEnviarRecibo").css("display", "none");		
	}
	//Sets the click action on main button
	$("#btnInserir").bind("click", submit);

	$("#chkLocalServicoCliente").bind("change", visualiza_endereco);

	$("#chkAtendimentoObservacaoExibir").bind("change", exibir_obs);
	
	document.clieteComContratoAtivo = exibir_contrato;
	
	$("#atendimentoContrato").bind("change", bloquear_valor_atendimento); 
		
	$("#btnNovoAtendimento").bind("click", novo_atendimento);

	capturaEnters('form1', submit);

	$("#trLocalServico").css("display", "none");
	
	$("#trAtendimentoContrato").css("display", "none");
	
	$("#trAtendimentoObservacao").css("display", "none");
	
	$("#atendimentoData").val(current_datetime());

	ajustes_ui();
}
