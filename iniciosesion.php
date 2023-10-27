<?php session_start(); ?>
<html>
<head>
	<title>Inicio Sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['enviar'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$contra = mysqli_real_escape_string($mysqli, $_POST['contra']);

	if($usuario == "" || $contra == "") {
		echo "Usuario o Contraseña incorrectos.";
		echo "<br/>";
		echo "<a href='iniciosesion.php'>Volver</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM iniciosesion WHERE usuario='$usuario' AND password=md5('$contra')")
					or die("no se puede ejecutar el select query.");
		
		$row = mysqli_fetch_assoc($resultado);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['usuario'];
			$_SESSION['valido'] = $validuser;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['idusuario'] = $row['idusuario'];
		} else {
			echo "Usuario o contraseña invalidos.";
			echo "<br/>";
			echo "<a href='iniciosesion.php'>Go back</a>";
		}

		if(isset($_SESSION['valido'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Inicio Sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="text" name="contra"></td>
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
