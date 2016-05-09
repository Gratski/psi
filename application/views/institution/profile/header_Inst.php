<?php>
<div class="container">
    <div class="row">
        <div id="picture" class="col-md-2 text-center" style="padding-top:20px; position:relative;">
            <?php echo getMediumPicture($id, $foto); ?>

            <span id="editPicture" data-toggle="modal" data-target="#editPictureModal" class="badge" 
                  style="position:absolute; margin-left:-34%; margin-top:20%;">
                editar
            </span>

        </div>
        <div class="col-md-7">
            <h1>
                <?php echo $nome; ?> 
            </h1> 
            <!-- morada -->
            <i class="glyphicon glyphicon-home"></i>&nbsp;
            <?php echo $freguesia; ?>,
            <?php echo $concelho; ?>, 
            <?php echo $distrito; ?>, 
            <?php echo $pais; ?><br>
            
            <!-- contacto -->
            <i class="glyphicon glyphicon-phone"></i>&nbsp;
            <?php echo $telefone; ?>
            
            <h6>Responsável</h6><p><?php echo $responsavel; ?><br></p>
            <i class="glyphicon glyphicon-envelope"></i>&nbsp;
            <?php echo $responsavel_email; ?>
            
        </div>
        <div class='col-sm-3'>

        </div>
    </div>
    <div>
        <h1>

        </h1>
    </div>


    <!-- Modal -->
    <div id="editPictureModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar fotografia de perfil</h4>
                </div>
                <div class="modal-body">
                    <form action="edit/updateFoto" method="post" enctype="multi-">
                        <div class="form-group">
                            <input type="file" name="photo" class="form-control"/>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-success" value="Alterar"></button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">

        $('#picture').hover(function () {
            $('#editPicture').show();
        });



    </script>