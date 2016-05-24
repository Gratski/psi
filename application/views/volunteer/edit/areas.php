
	<div class="container">
        
        <div class="row">
            <div class="col-sm-10">
                <?php if(hasFlash()){ ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo  printFlash(); ?>    
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10">
                <?php if(count($user_areas) != 0){ ?>

                <h3>Meus interesses</h3>
                <table class="table">
                    
                    <?php foreach ($user_areas as $user_area) { ?>
                        <tr>
                            <td><?php echo $user_area->area_nome; ?></td>
                            <td><?php echo $user_area->grupo_tipo; ?></td>
                            <td>
                                <form action="deleteArea" method="post">
                                    <input type="text" name="area_id" hidden="hidden" value="<?php echo $user_area->area_id; ?>">
                                    <input type="text" name="grupo_id" hidden="hidden" value="<?php echo $user_area->grupo_id; ?>">
                                    <input type="submit" class="btn btn-sm btn-danger" value="remover">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
                <?php } ?>
            </div>
        </div>
    

        <div class="row">
            <div class="col-sm-10">
                <?php if(count($user_areas_complement) != 0){ ?>

                <h3>Adicionar interesses</h3>
                <table class="table">
                    
                    <?php foreach ($user_areas_complement as $user_area) { ?>
                        <tr>
                            <td><?php echo $user_area->area_nome; ?></td>
                            <td><?php echo $user_area->grupo_tipo; ?></td>
                            <td>
                                <form action="addArea" method="post">
                                    <input type="text" name="area_id" hidden="hidden" value="<?php echo $user_area->area_id; ?>">
                                    <input type="text" name="grupo_id" hidden="hidden" value="<?php echo $user_area->grupo_id; ?>">
                                    <input type="submit" class="btn btn-sm btn-success" value="adicionar">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
                <?php } ?>
            </div>
        </div>
        
	</div>