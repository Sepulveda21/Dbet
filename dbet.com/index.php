<?php include('headerlogin.php')?>

<?php include("db.php"); 

$_SESSION['metodo']='TODOS';
$_SESSION['pagina']='login';

?>

		<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
		<div align="center"><h2  style="color:white"> Iniciar sesión</h2> </div>

<div class="container p-1">

	<div class="row">
		<div  class="col-md-4 mx-auto">

			<?php include('alert.php')?>
		
			<form  action="analizar.php" method="POST">

				<div class="card card-body">

						<! Caja para usuario >
						<div >
							<label for="usuario"> <strong> Usuario </strong> </label>
							<input  class="form-control" type="text" name="usuario"  placeholder="Ingrese su usuario">

						</div>
						<! Caja para Clave >
						<p> </p> 
						<div >
							<label for="clave"> <strong> Clave </strong></label>
							<input class="form-control" type="password" name="clave"  placeholder="Ingrese su clave">

						</div>
						<! Boton de entrar >
						<p> </p> 
							<input type="submit" class="btn btn-success btn-danger" name="entrar" value="Entrar">

								
							<! enlace para crear una cuenta nueva>
						<p> </p> 
						<a class="text-center" href="registro.php">Crear una cuenta</a>
				</div>
				
					

			</form>



			
			


		</div>
			
	</div>

	<div class="row">
		<div align="center" class="col-md-4 mx-auto">
				<a  href="login_admin.php" class="btn btn-dark">
						<i class="fas fa-back"> </i> Dbet Master
						</a>
		</div>
	</div>
</div>


<?php include('footer.php')?>




