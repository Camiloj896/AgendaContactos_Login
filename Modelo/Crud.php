<?php 
	require_once "Conexion.php";

	class Datos extends Conexion
	{
		public function RegistroUsuModelo($datosModelo, $tabla){
			
			$stmt = Conexion::Conectar() -> prepare("INSERT INTO $tabla(usuario, correo, password) 
				VALUES (:usuario, :correo, :password)");

			$stmt -> bindParam(":usuario", $datosModelo["Usuario"], PDO::PARAM_STR);
			$stmt -> bindParam(":correo", $datosModelo["Correo"], PDO::PARAM_STR);
			$stmt -> bindParam(":password", $datosModelo["Password"], PDO::PARAM_STR);

			if ($stmt -> execute()){
				return "Ok";
			}else{
				return "error";
			}

			$stmt -> close();


		}
		
		public function IngresoUsuModelo($datosModelo, $tabla){
			
			$stmt = Conexion::Conectar() -> prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario");
			$stmt -> bindParam(":usuario", $datosModelo["Usuario"], PDO::PARAM_STR);						

			if ($stmt -> execute()){
				return $stmt -> fetch();
			}else{
				return "error";
			}

			$stmt -> close();

		}

		public function VistaUsuModelo($tabla){
			
			$stmt = Conexion::Conectar() -> prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();	

			$stmt -> close();

		}

		public function EditarUsuModelo($datosModelo, $tabla){

			$stmt = Conexion::Conectar() -> prepare("SELECT * FROM $tabla WHERE id = :id");
			$stmt -> bindParam(":id", $datosModelo, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

			$stmt -> close();
			
		}

		public function ActualizarUsuModelo($datosModelo, $tabla){
			
			$stmt = Conexion::Conectar() -> prepare("UPDATE $tabla SET usuario = :usuario, correo = :correo, password = :password WHERE id = :id");	
			$stmt -> bindParam(":usuario" , $datosModelo['Usuario'] , PDO::PARAM_STR);
			$stmt -> bindParam(":password" , $datosModelo['Password'] , PDO::PARAM_STR);
			$stmt -> bindParam(":correo" , $datosModelo['Correo'] , PDO::PARAM_STR);
			$stmt -> bindParam(":id" , $datosModelo['id'] , PDO::PARAM_STR);			

			if ($stmt -> execute()){
				return "Bien";
			}else{
				return "error";
			}

			$stmt -> close();
		}

		public function EliminarUsuModelo($datosModelo, $tabla){
			$stmt = Conexion::Conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
			$stmt -> bindParam(":id" , $datosModelo , PDO::PARAM_STR);

			if ($stmt -> execute()){
				return "Bien";
			}else{
				return "mal";
			}

			$stmt -> close();
		}

		public function IntentosUsuModelo($datosModelo ,$tabla){

			$stmt = Conexion::Conectar() -> prepare("UPDATE $tabla SET intentos = :intentos	WHERE usuario = :usuario");
			$stmt -> bindParam(":intentos", $datosModelo["ActuIntentos"] , PDO::PARAM_STR);
			$stmt -> bindParam(":usuario", $datosModelo["UsuActual"] , PDO::PARAM_STR);
			
			if ($stmt -> execute()){
				return "Bien";
			}else{
				return "mal";
			}
			
			$stmt -> close();			
			
			
		}

		public function ValidarUsuModelo($datosModelo, $tabla){
			
			$stmt = Conexion::Conectar() -> prepare("SELECT usuario FROM $tabla WHERE usuario = :usuario");
			$stmt -> bindParam(":usuario", $datosModelo, PDO::PARAM_STR);						

			if ($stmt -> execute()){
				return $stmt -> fetch();
			}else{
				return "error";
			}

			$stmt -> close();

		}

		public function ValidarCoModelo($datosModelo, $tabla){
			
			$stmt = Conexion::Conectar() -> prepare("SELECT correo FROM $tabla WHERE correo = :Email");
			$stmt -> bindParam(":Email", $datosModelo, PDO::PARAM_STR);						

			if ($stmt -> execute()){
				return $stmt -> fetch();
			}else{
				return "error";
			}

			$stmt -> close();

		}


	}
