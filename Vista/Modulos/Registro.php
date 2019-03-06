<form method="POST" onsubmit="return ValidarRegistro()">
	<h1>REGISTRO DE USUARIO</h1>
	<label for="UsuRegistro">Usuario</label><br/>
	<input type="text" name="usu" placeholder="Maximo 10" id="UsuRegistro" required><br/>
	<label for="EmailRegistro">Correo</label><br/>
	<input type="email" name="email" placeholder="verifique" id="EmailRegistro" required><br/>
	<label for="PassRegistro">Contraseña</label><br/>
	<input type="password" name="pass" placeholder="Minimo 6, Mayuscula(s), Numero(s)" id="PassRegistro" required><br/>
	
	
	<p style="text-align: center;"><input type="checkbox" id="terminos"><a href="">Acepta Terminos y Condiciones</a></p>

	<input type="submit" name="" value="Crear" >

</form>

<div>
	
<?php
	
	$registro = new MvcController();
	$registro -> RegistroUsuController();

	if (isset($_GET['action'])) {
		if ($_GET['action'] == "OK") {
			echo "Bien";
		}
	}
?>

</div>

