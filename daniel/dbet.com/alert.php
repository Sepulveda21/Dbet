	<?php if (isset($_SESSION['message'])) {


					$tipo=$_SESSION['message_type'];
					$mensaje=$_SESSION['message']; ?>

					<script >	Push.create("Dbet - Gana sin limites",{
						body: "<?=$mensaje?>",
						icon: "logodbet.png",
						timeout: 0


					});</script>
					<script type="text/javascript">


					
						<?php
						if ($tipo=="success") { ?>
						
								document.getElementById('a1').play();
						
						<?php } else{ ?> 
								
									document.getElementById('a2').play();
								
					<?php } ?> 
					

					
						</script>


					


						

						<div class="alert alert-<?=$tipo?> alert-dismissible fade show" role="alert" id="msj">
							
							<?=$mensaje?>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close" >
								<span aria-hidden="true">&times;</span>
							</button>

							

						
										
						</div>

				
			

			<?php 	

			unset($_SESSION['message']);

			 } ?>