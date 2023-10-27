<?php session_start(); ?>
<html>
<head>
	<title>Inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
			Bienvenido a Witch Flowers!
	</div>
	<?php
	if(isset($_SESSION['valido'])) {			
		include("conexion.php");					
		$resultado = mysqli_query($mysqli, "SELECT * FROM iniciosesion");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='cerrarsesion.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver o Agregar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debes iniciar sesion para esto.<br/><br/>";
		echo "<a href='iniciosesion.php'>Iniciar Sesion</a> | <a href='registro.php'>Registrar</a>";
	}
	?>
	<div id="footer">
	Creado por<a href="https://jazlopezmartinez.github.io/WitchFlowers/" title="J. Lopez Martinez 5J"> J. Lopez Martinez 5J</a>
	</div>
</body>
</html>
