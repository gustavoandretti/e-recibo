$.ready = function()
{
	document.tableName = "cliente";
	
	submit = function()
	{
		internal_submit('bus/busCliente.php', $('#form1'), sucess_callback);
	};

	sucess_callback = function(data)
	{
		var returnPage = $.getUrlVar('returnPage');
	
		if(typeof(returnPage) != 'undefined')
		{
			load_url('cad' + returnPage + '.php?clienteId=' + data[1]);	
		}
		else
		{
			load_url("cadCliente.php?clienteId=" + data[1]);
		}
	}

	cancel = function()
	{
		var returnPage = $.getUrlVar('returnPage');
	
		if(typeof(returnPage) != 'undefined')
		{
			load_url('cad' + returnPage + '.php');	
		}
		else
		{
			load_url("cadCliente.php");
		}
	}

	//Sets the click action on main button
	$("#btnInserir").bind("click", submit);

	$("#btnCancelar").bind("click", cancel);
	
	sucess_carrega_cliente_callback  = function(data)
	{
		if(data[1] == 1)
		{
			alert(data[2]);
			load_url('cadCliente.php');
		}
		else
		{
			form_bind("#form1", data[1]);
		}
	}
	
	var id = $.getUrlVar('clienteId');
		
	if(typeof(id) != 'undefined')
	{
		$("#txtCliente").attr("disabled", true);
		
		$("#form1 > #clienteClienteId").val(id);
		
		internal_submit("bus/busCarregaCliente.php", $("#form1"), sucess_carrega_cliente_callback);
	}
	
	$("#clienteData").val(current_datetime())
	
	ajustes_ui();

	capturaEnters('form1', submit);
}
