<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>

  <title>Editar Horario</title>
  
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
                <h2>Editar Disponibilidade</h2>
            </div>
        </div>
        <form action="">
            <div class='row'>
                <div class='col-sm-4' align='left'>
                    <input type="date" placeholder="<?php echo $data_inicio; ?>" />
                    <br>
                    <input type="date" placeholder="<?php echo $data_fim; ?>" />
                </div>
                <div class='col-sm-4' align='left'>
                    <input type="datetime" value="<?php echo $hora_inicio; ?>" />
                    <input type="datetime" value="<?php echo $hora_fim; ?>" />
                    <br><br><br><br><br>
                    <input type="submit" value="Guardar">
                    <input type="reset" value="Cancelar">
                </div>
            </div>
        </form>
	</div>