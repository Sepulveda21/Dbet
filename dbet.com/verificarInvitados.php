<?php
include("db.php");  
	
	$invitado= $_GET['invitado'];
	$invitacion = $_GET['invitacion'];

	$query= "SELECT * FROM push WHERE invitado='$invitado' AND invitacion = '$invitacion'";
					
    $players=mysqli_query($conexion,$query);
    ;
   	while($rowt = mysqli_fetch_assoc($players))
		{
    		$rows[] = $rowt;
		}
		for($i=0;$i<count($rows);$i++){

			if($rows[$i]['visto'] == '0'){
				return 1;
			}else{
				return 0;
			}
		}

		// ESTAS LINEAS VERIFICAN QUE DENTRO DE LA TABLA PUSH NO HAYAN USUARIOS CON UN VISTO EN CERO EN CASO DE SER CERO SALEN LAS NOTIFICACIONES
?>