<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>

  <head>
  <title><?php
    echo $nome;
    $freguesia_nome = 'Lisboa';
    $nome_conselho = 'Lisboa';
    $nome_distrito = 'Lisboa';
    $pais_nome = 'Portugal';
    ?></title>
    </head>
	<div class="container">
		<div class="row">
            <div class="col-sm-2">
                <img src="imagens/profile.png" height="150" width="150" align="right">
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