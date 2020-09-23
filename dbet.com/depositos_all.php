<?php include('header.php')?>

<?php include("db.php"); 

//inicializar la variable metodo en TODOS si no hay un contenido en la variable ya predefinido por los botones de filtro en la lista de depositos
if ($_SESSION['metodo']=='') {
	# code...
	$_SESSION['metodo']='TODOS';
}
	//inicializar la variable pagina para que pueda llegar ala pagina de analisis
	$_SESSION['pagina']='depositos_all';
?>

		

		<div align="center"><img class="img bdb" src="logodbet.png" width="80" height="80"></div>
		<div align="center"><h2  style="color:white"> Todos los depositos</h2> 
			<a href="adminboard.php" class="btn btn-dark">
						<i class="fas fa-back"> </i> Adminboard
			</a>
		</div>



		<br>
		



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
						<th>Usuario</th>
						<th>Fecha de creación</th>
						<th>Monto </th>
						<th>Metodo</th>
						<th>Estado</th>
						<th>Aprobar</th>


							

					</tr>

				</thead>

				<tbody>
					
					<?php  
						$usuario=$_SESSION['usuario'];

						//$usuario=$_SESSION['usuario'];
						if($_SESSION['metodo']=='TODOS'){
							$query= "SELECT * FROM depositos";
						}else{

								if($_SESSION['metodo']=='PENDIENTE'){
									$query= "SELECT * FROM depositos WHERE (estado='PENDIENTE')";
							}else{
									$query= "SELECT * FROM depositos WHERE (estado='APROBADO')";

						}
							

						}

						
						$lista_depositos=mysqli_query($conexion,$query);
							
						while($row=mysqli_fetch_array($lista_depositos)){


						 ?>
							<tr class="text-center">
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['usuario'] ?></td>
								<td><?php echo $row['fecha_creacion'] ?></td>
								<td><?php echo "$ ".$row['monto'] ?></td>
								<td><?php echo $row['metodo'] ?></td>
								<?php 

									if ($row['estado']=='APROBADO') {
										# code...
												echo "<td  style='color:green'> <strong>".$row['estado']."</strong> </td>";
									}else{

												echo "<td  style='color:red'> <strong>".$row['estado']."</strong> </td>" ;


									}
							?>

							<td>
									<?php 
										if ($row['estado']=='PENDIENTE') {?>
										
										<a href="analizar.php?id=<?php echo $row['id']?>" class="btn btn-success">
										<i class="fas fa-check"></i>

									</a>
									<?php } ?>

									

									

							</td>
								

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


