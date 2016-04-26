<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>

  <head>
  <title>Editar Àreas</title>
</head>
	<div class="container">
		<div class="row">
            <div class="col-sm-2">
                <img src="<?php echo getPictureURL($user->id); ?>" height="150" width="150" align="right">
            </div>
		  <div class="col-sm-3">
			<h1>
                <?php echo $user->nome; ?>
              </h1>  </div>
          <div class='col-sm-2'>
              <br><br><p>
              </p></div>
		</div>
        <div class="row">
            <div class="col-sm-10">
                <h2>Editar Áreas</h2>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-3' align='left'>
                Grupos de Interesse
            </div>
            <div class='col-sm-4' align='left'>
                Áreas de Intervenção
            </div>
        </div>
        <div class='row'>
            Actuais:
        </div>
        <form action="#">
            <div class='row'>
                <div class='col-sm-4' align='left'>
                    <?php foreach($user_areas as $post): ?>
                        <?php echo $post->grupo_tipo; ?>
                </div>
                <div class='col-sm-4' align='left'>
                        <?php echo $post->area_nome; ?><button class="btn btn-info" type="button">Remover</button>
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
        <div class='row'>
            Inserir nova(s) àrea(s):
        </div>
        <form action="#">
            <div class='row'>
                <div class='col-sm-4' align='left'>
                    <?php foreach($user_areas_complement as $post2): ?>
                        <?php echo $post2->area_nome; ?>
                </div>
                <div class='col-sm-4' align='left'>
                        <?php echo $post2->grupo_tipo; ?><button class="btn btn-info" type="button">Adicionar</button>
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
	</div>