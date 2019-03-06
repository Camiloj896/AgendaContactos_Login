
function ValidarEditar() {
	
	var Usuario = document.querySelector("#UsuarioEditar").Value;
	var Password = document.querySelector("#CorroEditar").Value;
	var Correo = document.querySelector("#PasswordEditar").Value;

	var expresion = /^[a-zA-Z0-9]*$/;

	/* VALIDAR USUARIO*/

	if (Usuario != "") {
		var caracteres = Usuario.length;
		if (caracteres > 10) {
			document.querySelector("label[for='UsuEditar']").innerHTML += "<br/>Maximo 10 Carracteres";
			document.querySelector("label[for='UsuEditar']").style.color = 'red';
			return false;
		}

		if (!expresion.test(Usuario)) {
			document.querySelector("label[for='UsuEditar']").innerHTML += "<br/>*No escriba Carracteres especiales";
			document.querySelector("label[for='UsuEditar']").style.color = 'red';
			return false;
		}
	}

	/* VALIDAR CORREO*/

	if (Correo != "") {
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if (!expresion.test(Correo)) {
			document.querySelector("label[for='CorEditar']").innerHTML += "<br/>*Verifique su correo";
			document.querySelector("label[for='CorEditar']").style.color = "red";
			return false;
		}
	}

	/* VALIDAR CONTRASEÑA*/

	if (Password != "") {
		var caracteres = Password.length;
		
		if (caracteres < 6) {
			document.querySelector("label[for='PassEditar']").innerHTML += "<br/>*Minimo 6 Carracteres";
			document.querySelector("label[for='PassEditar']").style.color = 'red';
			return false;
		}

		if (!expresion.test(Password)) {
			document.querySelector("label[for='PassEditar']").innerHTML += "<br/>*No escriba Carracteres especiales";
			document.querySelector("label[for='PassEditar']").style.color = 'red';
			return false;
		}


	}

	return true;
}