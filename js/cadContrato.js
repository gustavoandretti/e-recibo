$.ready = function()
{
	document.tableName = "contrato";
	
	submit = function()
	{
		internal_submit('bus/busContrato.php', $('#form1'), sucess_callback);
	};

	sucess_callback = function(data)
	{
		load_url('cadContrato.php?contratoId=' + data[1] + "&clienteId=" + data[2]);
	}

	novo_contrato = function()
	{
		load_url('cadContrato.php');
	}
	
	sucess_valida_cliente_callback = function(data)
	{
		//O cliente ja tem um contrato ativo
		if(data[1] != 0)
		{
			//carrega o contrato
			load_url('cadContrato.php?contratoId=' + data[1].contratoId + '&clienteId=' + data[1].clienteId);
		}
	}
	
	valida_cliente = function()
	{
		var clienteId = $("#form1 > #contratoClienteId").val();
		
		internal_submit("bus/busValidaClienteContrato.php", $("#form1"), sucess_valida_cliente_callback);
	}
	
	sucess_carrega_contrato_callback  = function(data)
	{
		if(data[1] == 1)
		{
			alert(data[2]);
			load_url('cadContrato.php');
		}
		else
		{
			form_bind("#form1", data[1]);
		}
	}

	//Sets the click action on main button
	$("#btnInserir").bind("click", submit);

	$("#btnNovoContrato").bind("click", novo_contrato);
	
	$("#contratoData").val(current_datetime());
	
	var id = $.getUrlVar('contratoId');
	
	var clienteId = $.getUrlVar('clienteId');
	
	if(typeof(id) != 'undefined')
	{
		$("#txtCliente").attr("disabled", true);
		
		$("#form1 > #contratoContratoId").val(id);
		
		$("#form1 > #contratoClienteId").val(clienteId);		
		
		internal_submit("bus/busCarregaContrato.php", $("#form1"), sucess_carrega_contrato_callback);
	}
	else
	{
		$("#txtClient").attr("disabled", false);
		
		$("#contratoDataInicio").val(current_datetime())
		
		document.validateClienteId = valida_cliente;
	}

	
		
	capturaEnters('form1', submit);
	
	ajustes_ui();
}
