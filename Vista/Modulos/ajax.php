<?php

	require_once "../../Controlador/Controller.php";
	require_once "../../Modelo/Crud.php";

	class Ajax{

		public $ValidarUsuario;
		public $ValidarCorreo;

		public function ValidarUsuarioAjax(){

			$datos = $this->ValidarUsuario;

			$res = MvcController::ValidarUsuarioController($datos);
			echo $res;

		}

		public function ValidarCorreoAjax(){

			$datos = $this->ValidarCorreo;

			$res = MvcController::ValidarCorreoController($datos);
			echo $res;

		}

	}

	if (isset($_POST["ValidarUsuario"])) {
		
		$a = new Ajax();
		$a -> ValidarUsuario = $_POST["ValidarUsuario"];
		$a -> ValidarUsuarioAjax();
	}

	if (isset($_POST["ValidarCorreo"])) {

		$a = new Ajax();
		$a -> ValidarCorreo = $_POST["ValidarCorreo"];
		$a -> ValidarCorreoAjax();
	}
