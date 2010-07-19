function marcaCampoInvalido(campo)
{
	setTimeout(function(){

		campo.css("background-color", "#fDD");

		campo.focus();

		setTimeout(function () {

			campo.css("background-color", "");

		}, 600);

	}, 200);
}

function load_url(url)
{
	if(document.controlPresed)
	{
		document.controlPresed = false;
	
		window.open(url);
	}
	else
		document.location = url;
}

function ajustes_ui()
{
	$('input, textarea').corner("round 4px");
	
	$("input[type=button]").css("cursor", "pointer");
	
	$("body").bind("keydown", function(e)
	{
		document.controlPresed = (e.keyCode == 17);
	});
	
	$("body").bind("keyup", function(e)
	{
		document.controlPresed = false;
	});
	
	$("#img-logo").bind("click", function()
	{
		load_url("index.php");
	});
	
	$("#img-logo").css("cursor", "pointer");
}

function setaFocoPrimeroCampo()
{
	$('input[type=text], input[type=button], textarea').first().focus();
}

//Send assinc data and register callback
function internal_submit(postUrl, form, sucess_callback)
{
	if(typeof(document.loader)=='undefined')
	{
		document.loader = $("<div id='ajax_loader'></div>");
		document.loaderOk = $("<div id='ajax_loader_ok'></div>");		
	}
	
	document.loader.appendTo($("body"));

	//Include data from non checked checkboxes	
	var moreinfo = "";

	$('input[type=checkbox]').each(function(){
		if (!$(this).is(':checked'))
		{
			name = $(this).attr('name');
			moreinfo += '&'+name+'=0';
		}
	});

	$.ajax({
		  url: postUrl,
		  type: "POST",
		  data: form.serialize() + moreinfo,
		  dataType: "json",
		  success: function(data) {
			internal_callback(data, form, sucess_callback);
		  }
	   })
	   
};

function internal_callback(data, form, sucess_callback)
{	
	document.loader.detach();

	document.loaderOk.appendTo($("body"));
	
	setTimeout(function() {
		document.loaderOk.detach();
	}, 100);

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
			marcaCampoInvalido($('#' + data[1]));
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

function form_bind(form, data)
{
	$('*[Name^=' + document.tableName + ']').each(function(index) {
		
		id = $(this).attr("id");
		
		id = id.replace(document.tableName, "");
		
		val = data[id];
		
		if(typeof(val) != 'undefined')
		{
			if($(this).attr("type") == 'checkbox')
			{
				$(this).attr("checked", val > 0);
			}
			else if($(this).attr("class") == 'data')
			{
				$(this).val(formata_data(val));
			}
			else
				$(this).val(val);
		}
	});
}

function formata_data(val)
{
	var tmp = val.replace(" ", "-");
	tmp = tmp.split("-");
	tmp = 
		tmp[1] + "/" +
		tmp[2] + "/" +
		tmp[0];
		
	return tmp;
}

$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});


function current_datetime()
{
	var d = new Date();
	
	return d.getDate() + "/" + (d.getMonth() + 1)+ "/" + d.getFullYear();
}
