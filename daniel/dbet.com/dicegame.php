<?php include('headerlogin.php');

	include("db.php"); 






	$_SESSION['pagina']="dicegame";

	$usuario= $_SESSION['usuario'];
	
	$query= "SELECT * FROM players WHERE (usuario='$usuario') ";
					
    $players=mysqli_query($conexion,$query);

	$row= mysqli_fetch_array($players);


	?>







		

	<div align="center"><img class="img bdb" src="dicegame.png" width="120" height="120"></div>
	<div align="center"><h2  style="color:white"> Dice </h2> 
			<a style="color:white" href="juegos.php">Volver a juegos
			</a>
	</div>


	<div class="container p-1">
		 <div  class="col-md-4 mx-auto">
		 	<?php include('alert.php')?>
		 </div>
	</div>

	<div class="container p-1">


		<div class="row">

			<! JUEGO 1 >
			   <div  class="col-md-4 mx-auto">
							

				
			   	<form align="center" action="analizar.php" method="POST">
			   			<div  class="card card-body">

							
						<label for="balance">  Balance: </label>
						<h1  name="balance"   > <strong> $ <?php echo number_format($row['balance']);  ?> </strong></h1>
						
							
							 <div >
								<label for="monto" >  Monto  </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="monto"  placeholder="Ingresa tu apuesta">

							</div>

								<br>

									 <div >
								<label for="monto" >  Elige un número </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="numero"  placeholder="Dentro del rango (1 - 100)">

							</div>
								<br>

									<label for="monto" >  Elige un margen </label>
									<row>
								
									
											<input href="analizar.php?apuesta=1" class="btn btn-danger  btn-danger" type="submit" name="up" value="Arriba"> 
										
										 

										
									
											<input  href="analizar.php?apuesta=2" class="btn btn-dark btn-dark" type="submit" name="down" value="Abajo"> 
										

								
									</row>

									
						
						</div>

			   	</form>
							
								

					

				</div>

	      
			






		</div>
	</div>




<?php include('footer.php')?>
