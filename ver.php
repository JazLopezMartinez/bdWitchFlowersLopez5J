<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciosesion.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE iniciosesion_id=".$_SESSION['idusuario']." ORDER BY idusuario DESC");
?>

<html>
<head>
	<title>Inicio</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar Datos</a> | <a href="cerrarsesion.php">Cerrar Sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
		<td>idusuario</td>
			<td>Cantidad</td>
			<td>Tarjeta de Pago</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Registro en temporada</td>
			<td>Numero Telefonico</td>
			<td>Email</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['idusuario']."</td>";
			echo "<td>".$res['cantidad']."</td>";
			echo "<td>".$res['tarjetapago']."</td>";
			echo "<td>".$res['nombre']."</td>";	
			echo "<td>".$res['apellido1']."</td>";
			echo "<td>".$res['registrotemporada']."</td>";
			echo "<td>".$res['numerotelefono']."</td>";
			echo "<td>".$res['emailusuario']."</td>";

			echo "<td><a href=\"editar.php?idusuario=$res[idusuario]\">Editar</a> | <a href=\"borrar.php?idusuario=$res[idusuario]\" onClick=\"return confirm('Estas seguro de que quieres borrar?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
