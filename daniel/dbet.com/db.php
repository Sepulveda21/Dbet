
<?php

	session_start();
	
	$conexion= mysqli_connect(
	'localhost','root','','dbet_db');

if (isset($conexion)) {
	# code...
	#echo "DB Conectada";
}

?>

