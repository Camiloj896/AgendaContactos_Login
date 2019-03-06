	/* -------------------------------------
			VALIDAR INGRESO
---------------------------------------*/

function ValidarIngreso() {

	
	var Usuario = document.querySelector("#UsuarioIngreso").value;
	var Password = document.querySelector("#PasswordIngreso").value;

	/*VALIDAR USUARIO*/

	if (Usuario != "") {
		
		var carracteres  = Usuario.length
		var expresion = /^[a-zA-Z0-9]*$/;

		if (carracteres > 10) {
			document.querySelector("label[for='UsuIngreso']").innerHTML += "<br/>*Maximo 6 Carracteres";
			document.querySelector("label[for='UsuIngreso']").style.color = 'red';
			return false;
		}

		if (!expresion.test(Usuario)) {
			document.querySelector("label[for='UsuIngreso']").innerHTML += "<br/>*No escriba Carracteres especiales";
			document.querySelector("label[for='UsuIngreso']").style.color = 'red';
			return false;
		}

	}

	/*VALIDAR CONTRASEÑA*/

	if (Password != "") {

		var carracteres  = Password.length
		if (carracteres < 6) {
			document.querySelector("label[for='PassIngreso']").innerHTML += "<br/>*Minimo 6 Carracteres";
			document.querySelector("label[for='PassIngreso']").style.color = 'red';
			return false;
		}


		var expresion = /^[a-zA-Z0-9]*$/;
		if (!expresion.test(Password)) {
			document.querySelector("label[for='PassIngreso']").innerHTML += "<br/>*No escriba Carracteres especiales";
			document.querySelector("label[for='PassIngreso']").style.color = 'red';
			return false;
		}

	}

	return true;	
};