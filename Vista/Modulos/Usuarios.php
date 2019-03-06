<?php	
	if (!$_SESSION["validar"]) {
		header("location:Ingreso");

		exit();
	}
?>

<section class="Container_Usuario">	
	<h1>Usuarios</h1>
	<table>
		<thead>
			<tr>
				<td>Usuario</td>
				<td>Contraseña</td>
				<td>correo</td>
				<td colspan="2">Opciones</td>
			</tr>
		</thead>		
		<tbody>
			<?php	
				$Usuarios = new MvcController();
				$Usuarios -> VistaUsuController();
				$Usuarios -> EliminarUsuController();
			?>					
		</tbody>
	</table>
</section>
