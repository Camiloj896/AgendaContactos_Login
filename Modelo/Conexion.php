<?php

class Conexion
{
	
	public function Conectar(){

		$link = new PDO("mysql:host=localhost;dbname=cursomvc","root","");
		return $link;
	}
}

