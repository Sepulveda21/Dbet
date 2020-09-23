<?php 
include('headerlogin.php');

include('db.php');


$_SESSION['pagina']='registro';

?>




		<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
		<div align="center"><h2  style="color:white">Crear una cuenta</h2> </div>

<div class="container p-1">

	<div class="row">
		<div  class="col-md-4 mx-auto">
		
				<?php include('alert.php')?>


			<form  action="analizar.php" method="POST">

				<div class="card card-body">

						<! Caja para usuario >
						<div >
							<label for="usuario"> <strong> Usuario </strong> </label>
							<input  class="form-control" type="text" name="usuario"  placeholder="Crea un usuario">

						</div>

						<! Caja para Clave >
						<p> </p> 
						<div >
							<label for="clave"> <strong> Clave </strong></label>
							<input class="form-control" type="password" name="clave"  placeholder="Crea una clave">

						</div>

						<! Caja para confirmar Clave >
						<p> </p> 
						<div >
							
							<input class="form-control" type="password" name="rclave"  placeholder="Confirma la clave">

						</div>
						<div >
							
							<input class="form-control" type="text" name="rcupon"  placeholder="validar cupon">

						</div>
						<! Boton de entrar >
						<p> </p> 
							<input type="submit" class="btn btn-success btn-danger" name="entrar" value="Registrarse">


							<! enlace para iniciar sesion>
						<p> </p> 
						<a class="text-center" href="index.php">Iniciar sesion</a>
				</div>

			</form>


			
			


		</div>
	</div>

	
</div>


<?php include('footer.php')?>
