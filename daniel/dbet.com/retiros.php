<?php include('headerlogin.php')?>

<?php include("db.php"); 


if ($_SESSION['metodo']=='') {
	# code...
	$_SESSION['metodo']='TODOS';
}

$_SESSION['pagina']='retiros';
?>

		

		<div align="center"><img class="img bdb" src="logodbetblanco.png" width="80" height="80"></div>
		<div align="center"><h2  style="color:white"> Listado de retiros</h2> 
			<a href="dashboard.php" class="btn btn-dark">
						<i class="fas fa-back"> </i> Dashboard
						</a>
		


<div class="container">


	<div class="row">

		<! REALIZAR RETIRO >
		   <div  class="col-lg-12 mx-auto">
						
		  


			
					

				

			</div>
			<br>

        
			

			

				

		</div>
		






	</div>
</div>

<div class="container">


	<div class="row">

		
		   <div  class="col-md-12">

				 	<?php include('alert.php')?>

		<div class="card card-body">
			<form action="analizar.php" method="POST">
				 <label for="metodo">  Filtrar:  </label>
						 


							<input type="submit" class="btn btn-success btn-success" name="btn_aprobado" value="Aprobados">
							<input type="submit" class="btn btn-success btn-danger" name="btn_pendiente" value="Pendientes">
							<input type="submit" class="btn btn-success btn-dark" name="btn_todos" value="Todos">


			</form>
			 <br>


				<div class="table-responsive">
		   			<table class="table table-bordered table-striped" style="background: #fff;">
				<thead class="text-center">
					<tr>
						<th>Id</th>
						<th>Fecha de creación</th>
						<th>Monto </th>
						<th>Wallet</th>
						<th>Metodo</th>
						<th>Estado</th>


					</tr>

				</thead>

				<tbody>
					
					<?php  
						$usuario=$_SESSION['usuario'];

						//$usuario=$_SESSION['usuario'];
						if($_SESSION['metodo']=='TODOS'){
							$query= "SELECT * FROM retiros WHERE usuario='$usuario'";
						}else{

								if($_SESSION['metodo']=='PENDIENTE'){
									$query= "SELECT * FROM retiros WHERE (usuario='$usuario') && (estado='PENDIENTE')";
							}else{
									$query= "SELECT * FROM retiros WHERE (usuario='$usuario') && (estado='APROBADO')";

						}
							

						}

						
						$lista_retiros=mysqli_query($conexion,$query);

						while($row= mysqli_fetch_array($lista_retiros)){


						 ?>
							<tr class="text-center">
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['fecha_creacion'] ?></td>
								<td><?php echo "$ ".$row['monto'] ?></td>
								<td><?php echo $row['wallet'] ?></td>
								<td><?php echo $row['metodo'] ?></td>
								<?php 

									if ($row['estado']=='APROBADO') {
										# code...
												echo "<td  style='color:green'> <strong>".$row['estado']."</strong> </td>";
									}else{

												echo "<td  style='color:red'> <strong>".$row['estado']."</strong> </td>" ;
									}
							?>
								

							</tr>

					<?php } ?>


					
				</tbody>

			</table>


		   	 </div>

		</div>				
		   
			
					

				

			</div>

        
			

			

				

		</div>
		






	</div>
</div>





<?php include('footer.php')?>
