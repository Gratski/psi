<div class="container">
	<div class="row">
		
		<div class="col-md-2">
		</div>
		<div class="col-md-7">

			
			<? if(hasFlash())
				printFlash(); ?>


			<!-- Oportunidades -->
			<h4>Lista de oportunidades</h4>

			
			<!-- Oportunidade  ciclo foreach aqui -->
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table" style="font-size:13px;">
						<?php foreach( $opportunities as $op){ ?>
						<tr>
							<td>
								<?php echo $op->instituicao; ?>
							</td>
							<td>
								<a href="opportunity/view/single/"<?php echo $op->opID;?>""><?php echo $op->titulo; ?></a>
							</td>
							<td><?php echo $op->funcao; ?></td>
							<td><?php echo $op->vagas; ?></td>
						</tr>
						<?php } ?>
					</table>
			  	</div>
			</div>


		</div>

	</div>

</div>