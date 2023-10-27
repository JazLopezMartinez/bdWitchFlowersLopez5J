<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$hostdebasededatos = 'localhost';
$nombredelabase = 'bdwitchflowerslopez';
$usuariodelabase = 'root';
$contradelabase = '';

$mysqli = mysqli_connect($hostdebasededatos, $usuariodelabase, $contradelabase, $nombredelabase); 
	
?>
