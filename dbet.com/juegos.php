<?php include('headerlogin.php');

	include("db.php"); 
	$_SESSION['pagina']="juegos";?>



		

	<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
	<div align="center"><h2  style="color:white"> Juegos </h2> 
			<a style="color:white" href="dashboard.php">Cancelar
			</a>
	</div>


	<div class="container p-1">
		 	<?php include('alert.php')?>
	</div>

	<div class="container p-1">


		<div class="row">

			<! JUEGO 1 >
			   <div  class="col-md-4 mx-auto">
							

				
			   	<form align="center" action="dicegame.php" method="POST">
			   			<div  class="card card-body">

							

							<div align="center"><img class="img" src="dicegame.png" width="200" height="200"></div>

							<div >
								<h1>
									 <label for="monto"> <strong> Dice </strong> </label>

								</h1>
								

							</div>

							
							

								<input type="submit" class="btn btn-success btn-success" name="btn_md" value="Jugar">

						
						</div>

			   	</form>
						

					

				</div>

	      
			






		</div>
	</div>




<?php include('footer.php')?>
