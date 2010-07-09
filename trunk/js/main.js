function marcaCampoObrigatorio(campo)
{

	setTimeout(function(){

		campo.css("background-color", "#fDD");

		campo.focus();

		setTimeout(function () {

			campo.css("background-color", "");

		}, 600);

	}, 200);
}

function arredondaCantos()
{
	$('input, textarea').corner("round 4px");
}

function setaFocoPrimeroCampo()
{
	$('input, textarea').first().focus();
}

//Send assinc data and register callback
function internal_submit(postUrl, form, sucess_callback)
{
	if(typeof(document.loader)=='undefined')
		document.loader = $("<div id='ajax_loader'></div>");
	else
		document.loader.appendTo($("body"));

	$.ajax({
		  url: postUrl,
		  type: "POST",
		  data: form.serialize(),
		  dataType: "json",
		  success: function(data) {
			internal_callback(data, form, sucess_callback);
		  }
	   })
	   
};

function internal_callback(data, form, sucess_callback)
{	
	document.loader.detach();

	if(data != null && data.length > 0)
	{
		if(data[0] == 0)
		{
			sucess_callback(data);
		}
		else if(data[0] == 100)
		{
			alert(data[1]);
		}
		else
		{
			marcaCampoObrigatorio($('#' + data[1]));
		}
	}
}

function capturaEnters(formName, submitFunction)
{
	//Captures enters on form, avoid form.submit and make the asinc call
	$('#' + formName + ' input').bind("keypress", function(e)
	{
		if (e.keyCode == 13)
		{
			submitFunction();
			return false;
		}
	});	
}