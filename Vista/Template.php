<!DOCTYPE html>
<html>
<head>
	<title>Template</title>
	<link rel="stylesheet" type="text/css" href="./Vista/css/stylos.css">
	<script type="text/javascript" src="Vista/js/jquery-3.0.0.min.js"></script>
</head>
<body>
	<header>
		<h1>LOGOTIPO</h1>	
	</header>

	<?php  include "./Vista/Modulos/Menu.php" ?>
	
	<section class="Container">		
	<?php  
		$mvc = new MvcController();
		$mvc -> EnlacesPagController();
	?>
	</section>
	<script type="text/javascript" src="Vista/js/ValidarUsuario.js"></script>
	<script type="text/javascript" src="Vista/js/ValidarIngreso.js"></script>
	<script type="text/javascript" src="Vista/js/ValidarEditar.js"></script>
</body>
</html>