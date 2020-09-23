<?php include('headerlogin.php');

	include("db.php"); 
	$_SESSION['pagina']="depositar";?>



		

	<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
	<div align="center"><h2  style="color:white"> Depositar</h2> 
			<a style="color:white" href="dashboard.php">Cancelar
			</a>
	</div>


	<div class="container p-1">
		 	<?php include('alert.php')?>
	</div>

	<div class="container p-1">


		<div class="row">

			<! MERCADO PAGO >
			   <div  class="col-md-4 mx-auto">
							

				
			   	<form align="center" action="analizar.php" method="POST">
			   			<div  class="card card-body">

							

							<div align="center"><img class="form" src="mercadopago.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_md"  placeholder="Ingrese un monto">

							</div>

							
								<br>

								<input type="submit" class="btn btn-success btn-success" name="btn_md" value="Aceptar">

						
						</div>

			   	</form>
						

					

				</div>

	         <! AIRTM >
			<div  class="col-md-4 mx-auto">
								<form align="center"  action="analizar.php" method="POST">
			   					<div class="card card-body">

							

							<div align="center"><img class="form" src="airtm.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_airtm"  placeholder="Ingrese un monto">

							</div>

							
								<br>
								<input type="submit" class="btn btn-success btn-success" name="btn_airtm" value="Aceptar">

						
				</div>
			   		
			   	</form>
				

				

					

			</div>

			 <! PAYPAL >
			<div  class="col-md-4 mx-auto">
				<form align="center"  action="analizar.php" method="POST">
			   		
			   					<div class="card card-body">

							

							<div align="center"><img class="form" src="paypal.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_paypal"  placeholder="Ingrese un monto">

							</div>

							
								<br>
								<input type="submit" class="btn btn-success btn-success" name="btn_paypal" value="Aceptar">

						
							</div>
			   	</form>
				

				

					

			</div>

			 <! SKRILL >
			<div  class="col-md-4 mx-auto">
				<form align="center"  action="analizar.php" method="POST">
			   			<div class="card card-body">

							

							<div align="center"><img class="form" src="skrill.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_skrill"  placeholder="Ingrese un monto">

							</div>

							
								<br>
								<input type="submit" class="btn btn-success btn-success" name="btn_skrill" value="Aceptar">

						
							</div>
			   		
			   	</form>
				

				

					

			</div>

			 <! NETELLER >
			<div  class="col-md-4 mx-auto">
					<form align="center"  action="analizar.php" method="POST">
			   				<div class="card card-body">

							

							<div align="center"><img class="form" src="neteller.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_neteller"  placeholder="Ingrese un monto">

							</div>

							
								<br>
								<input type="submit" class="btn btn-success btn-success" name="btn_neteller" value="Aceptar">

						
						</div>
			   		
			     	</form>
				

				

					

			</div>

			 <! STRIPE >
			<div  class="col-md-4 mx-auto">
								<form align="center"  action="analizar.php" method="POST">
			   				<div class="card card-body">

							

							<div align="center"><img class="form" src="stripe.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_stripe"  placeholder="Ingrese un monto">

							</div>

							
								<br>
								<input type="submit" class="btn btn-success btn-success" name="btn_stripe" value="Aceptar">

						
				</div>
			   		
			   	</form>
				

				

					

			</div>


			 <! COINBASE >
			<div  class="col-md-4 ">
					<form align="center"  action="analizar.php" method="POST">
			   		
			   			<div class="card card-body">

							

							<div align="center"><img class="form" src="coinbase.png" width="100" height="100"></div>

							<div >
								<label for="monto"> <strong> Monto </strong> </label>
								<input  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="m_coinbase"  placeholder="Ingrese un monto">

							</div>

							
								<br>
							<input type="submit" class="btn btn-success btn-success" name="btn_coinbase" value="Aceptar">

						
				</div>
			   	</form>
				

				

					

			</div>
			






		</div>
	</div>




<?php include('footer.php')?>
