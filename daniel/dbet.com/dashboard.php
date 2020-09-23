<?php include('headerlogin.php')?>
<?php include("db.php"); 
	$usuario= $_SESSION['usuario'];
	$_SESSION['init'] = $usuario;
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
	 		echo '<div id="padre">';
 			for($i=0;$i<count($rows);$i++){
 				if($rows[$i]['visto'] == 0){
	 		echo '<input type="hidden" value="'.$rows[$i]['invitado'].'">';
 				}
 			}
 			echo '</div>';
 			echo '<input type="hidden" value="'.$usuario.'" id="invitacion">';

// CODIGO PHP Y HTML QUE SE DEBE AGREGAR PARA QUE FUNCIONE
	?>
	
	

	<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
	<div align="center"><h2  style="color:white"><strong>Dashboard </strong></h2> </div>  
	<br>

	<div class="container p-1">


		<div class="row">
			<div  class="col-md-4 mx-auto">
						

			

					<div class="card card-body">

						<label for="usuario">  Usuario: </label>
						<h5  name="usuario"   > <strong>  <?php echo $usuario;  ?> </strong></h5>

						<label for="balance">  Balance: </label>
						<h1  name="balance"   > <strong> $ <?php echo number_format($row['balance']);  ?> </strong></label>
							<br>
							
						<input type="hidden" name="usu">
						<a href="juegos.php" class="btn btn-danger">
						<i class="fas fa-play-circle"> </i> Ir a Juegos
						</a>
					</div>


					<div class="card card-body">
						<a href="index.php" class="btn btn-secondary">
						<i class="fas fa-sign-out-alt"> </i> Salir
						</a>

					</div>

					

					
			
			


		</div>

		<div  class="col-md-4 mx-auto">
				<div class="card card-body">

							

							<h3>  Depositos </h3> <br>
							<a href="depositar.php" class="btn btn-success">
							<i class="fas fa-donate"> </i> Depositar
							</a>
							<p> </p>
							<a href="depositos.php" class="btn btn-link">
							<i class="fas fa-tasks"> </i> Listado
							</a>

						</div>
						
		</div>

		<div  class="col-md-4 mx-auto">
				<div class="card card-body">

							

							<h3>  Retiros </h3> <br>
							<a href="retirar.php" class="btn btn-danger">
							<i class="fas fa-hand-holding-usd"> </i> Retirar
							</a>
							<p> </p>
							<a href="retiros.php" class="btn btn-link">
							<i class="fas fa-tasks"> </i> Listado
							</a>

						</div>
						
		</div>

		



	</div>

	
</div>



<?php include('footer.php')?>
<!-- ESTE CODIGO DE ACA SE ENCARGA DE HACER LAS LLAMADAS A LA BASE DE DATOS Y DECIRLE A USUARIO QUE ALGUIEN SE REGISTRO CON SU IDENTIFICACION -->
<script>
	function validarXMLHTTP(){
	if(window.XMLHttpRequest){
		direccionXMLHTTP = new XMLHttpRequest();
	}else{
		direccionXMLHTTP = new activeXObject('Microsoft.XMLHTTP');
	}
	url = document.querySelectorAll('#padre input');
	invitacion = document.getElementById('invitacion');
	console.log()
	if(url.length != 0){
	for(i=0;i<url.length;i++){
		cor = url[i].getAttribute('value')	
		direccionXMLHTTP.onreadystatechange = verificarDireccion;
		
		direccionXMLHTTP.open('POST','verificarInvitados.php?invitado='+cor+'&invitacion='+invitacion.value,true);
		direccionXMLHTTP.send();
		
	}	
		
	}else{
	}
}
function verificarDireccion(){
	if(direccionXMLHTTP.readyState == 4)
		if(direccionXMLHTTP.status==200)
		if(direccionXMLHTTP.responseText == '0'){
			console.log('no');
		}else{
		Push.create("HOLA!", {
		    body: "Alguien uso tu codigo",
		    // icon: '/icon.png',
		    timeout: 2000,
		    onClick: function () {
		        window.location='verificarInvitados.php?verdadero=1';
		        this.close();
		    }
		});
		}
}

setInterval("validarXMLHTTP()",4000);



</script>
<!-- ESTE CODIGO DE ACA SE ENCARGA DE HACER LAS LLAMADAS A LA BASE DE DATOS Y DECIRLE A USUARIO QUE ALGUIEN SE REGISTRO CON SU IDENTIFICACION -->
