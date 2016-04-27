
	<div class="container">
        
        <div class="row">
            <div class="col-sm-10">
                <? if(hasFlash()){ ?>
                    <div class="alert alert-success" role="alert">
                        <? echo  printFlash(); ?>    
                    </div>
                <? } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10">
                <? if(count($user_areas) == 0){ ?><h4>Ainda não tem áreas de interesse associadas</h4><? }else{ ?>

                <h3>Meus interesses</h3>
                <table class="table">
                    
                    <? foreach ($user_areas as $user_area) { ?>
                        <tr>
                            <td><? echo $user_area->area_nome; ?></td>
                            <td><? echo $user_area->grupo_tipo; ?></td>
                            <td>
                                <form action="deleteArea" method="post">
                                    <input type="text" name="area_id" hidden="hidden" value="<? echo $user_area->area_id; ?>">
                                    <input type="text" name="grupo_id" hidden="hidden" value="<? echo $user_area->grupo_id; ?>">
                                    <input type="submit" class="btn btn-sm btn-danger" value="remover">
                                </form>
                            </td>
                        </tr>
                    <? } ?>

                </table>
                <? } ?>
            </div>
        </div>
    

        <div class="row">
            <div class="col-sm-10">
                <? if(count($user_areas_complement) != 0){ ?>

                <h3>Adicionar interesses</h3>
                <table class="table">
                    
                    <? foreach ($user_areas_complement as $user_area) { ?>
                        <tr>
                            <td><? echo $user_area->area_nome; ?></td>
                            <td><? echo $user_area->grupo_tipo; ?></td>
                            <td>
                                <form action="addArea" method="post">
                                    <input type="text" name="area_id" hidden="hidden" value="<? echo $user_area->area_id; ?>">
                                    <input type="text" name="grupo_id" hidden="hidden" value="<? echo $user_area->grupo_id; ?>">
                                    <input type="submit" class="btn btn-sm btn-success" value="adicionar">
                                </form>
                            </td>
                        </tr>
                    <? } ?>

                </table>
                <? } ?>
            </div>
        </div>
        
	</div>