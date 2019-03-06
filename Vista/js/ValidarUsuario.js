
var UsuExistente = false;
var EmailExistente = false;

/* -------------------------------------
			VALIDAR USUARIO AJAX
---------------------------------------*/

$("#UsuRegistro").change(function(){

	 var usuario = $("#UsuRegistro").val();

	 var datos = new FormData();
	 datos.append("ValidarUsuario",usuario);

	 $.ajax({

	 	url:"Vista/Modulos/ajax.php",
	 	method: "POST",
	 	data: datos,
	 	cache: false,
	 	contentType: false,
	 	processData: false,
	 	success: function(respuesta){

	 		if (respuesta == "ya_existe") {

	 			$("label[for='UsuRegistro']").html("Usuario<br/><p style='Color:red;'>El usuario ya existe</p>");
	 			UsuExistente = true;
				
	 		}else{

	 			$("label[for='UsuRegistro']").html("Usuario");	 			
	 			UsuExistente = false;

	 		}
	 		
	 	}

	 });
});


/* -------------------------------------
			VALIDAR CORREO AJAX
---------------------------------------*/


$("#EmailRegistro").change(function(){

	 var Correo = $("#EmailRegistro").val();

	 var datos = new FormData();
	 datos.append("ValidarCorreo",Correo);

	 $.ajax({

	 	url:"Vista/Modulos/ajax.php",
	 	method: "POST",
	 	data: datos,
	 	cache: false,
	 	contentType: false,
	 	processData: false,
	 	success: function(respuesta){

	 		if (respuesta == "ya_existe") {

	 			$("label[for='EmailRegistro']").html("Correo<br/><p style='Color:red;'>El Correo ya existe</p>");
	 			EmailExistente = true;
				
	 		}else{

	 			$("label[for='EmailRegistro']").html("Correo");	
	 			EmailExistente = false; 			

	 		}
	 		
	 	}

	 });
});


/* -------------------------------------
			VALIDAR REGISTRO
---------------------------------------*/



function ValidarRegistro(){

	var usuario = document.querySelector("#UsuRegistro").value;	
	var Password = document.querySelector("#PassRegistro").value;	
	var Correo = document.querySelector("#EmailRegistro").value;
	var terminos = document.querySelector("#terminos").checked;
	
	/* VALIDAR USUARIO*/
	if (usuario != "") {

		var caracteres = usuario.length;
		var expresion = /^[a-zA-Z0-9]*$/;
		if (caracteres > 10){
			document.querySelector("label[for='UsuRegistro']").innerHTML += "<br/>*Maximo 10 Carracteres";
			document.querySelector("label[for='UsuRegistro']").style.color = 'red';
			return false;
		}

		if (!expresion.test(usuario)) {
			document.querySelector("label[for='UsuRegistro']").innerHTML += "<br/>*No escriba Carracteres especiales";
			document.querySelector("label[for='UsuRegistro']").style.color = 'red';
			return false;
		}

		if (UsuExistente) {
			return false;	
		}
	}
	/* VALIDAR PASSWORD*/
	if (Password != "") {

		var caracteres = Password.length;
		var expresion = /^[a-zA-Z0-9]*$/;
		if (caracteres < 6){
			document.querySelector("label[for='PassRegistro']").innerHTML += "<br/>*Minimo 6 Carracteres";
			document.querySelector("label[for='PassRegistro']").style.color = 'red';
			return false;
		}

		if (!expresion.test(Password)) {
			document.querySelector("label[for='PassRegistro']").innerHTML += "<br/>*No escriba Carracteres especiales";
			document.querySelector("label[for='PassRegistro']").style.color = 'red';
			return false;
		}
	}

	return true;

	/* VALIDAR CORREO*/

	if (Correo != "") {

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		
		if (!expresion.test(Correo)) {
			document.querySelector("label[for='EmailRegistro']").innerHTML += "<br/>*Escriba correctamente el correo";
			document.querySelector("label[for='EmailRegistro']").style.color = 'red';
			return false;
		}
	}

	if (EmailExistente) {
			return false;	
		}

	/* VALIDAR TERMINOS*/

	if (!terminos) {
		document.querySelector("form").innerHTML += "Acepte terminos y condiciones";
		document.querySelector("form").style.color = 'red';

		document.querySelector("#UsuRegistro") = usuario;	
		document.querySelector("#PassRegistro") = Password;
		document.querySelector("#EmailRegistro") = Correo;
		

		return false;
	}

	return true;


	
}
