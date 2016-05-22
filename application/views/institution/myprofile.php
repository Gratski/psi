<div class="container">
	<div class="row">
		
		<div class="col-md-2">
		</div>
		<div class="col-md-7">

			
			<? if(hasFlash())
				printFlash(); ?>

			<!-- descricao -->
			<h4>Sobre nós</h4>
			<span><?php echo $descricao; ?></span>


			<!-- Oportunidades -->
			<h4>Lista de oportunidades</h4>

			
			<!-- Oportunidade  ciclo foreach aqui -->
			<?php $i = -1; ?>
			<?php foreach($oportunidades as $offer) { ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#"><b><?php echo $offer->funcao ?> </b></a>
					</div>
					<div class="panel-body">
						<table class="table" style="font-size:13px;">
							<?php $i += 1; ?>
							<?php for($k = 0; $k < count($matchesPorOportunidade[$i]); $k++) { ?>
							<tr>
								<td><i class="glyphicon glyphicon-user"></i></td>
								<td><a href="#"><?php echo $matchesPorOportunidade[$i][$k]['nome'] ?> </a></td>
							<?php } ?>
							</tr>
							
						</table>
					</div>
				</div>
				
			<?php }?>


		</div>

	</div>

</div>
	