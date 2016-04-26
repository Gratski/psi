<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>

	<div class="container">
		<div class="row">
            <div id="picture" class="col-md-2 text-center" style="padding-top:20px; position:relative;">
              <?php echo getMediumPicture($id, $foto); ?>

              <span id="editPicture" data-toggle="modal" data-target="#editPictureModal" class="badge" style="position:absolute; margin-left:-34%; margin-top:20%;">
                editar
              </span>

            </div>
		  <div class="col-md-7">
			  <h1>
            <?php echo $nome; ?>, <?php echo getAge($data_nascimento); ?>
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

      </div>
      <div class='col-sm-3'>
          
      </div>
		</div>
    <div>
      <h1>
        
      </h1>
    </div>
    <!--
        <div class="row">
            <div class="col-sm-10">
                <h2>Oportunidades</h2>
            </div>
        </div>
            <?php echo $funcao; ?></div> 
    <div class='col-sm-6' align='right'> <?php echo $nome_freguesia_o; ?>, <?php echo $nome_pais_o; ?>.  </div>
        </div>
        <div class='row'>
            <div class='col-sm-3' align='left'>
                <a href='<?php echo $website; ?>'><?php echo $nome_ins; ?> </a></div><div class='col-sm-4' align='right'>"
                            <?php echo $h; ?></div>
        </div>
        <div class='row'>
            <div class='col-sm-*' align='left'>
                <form role='form' action='#' method='post'>
                    <button  type='submit' class=' btn btn-primary'> 
                      <?php echo $nome_area; ?> </button>
                </form>
            </div>
            </div>
	</div>
  -->



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
  
$('#picture').hover(function(){
  $('#editPicture').show();
});



</script>
