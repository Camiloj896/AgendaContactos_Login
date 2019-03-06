<?php

class MvcController
{
	
	public function plantilla(){
		include "./Vista/Template.php";
	}


	public function EnlacesPagController(){

		
		if (isset($_GET['action'])) {
			$Enlaces = $_GET['action'];			
		}else{
			$Enlaces = "Index";
		}

		$Res = EncalesPaginas::EnlacesPagModelo($Enlaces);

		include $Res;
	}

	#------------------------ REGISTRO DE USUARIO ---------------------

	public function RegistroUsuController(){

		if (isset($_POST["usu"])) {

			#preg_match() -> realiza comparaciones

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usu"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["pass"]) &&
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){				

				#crypt() ->

				$encriptar = crypt($_POST["pass"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosControlador = array('Usuario' => $_POST["usu"], 'Correo' => $_POST["email"], 'Password' => $encriptar);

				$res = Datos::RegistroUsuModelo($datosControlador, "mvc_crud");
				
				if ($res == "Ok") {
					header("location:OK");
				}
			}
		}
	}

	#------------------------ INGRESO DE USUARIO ---------------------

	public function IngresoUsuController(){

		if (isset($_POST["usuI"])) {

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuI"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["passI"])){

				$encriptar = crypt($_POST["passI"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datosControlador = array('Usuario' => $_POST["usuI"],
					                      'Password' => $encriptar);

				$res = Datos::IngresoUsuModelo($datosControlador, "mvc_crud");

				$intentos = $res["intentos"];
				$Usuario = 	$_POST["usuI"];			
				$maxintentos = 2;

				if ($intentos < $maxintentos) {	
				
					if ($res["usuario"] == $_POST["usuI"] && $res["password"] == $encriptar) {

						session_start();

						$intentos = 0;
						$datosControlador = array('UsuActual' => $Usuario, 'ActuIntentos' => $intentos);
						$resIntentos = Datos::IntentosUsuModelo($datosControlador, "mvc_crud");

						$_SESSION["validar"] = true;				

						header("location:Valido");

					}else{
						++$intentos;

						$datosControlador = array('UsuActual' => $Usuario, 'ActuIntentos' => $intentos);

						$resIntentos = Datos::IntentosUsuModelo($datosControlador, "mvc_crud");

						header("location:Fallo");
					}	
				}else{

					$intentos = 0;

					$datosControlador = array('UsuActual' => $Usuario, 'ActuIntentos' => $intentos);

					$resIntentos = Datos::IntentosUsuModelo($datosControlador, "mvc_crud");

					header("location:FalloIntentos");
				}
			}

		}
		
	}

	#------------------------ VISTA DE USUARIO ---------------------

	public function VistaUsuController(){

		$res = Datos::VistaUsuModelo("mvc_crud");

		foreach ($res as $row => $item) {
			echo '<tr>
					<td>' . $item["usuario"] . '</td>
					<td>' . $item["password"] . '</td>
					<td>' . $item["correo"] . '</td>
					<td><a href="index.php?action=Editar&id='. $item["id"] .'" type="submit" class="btnUsu">editar</a></td>
					<td><a href="index.php?action=Usuarios&IdBorrar='. $item["id"] .'" type="submit" class="btnUsu">borrar</a></td>
				</tr>';			
		}

		
	}

	#------------------------ EDITAR DATOS ---------------------

	public function EditarUsuController(){

		$datosControlador = $_GET['id'];		
		$res = Datos::EditarUsuModelo($datosControlador, "mvc_crud");

		echo '<input type="hidden" name="idEdi" value="'. $res[0] .'">
		    <label for="UsuEditar">Usuario:</label><br/>
		    <input type="text" maxlength="10" id="UsuarioEditar" name="UsuEdi" value="'. $res[1] .'"><br/>
		    <label for="CorEditar">Correo:</label><br/>
			<input type="email" id="CorroEditar" name="EmailEdi" value="'. $res[2] .'"><br/>	
			<label for="PassEditar">Contraseña:</label><br/>
			<input type="text" id="PasswordEditar" name="passEdi" value="'. $res[3] .'"><br/>
			<input type="submit" class="RegisBTN" name="" value="Guardar">';
	}

	#------------------------ ACTUALIZAR DATOS ---------------------

	public function ActualizarUsuController(){

		if (isset($_POST['UsuEdi'])) {

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["UsuEdi"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["passEdi"]) &&
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EmailEdi"])){	

				$encriptar = crypt($_POST["passEdi"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			
				$datos = array('Usuario' => $_POST['UsuEdi'], 'Password' => $encriptar, 'Correo' => $_POST['EmailEdi'], 
					'id' => $_POST['idEdi']);

				$res = Datos::ActualizarUsuModelo($datos , "mvc_crud");

				if ($res == "Bien") {
					header("location:Cambio");
				}else{
					echo "mal" . $_POST['idEdi'] ;
				}

			}
		}

	}

	public function EliminarUsuController(){
		
		if (isset($_GET['IdBorrar'])) {
			$datosControlador = $_GET['IdBorrar'];

			$res = Datos::EliminarUsuModelo($datosControlador, "mvc_crud");	
			
			if ($res == "Bien"){
				header("location:Usuarios");
			}
		}

	}

	#------------------ VALIDAR USUARIO EXISTENTE---------------------

	public function ValidarUsuarioController($ValidarUsuario){

		$datos = $ValidarUsuario;

		#if (preg_match('/^[a-zA-Z0-9]+$/', $datos){

			$res = Datos::ValidarUsuModelo($datos, "mvc_crud");
			if ($res["usuario"] == $datos) {
				return "ya_existe";
			}else{
				return "Bien";
			}

		#}
	}

	#------------------ VALIDAR CORREO EXISTENTE---------------------

	public function ValidarCorreoController($ValidarCorreo){

		$datos = $ValidarCorreo;
		
		$res = Datos::ValidarCoModelo($datos, "mvc_crud");
		if ($res["correo"] == $datos) {
			return "ya_existe";
		}else{
			return "Bien";
		}

		
	}




}
