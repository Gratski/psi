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
                <img src="<?php echo $image; ?>" height="150" width="150" align="right">
            </div>
		  <div class="col-sm-3">
			<h1>
                <?php
                echo $nome;
                ?>
              </h1> 
              <?php echo $telefone; ?><br>
              <?php echo $freguesia_nome; ?>,
              <?php echo $nome_conselho; ?>, 
              <?php echo $nome_distrito; ?>, 
              <?php echo $pais_nome; ?>. </div>
          <div class='col-sm-2'>
              <br><br><p>
              <?php echo $data_nascimento; ?>
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
        <form action="">
            <div class='row'>
                <div class='col-sm-4' align='left'>
                    <?php foreach($query as $post): ?>
                        <?php echo $post->grupos_uti; ?><input type="submit" value="Remover">
                    <?php endforeach; ?>
                </div>
                <div class='col-sm-4' align='left'>
                    <?php foreach($query as $post): ?>
                        <?php echo $post->areas_uti; ?><input type="submit" value="Remover">
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
        <div class='row'>
            Inserir nova(s) àrea(s):
        </div>
        <form action="">
            <div class='row'>
                <div class='col-sm-4' align='left'>
                    <?php foreach($query as $post): ?>
                        <?php echo $post->grupos; ?><input type="submit" value="Adicionar">
                    <?php endforeach; ?>
                </div>
                <div class='col-sm-4' align='left'>
                    <?php foreach($query as $post): ?>
                        <?php echo $post->areas; ?><input type="submit" value="Adicionar">
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
	</div>