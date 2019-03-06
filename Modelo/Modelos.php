<?php

	class EncalesPaginas{

		public function EnlacesPagModelo($Enlaces){

			if ($Enlaces == "Registro" || $Enlaces == "Ingreso" || $Enlaces == "Usuarios" || $Enlaces == "salir" 
				|| $Enlaces == "Editar") 
			{				
				$Modulo = "./Vista/Modulos/" . $Enlaces . ".php";
			}elseif ($Enlaces == "Index") {
				$Modulo = "./Vista/Modulos/Inicio.php";
			}elseif ($Enlaces == "OK") {
				$Modulo = "./Vista/Modulos/Ingreso.php";
			}elseif ($Enlaces == "Valido") {
				$Modulo = "./Vista/Modulos/Ingreso.php";
			}elseif ($Enlaces == "Fallo") {
				$Modulo = "./Vista/Modulos/Ingreso.php";
			}elseif ($Enlaces == "FalloIntentos") {
				$Modulo = "./Vista/Modulos/Ingreso.php";
			}elseif ($Enlaces == "Cambio") {
				$Modulo = "./Vista/Modulos/Usuarios.php";
			}else{
				$Modulo = "./Vista/Modulos/Inicio.php";
			}

			return $Modulo;

		}

	} 
