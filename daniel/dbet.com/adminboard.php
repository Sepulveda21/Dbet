<?php include('header.php')?>
<?php include("db.php"); 

	$usuario= $_SESSION['usuario'];
	
	$query= "SELECT * FROM cajas WHERE (administrador='$usuario') ";
					
    $cajas=mysqli_query($conexion,$query);

	$row= mysqli_fetch_array($cajas);
	
	?>
	
	

	<div align="center"><img class="img bdb" src="logodbet.png" width="80" height="80"></div>
	<div align="center"><h2  style="color:white"><strong>Adminboard </strong></h2> </div>  
	<br>

	<div class="container p-1">


		<div class="row">
			<div  class="col-md-4 mx-auto">
						

			

					<div class="card card-body">

						<label for="usuario">  Dbet Master: </label>
						<h5  name="usuario"   > <strong>  <?php echo $usuario;  ?> </strong></h5>

						<label for="balance">  Balance de <?php echo $row['nombre']; $_SESSION['caja']=$row['nombre'];  ?>: </label>
						<h1  name="balance"   > <strong> $ <?php echo number_format($row['balance']);  ?> </strong></label>
							<br>
							
						<input type="hidden" name="usu">
					
					</div>


					<div class="card card-body">
						<a href="login_admin.php" class="btn btn-secondary">
						<i class="fas fa-sign-out-alt"> </i> Salir
						</a>

					</div>

					

					
			
			


		</div>

		<div  class="col-md-4 mx-auto">
				<div class="card card-body">

							

							<h3>  Depositos </h3> 
							<p> </p>
							<a href="depositos_all.php" class="btn btn-dark">
							<i class="fas fa-tasks"> </i> Listado
							</a>

						</div>
						
		</div>

		<div  class="col-md-4 mx-auto">
				<div class="card card-body">

							

							<h3>  Retiros </h3>
							<p> </p>
							<a href="retiros_all.php" class="btn btn-dark">
							<i class="fas fa-tasks"> </i> Listado
							</a>

						</div>
						
		</div>

		



	</div>

	
</div>



<?php include('footer.php')?>