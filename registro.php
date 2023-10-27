<html>
<head>
	<title>Registro</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['enviar'])) {
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$contra = $_POST['contra'];

	if($usuario == "" || $contra == "" || $nombre == "" || $email == "") {
		echo "Todos los campos deben estar llenos.";
		echo "<br/>";
		echo "<a href='registro.php'>Volver</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO iniciosesion(nombre, email, usuario, password) VALUES('$nombre', '$email', '$usuario', md5('$contra'))")
			or die("No se pudo insertar.");
			
		echo "Registro exitoso!";
		echo "<br/>";
		echo "<a href='iniciosesion.php'>Inicio Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contarseña</td>
				<td><input type="password" name="contra"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="enviar" value="enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
