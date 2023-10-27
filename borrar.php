<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciosesion.php');
}
?>

<?php
//including the database connection file
include("conexion.php");

//getting id of the data from url
$idusuario = $_GET['idusuario'];

//deleting the row from table
$resultado=mysqli_query($mysqli, "DELETE FROM ventas WHERE idusuario=$idusuario");

//redirecting to the display page (ver.php in our case)
header("Location:ver.php");
?>

