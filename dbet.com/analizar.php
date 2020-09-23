<?php include('db.php');



/* FORMATO PARA VALIDACIONES


if ($_SESSION['pagina']=="pagina"){

}


if ($_SESSION['pagina']=="pagina"){

}else{
	header("location: pagina.php");
}

*/




// validacion para cuando una persona presiona un boton en la parte de depositar
if ($_SESSION['pagina']=="depositar") {
	# code...




		if (isset($_POST['btn_md'])) {
		 	# code...
		 

			$met='Mercado pago';
			$monto=$_POST['m_md'];
		}

		if (isset($_POST['btn_airtm'])){

			$met='Airtm';
			$monto=$_POST['m_airtm'];
		}


		if (isset($_POST['btn_paypal'])) {
			# code...
			$met='Paypal';
			$monto=$_POST['m_paypal'];
		}


		if (isset($_POST['btn_skrill'])){

			$met='Skrill';
			$monto=$_POST['m_skrill'];
		}


		if (isset($_POST['btn_neteller'])){
			# code...


			$met='Neteller';
			$monto=$_POST['m_neteller'];
		}


		if (isset($_POST['btn_stripe'])) {

			$met='Striper';
			$monto=$_POST['m_stripe'];
		}


		if (isset($_POST['btn_coinbase'])) {

			$met='Coinbase';
			$monto=$_POST['m_coinbase'];
		}

			if (!(empty($monto))) {
				# code...
				$usuario= $_SESSION['usuario'];

				$query= "INSERT INTO depositos(monto, metodo, estado, usuario) VALUES ('$monto','$met','PENDIENTE','$usuario')";

				$players=mysqli_query($conexion,$query);

				$row= mysqli_fetch_array($players);


				$_SESSION['message']="Deposito agregado exitosamente";
				$_SESSION['message_type']="success";

				header("location: depositos.php");

			}else{
				$_SESSION['message']="Debe ingresar un monto";
				$_SESSION['message_type']="warning";

				header("location: depositar.php");

			}
}


// validacion para cuando una persona quiere logearse en la pagina
if ($_SESSION['pagina']=="login"){

	if (($_POST['usuario']=="") or ($_POST['clave']=="")) {
		# code...
		$_SESSION['message']="Debe llenar todos los campos";
		$_SESSION['message_type']="warning";
		header("location: index.php");
			
	}else{

		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];

		$query="SELECT * FROM players WHERE usuario= '$usuario'";
		$r= mysqli_query($conexion,$query);


		if(mysqli_num_rows($r)==1){
			
			$row=mysqli_fetch_array($r);
			
				if ($clave==$row['clave']) {
					# code...
					$_SESSION['usuario']=$usuario;


				   

					header("location: dashboard.php");
				}
					else{
						$_SESSION['message']="Clave incorrecta";
						$_SESSION['message_type']="warning";
						//echo "clave error";
						header("location: index.php");

					}
			
		}else{
			
				$_SESSION['message']="Usuario no existe";

				$_SESSION['message_type']="warning";

				header("location: index.php");
		}
	}

}



// validacion cuando una persona presione los filtros en la parte de lista de depositos
if ($_SESSION['pagina']=="depositos"){

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

}

if ($_SESSION['pagina']=="depositos_all"){



	if (!(empty($_GET['id']))) {
		# CAMBIAR ESTADO DEL DEPOSITO
	
			$id=$_GET['id'];

			$query= "SELECT * FROM depositos WHERE (id= $id) ";

			$depositos=mysqli_query($conexion,$query);

			$deposito= mysqli_fetch_array($depositos);

			$usuario= $deposito['usuario'];


			$query= "SELECT * FROM players WHERE (usuario= '$usuario') ";

			$usuarios=mysqli_query($conexion,$query);

			$row= mysqli_fetch_array($usuarios);

			// cambiar estado del deposito
			$query="UPDATE depositos set estado='APROBADO' WHERE id=$id";
			mysqli_query($conexion,$query);

			// cambiar estado del balance del usuario que hizo el deposito
			$monto_add= $deposito['monto'];
			$balance= $row['balance'];

			$total=$balance+$monto_add;

			$query="UPDATE players set balance='$total' WHERE usuario='$usuario'";
			mysqli_query($conexion,$query);

			// actualizar balance de la caja
			$caja=$_SESSION['caja'];

			$query= "SELECT * FROM cajas WHERE (nombre= '$caja') ";
			$cajas=mysqli_query($conexion,$query);
			$rcaja= mysqli_fetch_array($cajas);

			$balance= $rcaja['balance'];

			$total= $balance - $monto_add;

			$query="UPDATE cajas set balance='$total' WHERE nombre='$caja'";
			mysqli_query($conexion,$query);

			$_SESSION['message']="Deposito aprobado exitosamente";
			$_SESSION['message_type']="success";
			header("location: depositos_all.php");









	}else{

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

		header("location: depositos_all.php");
	}

	

}



// validacion cuando una persona presione los filtros en la parte de lista de depositos
if ($_SESSION['pagina']=="retiros"){

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

	header("location: retiros.php");

}


if ($_SESSION['pagina']=="retiros_all"){

	if(!(empty($_GET['id']))) {
		# code...

			$id=$_GET['id'];

			$query= "SELECT * FROM retiros WHERE (id= $id) ";

			$retiros=mysqli_query($conexion,$query);

			$retiro= mysqli_fetch_array($retiros);

		

			// cambiar estado del retiro
			$query="UPDATE retiros set estado='APROBADO' WHERE id=$id";
			mysqli_query($conexion,$query);

			// cambiar estado del balance del usuario que hizo el deposito
			$monto_add= $retiro['monto'];
		
			// actualizar balance de la caja
			$caja=$_SESSION['caja'];

			$query= "SELECT * FROM cajas WHERE (nombre= '$caja') ";
			$cajas=mysqli_query($conexion,$query);
			$rcaja= mysqli_fetch_array($cajas);

			$balance= $rcaja['balance'];

			$total= $balance + $monto_add;

			$query="UPDATE cajas set balance='$total' WHERE nombre='$caja'";
			mysqli_query($conexion,$query);

			$_SESSION['message']="Retiro aprobado exitosamente";
			$_SESSION['message_type']="success";
			header("location: retiros_all.php");
	}else{

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

			header("location: retiros_all.php");
		}

}

// validacion para cuando una persona este registrando una cuenta nueva
if ($_SESSION['pagina']=="registro"){

	$rclave=$_POST['rclave'];
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	$rcupon = $_POST['rcupon'];



	if ($clave=="" or $rclave=="" or $usuario==""){
		$_SESSION['message']= "Por favor llene todos los campos";
		$_SESSION['message_type']= "warning";
		// header("location: registro.php");


	}else{
			if ($clave==$rclave){


						$query1="SELECT * FROM players WHERE usuario='$usuario'";
						echo $usuario;
						$r= mysqli_query($conexion,$query1);
						$row=mysqli_fetch_array($r);

						if (empty($row['usuario'])) {
							# code...
								

								$query="INSERT INTO players (usuario,clave) VALUES('$usuario','$clave')";
									$r=mysqli_query($conexion,$query);



						// FALTAN MUCHAS VERIFICACIONES EN ESTA ZONA PARA EVITAR QUE SE ENVIEN "RCUPON" CON UN USUARIO QUE NO EXISTA.

									if(isset($rcupon) != ''){
								$query=("INSERT INTO push (invitado,invitacion,estado,visto) VALUES ('$usuario','$rcupon','activo','0')");
								$r=mysqli_query($conexion,$query);
									}
									// ESTA LINEA SE CREO PARA PODERLE NOTIFICAR AL NAVEGADOR QUE EXISTE ALGUIEN QUE SE REGISTRO CON EL CODIGO DE INVITACION
























									if(!$r){
										die("ERROR FALTAL");


									}else{
									$_SESSION['message']= "Usuario creado exitosamente, ya puedes iniciar sesion";
									$_SESSION['message_type']= "success";

									header("location: index.php");

									}


						}else{

								$_SESSION['message']= "Lo siento, este nombre de usuario ya se encuentra registrado";
							$_SESSION['message_type']= "warning";
							header("location: registro.php");


						}






									






			}else{
				$_SESSION['message']= "Lo siento, las claves no coinciden";
				$_SESSION['message_type']= "warning";
				header("location: registro.php");



			}

    }

}

if ($_SESSION['pagina']=="retirar"){


	if (($_POST['metodo']=="") or ($_POST['wallet']=="") or ($_POST['monto']=="")) {
		# code...
		$_SESSION['message']="Debe llenar todos los campos";
		$_SESSION['message_type']="warning";
		header("location: retirar.php");
	}else{

			$monto=$_POST['monto'];
			$met=$_POST['metodo'];
			$wallet=$_POST['wallet'];
			$usuario=$_SESSION['usuario'];

			$query= "SELECT * FROM players WHERE (usuario='$usuario') ";

			$players=mysqli_query($conexion,$query);

			$row= mysqli_fetch_array($players);

		if($monto <= $row['balance']){

		
			
			$query= "INSERT INTO retiros(monto,metodo,estado,wallet,usuario) VALUES ('$monto','$met','PENDIENTE','$wallet','$usuario')";

	 		mysqli_query($conexion,$query);

			$balance=(($row['balance'])-($monto));

			$query="UPDATE players set balance='$balance' WHERE usuario='$usuario'";

			mysqli_query($conexion,$query);

			$_SESSION['message']="Retiro realizado exitosamente";
			$_SESSION['message_type']="success";
			header("location: retiros.php");

		}else{

			$_SESSION['message']="El monto ingresado supera al disponible";
			$_SESSION['message_type']="warning";
			header("location: retirar.php");
		}


	}
	
}



if ($_SESSION['pagina']=="login_admin"){
		if (($_POST['admin']=="") or ($_POST['codigo']=="")) {
		# code...
		$_SESSION['message']="Debe llenar todos los campos";
		$_SESSION['message_type']="danger";
		header("location: login_admin.php");
			
	}else{

		$usuario=$_POST['admin'];
		$clave=$_POST['codigo'];

		$query="SELECT * FROM administradores WHERE usuario= '$usuario'";
		$r= mysqli_query($conexion,$query);


		if(mysqli_num_rows($r)==1){
			
			$row=mysqli_fetch_array($r);
			
				if ($clave==$row['clave']) {
					# code...
					$_SESSION['usuario']=$usuario;


				   

					header("location: adminboard.php");
				}
					else{
						$_SESSION['message']="Código inválido";
						$_SESSION['message_type']="danger";
						//echo "clave error";
						header("location: login_admin.php");

					}
			
		}else{
			
				$_SESSION['message']="Administrador no existe";

				$_SESSION['message_type']="danger";

				header("location: login_admin.php");
		}
	}

}


if ($_SESSION['pagina']=="dicegame"){







    $usuario=$_SESSION['usuario'];

    $monto=$_POST['monto'];
    $numero=$_POST['numero'];

    $query= "SELECT * FROM players WHERE (usuario='$usuario') ";

	$players=mysqli_query($conexion,$query);

	$row= mysqli_fetch_array($players);

	$num=random_int (1, 100);


	if (($_POST['monto']=="") or ($_POST['numero']=="") or  ($_POST['monto']==0) ) {
		# code...
			$_SESSION['message']="Por favor llene todos los campos";

				$_SESSION['message_type']="warning";

				header("location: dicegame.php");
	}else{
				


				if (($_POST['numero']>100) or ($_POST['numero']<1)) {
					# code...
						$_SESSION['message']="El numero debe ser entre (1-100)";

						$_SESSION['message_type']="warning";

						header("location: dicegame.php");
				}else{

					if ($monto>$row['balance']) {
						# code...
						$_SESSION['message']="El monto de la apuesta supera al balance disponible";

						$_SESSION['message_type']="warning";

						header("location: dicegame.php");
					}else{

						if (isset($_POST['up'])) {
				# code...

		          
				if ($num>=$numero) {
					# WIN
					for ($i=0; $i <=$numero ; $i++) { 
		           	# code...
		           	$n=$i+1;

		           	$sum=$sum+$n;
		           }

					$rango=$sum / (4000);
					$rango=$rango;

					$ganancia= $monto* $rango;

					$total=$monto+$ganancia;

					$balance= $row['balance']+ $ganancia;

					$query="UPDATE players set balance='$balance' WHERE usuario='$usuario'";

					mysqli_query($conexion,$query);
				

					$_SESSION['message']="FELICIDADES!!!<br> Apuesta: $ ".$monto."<br> Ganancia +$ ".$ganancia."<br> Tu número: ".$numero." <br> Dice: ".$num."<br> ARRIBA";

						$_SESSION['message_type']="success";

						header("location: dicegame.php");


				}else{
					# LOSS
							$balance= $row['balance']- $monto;
							$query="UPDATE players set balance='$balance' WHERE usuario='$usuario'";
							mysqli_query($conexion,$query);

					$_SESSION['message']="HA PERDIDO!!! <br> Apuesta: $ ".$monto."<br> Tu número: ".$numero." <br> Dice: ".$num."<br> ARRIBA";

						$_SESSION['message_type']="danger";

						header("location: dicegame.php");
				}


			}else{

					

					if ($num<=$numero) {
						# WIN
							$x=100-$numero;
						for ($i=0; $i <=$x ; $i++) { 
			           	# code...
			           	$n=$i+1;

			           	$sum=$sum+$n;
			            }

						$rango=$sum / (4000);
						$rango=$rango;

						$ganancia= $monto* $rango;

						$total=$monto+$ganancia;
						
					
						$balance= $row['balance']+ $ganancia;

					$query="UPDATE players set balance='$balance' WHERE usuario='$usuario'";

					mysqli_query($conexion,$query);
						$_SESSION['message']="FELICIDADES!!!<br> Apuesta: $ ".$monto."<br> Ganancia +$ ".$ganancia."<br> Tu número: ".$numero." <br> Dice: ".$num." <br> ABAJO";

							$_SESSION['message_type']="success";

							header("location: dicegame.php");
					}else{
						# LOSS

							$balance= $row['balance']- $monto;
							$query="UPDATE players set balance='$balance' WHERE usuario='$usuario'";
							mysqli_query($conexion,$query);

							$_SESSION['message']="HA PERDIDO!!! <br> Apuesta: $ ".$monto."<br> Tu número: ".$numero." <br> Dice: ".$num."<br> ABAJO";

							$_SESSION['message_type']="danger";

							header("location: dicegame.php");
					}
				} //este es el fin


					}

				}


				

			}

	}
			



/* FORMATO PARA VALIDACIONES


if ($_SESSION['pagina']=="pagina"){

}


if ($_SESSION['pagina']=="pagina"){

}else{
	header("location: pagina.php");
}

*/
?>






