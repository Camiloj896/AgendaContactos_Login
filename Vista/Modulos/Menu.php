<nav>
	<ul>
		<li><a href="Index.php">Inicio</a></li>
		<li><a href="Registro">Registro</a></li>
		<li><a href="Ingreso">Ingreso</a></li>
		<li><a href="Usuarios">Usuarios</a></li>
		<?php
			session_start();
			if (isset($_SESSION["validar"])) {
				if ($_SESSION["validar"]== true) {
					echo '<li><a href="salir">Salir</a></li>';
				}
			}			
		?>		
	</ul>
</nav>