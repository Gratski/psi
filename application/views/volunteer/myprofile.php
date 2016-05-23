<div class="container">
    <div class="row">

        <div class="col-md-2">
        </div>
        <div class="col-md-7">


            <? if(hasFlash())
            printFlash(); ?>


            <!-- Oportunidades -->
            <h2>Lista de oportunidades</h2>


            <!-- Oportunidade  ciclo foreach aqui -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table" style="font-size:13px;">
                        <?php foreach ($opportunities as $op) { ?>
                            <tr>
                                <td style="font-size: 28px;">
                                    <?php echo $op->instituicao; ?>
                                </td>
                                <td style="font-size: 20px;">
                                    <a href=" <?php echo base_url('index.php/opportunity/view/single/'); ?>/<?php echo $op->opID; ?>"><?php echo $op->titulo; ?></a>
                                </td >
                                <td style="font-size: 20px;"><?php echo $op->funcao; ?></td>
                                <td style="font-size: 20px;"><?php echo $op->vagas; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>


        </div>

    </div>

</div>