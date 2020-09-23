<?php include('header.php')?>

<?php include("db.php"); 

$_SESSION['metodo']='TODOS';
$_SESSION['pagina']='login_admin';

?>

		<div align="center"><img class="img bdb" src="logodbet.png" width="80" height="80"></div>
		<div align="center"><h2  style="color:white"> Dbet Master </h2> </div>

<div class="container p-1">

	<div class="row">
		<div  class="col-md-4 mx-auto">

			<?php include('alert.php')?>
		
			<form  action="analizar.php" method="POST">

				<div class="card card-body">

						<! Caja para usuario >
						<div >
							<label for="usuario"> <strong> Administrador </strong> </label>
							<input  class="form-control" type="text" name="admin"  placeholder="Ingrese su usuario">

						</div>
						<! Caja para Clave >
						<p> </p> 
						<div >
							<label for="clave"> <strong> Código </strong></label>
							<input class="form-control" type="password" name="codigo"  placeholder="Ingrese su código">

						</div>
						<! Boton de entrar >
						<p> </p> 
							<input type="submit" class="btn btn-success btn-dark" name="entrar" value="Entrar">


							<! enlace para crear una cuenta nueva>
						<p> </p> 
						<a class="text-center" href="index.php">Iniciar como jugador </a>
				</div>
				
					

			</form>



			
			


		</div>
			
	</div>

	
</div>


<?php include('footer.php')?>




