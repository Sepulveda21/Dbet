<?php
include("db.php");  
if(isset($_SESSION['init'])){
	$invitado= $_GET['invitado'];
	$invitacion = $_GET['invitacion'];
	$usuario= $_SESSION['init'];
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

		//ESTAS LINEAS VERIFICAN QUE DENTRO DE LA TABLA PUSH NO HAYAN USUARIOS CON UN VISTO EN CERO EN CASO DE SER CERO SALEN LAS NOTIFICACIONES

	$query= "SELECT * FROM players WHERE (usuario='$usuario') ";
					
    $players=mysqli_query($conexion,$query);
    $row= mysqli_fetch_array($players);
	
// ESTAS LINEAS DE CODIGO SE ENCARGAN DE DECIRLE A LA BASE DE DATOS QUE EXITE ALGUIEN QUE USO EL CODIGO DE VERIFICACION
	$qry ="SELECT * FROM push WHERE invitacion = '$usuario'";
	$push=mysqli_query($conexion,$qry);

	while($rowt = mysqli_fetch_assoc($push))
		{
    		$rows[] = $rowt;
		}
	 		// echo '<input type="text" value="'.$rows[$i]['invitado'].'">';
	 		// echo '<input type="text" value="'.$rows[$i]['invitacion'].'">';
 			for($i=0;$i<count($rows);$i++){
 				if($rows[$i]['visto'] == 0){
					if(isset($_GET['verdadero'])==1){
						$query= "UPDATE push SET visto = '1'  WHERE (invitacion='".$usuario."') ";				
    					$players=mysqli_query($conexion,$query);

					}
 				}
 			}
 
// CODIGO PHP Y HTML QUE SE DEBE AGREGAR PARA QUE FUNCIONE


	}
	header("location:dashboard.php");
?>