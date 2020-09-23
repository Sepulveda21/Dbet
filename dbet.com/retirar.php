<?php include('headerlogin.php')?>

<?php include("db.php");

$_SESSION['pagina']='retirar';


$usuario= $_SESSION['usuario'];
	
	$query= "SELECT * FROM players WHERE (usuario='$usuario') ";
					
    $players=mysqli_query($conexion,$query);

	$row= mysqli_fetch_array($players);?>


 ?>


		

		<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
		<div align="center"><h2  style="color:white"> Retirar</h2> 
		<a style="color:white" href="dashboard.php">Cancelar
				</a>
				 </div>


<div class="container p-1">


	<div class="row">

		<! REALIZAR RETIRO >
		   <div  class="col-md-4 mx-auto">
						
		   	<?php include('alert.php')?>
			
		   	<form action="analizar.php" method="POST">
		   			<div  class="card card-body">




						

						<label for="balance">  Balance disponible: </label>
						<h1  name="balance"   > <strong>  $ <?php echo $row['balance'];  ?> </strong></h1>
						  

						  <label for="metodo">  Forma de pago  </label>
						  <input onkeypress='return event.charCode >= 0 && event.charCode <= 0' placeholder="Selecciona metodo de pago" class="form-control" list="metodo" name="metodo">

							<datalist id="metodo">
							  <option value="Mercado pago">
							   <option value="Airtm">
							  <option value="Paypal">
							  <option value="Skrill">
							  <option value="Neteller">
							  <option value="Stripe">
							  <option value="Coinbase">
							</datalist>


							<div >
							<label for="wallet">  Billetera  </label>
							<input  class="form-control"  type="text" name="wallet"  placeholder="Ingresa tu billetera">

						</div>

						<div >
							<label for="monto">  Monto  </label>
							<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="monto"  placeholder="Ingrese un monto">

						</div>

						
							<br>

							<input type="submit" class="btn btn-success btn-success" name="retirar" value="Aceptar">

					
					</div>

		   	</form>
					

				

			</div>

        
			

			

				

		</div>
		






	</div>
</div>




<?php include('footer.php')?>
