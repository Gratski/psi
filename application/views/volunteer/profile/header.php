<div class="container">
		<div class="row">
            <div id="picture" class="col-md-2 text-center" style="padding-top:20px; position:relative;">
              <?php echo getMediumPicture($user->id, $user->foto); ?>


            </div>
		  <div class="col-md-7">
			  <h1>
            <?php echo $user->nome; ?>, <?php echo getAge($user->data_nascimento); ?>
        </h1> 
              <!-- morada -->
              <i class="glyphicon glyphicon-home"></i>&nbsp;
              <?php echo $user->freguesia; ?>,
              <?php echo $user->concelho; ?>, 
              <?php echo $user->distrito; ?>, 
              <?php echo $user->pais; ?><br>

              <!-- contacto -->
              <i class="glyphicon glyphicon-phone"></i>&nbsp;
              <?php echo $user->telefone; ?>

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
  
$('#picture').hover(function(){
  $('#editPicture').show();
});



</script>