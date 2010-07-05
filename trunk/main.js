function txtFocus(t) {

	setTimeout(function () {

		t.style.backgroundColor = "";

	}, 600);

}

function marcaCampoObrigatorio(campo)
{

	setTimeout(function(){
		
		campo.css("background-color", "#fDD");

		campo.focus();
		
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