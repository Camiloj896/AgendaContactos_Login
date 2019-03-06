<!--<div>-->
	<form method="POST" onsubmit="return ValidarIngreso()">
		<h1>Ingreso</h1>
		<label for="UsuIngreso">Usuario:</label><br/>
		<input type="text" name="usuI" placeholder="max 10" id="UsuarioIngreso" maxlength="10"><br/>		
		<label for="PassIngreso">Contraseña:</label><br/>
		<input type="password" name="passI" placeholder="Contraseña" id="PasswordIngreso"><br/>
		<input type="submit" class="RegisBTN" name="" value="Ingresar">		
	</form>
<!--</div>-->


<?php
	
	$ingreso = new MvcController();
	$ingreso -> IngresoUsuController();

	if (isset($_GET["action"])) {
		if ($_GET["action"] == "Valido") {
			header("location:Usuarios");
		}elseif ($_GET["action"] == "Fallo") {
			echo "usuario y contraseña incorrectos";
		}elseif ($_GET["action"] == "FalloIntentos") {
			echo "Error,Maximo de intentos";
		}
	}

?>


