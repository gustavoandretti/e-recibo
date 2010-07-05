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