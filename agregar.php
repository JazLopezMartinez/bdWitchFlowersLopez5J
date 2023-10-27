<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciosesion.php');
}
?>

<html>
<head>
	<title>Agregar Datos</title>
</head>

<body>
<?php

include_once("conexion.php");

if(isset($_POST['enviar'])) {	
	
	$cantidad = $_POST['cantidad'];
	$tarjetapago = $_POST['tarjetapago'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$registrotemporada = $_POST['registrotemporada'];
	$numtelefono = $_POST['numerotelefono'];
	$emailusuario = $_POST['emailusuario'];
	$iniciosesion = $_SESSION['idusuario'];
		
	if(empty($cantidad) || empty($tarjetapago) ||empty($nombre)||empty($apellido1)||empty($registrotemporada)||empty($numtelefono)||empty($emailusuario)) {
				
		if(empty($cantidad)) {
			echo "<font color='red'>Cantidad esta vacio.</font><br/>";
		}
		
		if(empty($tarjetapago)) {
			echo "<font color='red'>Tarjeta de pago esta vacio.</font><br/>";
		}
		
		if(empty($nombre)) {
			echo "<font color='red'>Nombre esta vacio.</font><br/>";
		}
		if(empty($apellido1)) {
			echo "<font color='red'>Apellido esta vacio.</font><br/>";
		}
		if(empty($registrotemporada)) {
			echo "<font color='red'>Registro en temporada esta vacio.</font><br/>";
		}
		if(empty($numtelefono)) {
			echo "<font color='red'>Numero Telefonico esta vacio.</font><br/>";
		}
		if(empty($emailusuario)) {
			echo "<font color='red'>Email esta vacio.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
			
		$resultado = mysqli_query($mysqli, "INSERT INTO `ventas`( `cantidad`, `tarjetapago`, `nombre`, `apellido1`, `registrotemporada`, `numerotelefono`, `emailusuario`, `iniciosesion_id`) VALUES('$cantidad','$tarjetapago','$nombre','$apellido1','$registrotemporada','$numtelefono','$emailusuario', '$iniciosesion')");
		
		echo "<font color='green'>Datos agregados con exito!.";
		echo "<br/><a href='ver.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>
