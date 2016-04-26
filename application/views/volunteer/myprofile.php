<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>

	<div class="container">
		<div class="row">
            <div class="col-sm-2">
                <img src="../img/profile.png" height="150" width="150" align="right">
            </div>
		  <div class="col-sm-3">
			<h1>
                <?php
                echo $nome;
                ?>
              </h1> 
              <?php echo $telefone; ?><br>
              <?php echo $freguesia; ?>,
              <?php echo $concelho; ?>, 
              <?php echo $distrito; ?>, 
              <?php echo $pais; ?>. </div>
          <div class='col-sm-2'>
              <br><br><p>
              Nascimento: <?php echo $data_nascimento; ?>
              </p></div>
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