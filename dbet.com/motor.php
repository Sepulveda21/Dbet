<?php

	require_once('db.php');
	set_time_limit(0);
	$fecha_ac=  isset($_POST['timestamp']) ? $_POST['timestamp']:0;


	$fecha_db= $row['timestamp'];

	while ($fecha_bd <= $fecha_ac) {
		# code...
		$query3= "SELECT timestamp FROM players ORDER by timestamp DESC LIMIT 1"
		$con = mysql_query($query3);
		$ro = mysql_fetch_array($con);

		usleep(100000);
		clearstatcache();
		$fecha_bd= strtotime($ro['timestamp']);

	}

	$query = "SELECT * FROM players ORDER by timestamp DESC LIMIT 1";
	$datos_query= mysql_query($query);

	while ($row = mysql_fetch_array($datos_query)) {

		$ar["timestamp"] = strtotime($row['timestamp']);
		$ar["id"] = strtotime($row['id']);
		$ar["usuario"] = strtotime($row['usuario']);
		//columnas

	}

	$dato_json = json_encode($ar);
	echo $dato_json;

?>