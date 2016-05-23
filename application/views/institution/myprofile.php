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
			<h2>Lista de oportunidades</h2>

			
			<!-- Oportunidade  ciclo foreach aqui -->
			<?php $i = -1; ?>
			<?php foreach($oportunidades as $offer) { ?>
				<div class="panel panel-default">
					<div class="panel-heading">
                                            <h2><a href=" <?php echo base_url('index.php/opportunity/view/single/'); ?>/<?php echo $offer->id;?>"><?php echo $offer->titulo; ?></a></h2>
                                            <p style="font-size: 12px;"><?php echo $offer->descricao?></p>
					</div>
					<div class="panel-body">
						<table class="table" style="font-size:13px;">
							<?php $i += 1; ?>
							<?php for($k = 0; $k < count($matchesPorOportunidade[$i]); $k++) { ?>
							<tr>
								<td><i class="glyphicon glyphicon-user"></i></td>
								<td><a href="#"><?php echo $matchesPorOportunidade[$i][$k]['nome'] ?> </a></td>
								<td><a href="#">Antonio </a></td>
							<?php } ?>
                                                                <td><i class="glyphicon glyphicon-user"></i></td>
                                                                <td>Antonio</td>
                                                                <td><i class="glyphicon glyphicon-user"></i></td>
                                                                <td>Joao</td>
							</tr>
							
						</table>
					</div>
				</div>
				
			<?php }?>


		</div>

	</div>

</div>
	