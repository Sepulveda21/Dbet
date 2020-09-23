<?php 

	include("db.php"); 



	if (isset($_POST['btn_pendiente'])) {
		# code...
		$_SESSION['metodo']='PENDIENTE';
	}

	if (isset($_POST['btn_aprobado'])) {
		# code...
		$_SESSION['metodo']='APROBADO';
	}

	if (isset($_POST['btn_todos'])) {
		# code...
		$_SESSION['metodo']='TODOS';
	}

	header("location: depositos.php");


?>