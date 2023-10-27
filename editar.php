<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciosesion.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['actualizar']))
{	
	$idusuario = $_SESSION['idusuario'];

	$idusuario = $_POST['idusuario'];
	$cantidad = $_POST['cantidad'];
	$tarjetapago = $_POST['tarjetapago'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$registrotemporada = $_POST['registrotemporada'];
	$numtelefono = $_POST['numtelefono'];
	$emailusuario = $_POST['emailusuario'];
	// checking empty fields
	if(empty($idusuario) || empty($cantidad) || empty($tarjetapago) ||empty($nombre)||empty($apellido1)||empty($registrotemporada)||empty($numtelefono)||empty($emailusuario)) {
				
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
	} else {	

		$resultado = mysqli_query($mysqli, "UPDATE ventas SET cantidad='$cantidad', tarjetapago='$tarjetapago', nombre='$nombre', apellido1='$apellido1', registrotemporada='$registrotemporada', numerotelefono='$numtelefono', emailusuario='$emailusuario' WHERE idusuario=$idusuario");
		
		header("Location: ver.php");
	}
}
?>
<?php

$idusuario = $_GET['idusuario'];

$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE idusuario=$idusuario");

while($res = mysqli_fetch_array($resultado))
{
	$idusuario = $res['idusuario'];
	$cantidad = $res['cantidad'];
	$tarjetapago = $res['tarjetapago'];
	$nombre = $res['nombre'];
	$apellido1 = $res['apellido1'];
	$registrotemporada = $res['registrotemporada'];
	$numtelefono = $res['numerotelefono'];
	$emailusuario = $res['emailusuario'];
}
?>
<html>
<head>	
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Ventas</a> | <a href="cerrarsesion.php">Cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Cantidad</td>
				<td><input type="text" name="cantidad" value="<?php echo $cantidad;?>"></td>
			</tr>
			<tr> 
				<td>Tarjeta de Pago</td>
				<td><input type="text" name="tarjetapago" value="<?php echo $tarjetapago;?>"></td>
			</tr>
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>Apellido</td>
				<td><input type="text" name="apellido1" value="<?php echo $apellido1;?>"></td>
			</tr>
			<tr> 
				<td>Registro en temporada</td>
				<td><input type="text" name="registrotemporada" value="<?php echo $registrotemporada;?>"></td>
			</tr>
			<tr> 
				<td>Numero Telefonico</td>
				<td><input type="text" name="numtelefono" value="<?php echo $numtelefono;?>"></td>
			</tr>
			<tr> 
				<td>Email Usuario</td>
				<td><input type="text" name="emailusuario" value="<?php echo $emailusuario;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idusuario" value=<?php echo $_GET['idusuario'];?>></td>
				<td><input type="submit" name="actualizar" value="actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
