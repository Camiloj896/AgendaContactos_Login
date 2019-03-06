<?php	
	if (!$_SESSION["validar"]) {
		header("location:Ingreso");

		exit();
	}
?>

<div>
	<form method="POST" onsubmit="return ValidarEditar()">
		<h1>EDITAR DE USUARIO</h1>
		<?php	
			$editar = new MvcController();
			$editar -> EditarUsuController();
			$editar -> ActualizarUsuController();
		?>	
	</form>
</div>


