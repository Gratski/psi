<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>
	<div class="container">
		<div class="row">
            <div class="col-sm-2"></div>
		  <div class="col-sm-4">
			<h1>
                Editar Voluntário
			</h1>
			<form role="form" action="" method="get">
			  <div class="form-group">
                <input type="text" class="form-control" id="nomeV" placeholder="Nome do Voluntário">
            </form>
			<form role="form" action="" method="post">
				<label for="data">Data de Nascimento:</label><br>
				<input type="date" id="dataN" placeholder="<?php echo $data_nascimento; ?>" />
			  </div>
			  <div class="form-group">
				<div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Género:
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu-left" placeholder="<?php echo $genero.":" ?>">
                      <li><a href="#">Masculino</a></li>
                      <li><a href="#">Feminino</a></li>
                    </ul>
                  </div>
			  </div>
                <div class="form-group">
				<div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Distrito:
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-left">
                        <?php foreach($query as $post): ?>
                      <li>
                          <a href="#"><?php echo $post->distrito; ?></a>
                      </li>
                        <?php endforeach; ?>
                    </ul>
                  </div>
			  </div>
                <div class="form-group">
				<div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Freguesia:
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-left">
                      <?php foreach($query as $post): ?>
                      <li>
                          <a href="#"><?php echo $post->freguesia; ?></a>
                      </li>
                        <?php endforeach; ?>
                    </ul>
                  </div>
			  </div>
                <div class="form-group">
				<div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Conselho:
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-left">
                      <?php foreach($query as $post): ?>
                      <li>
                          <a href="#"><?php echo $post->conselho; ?></a>
                      </li>
                        <?php endforeach; ?>
                    </ul>
                  </div>
			  </div>
              <div class="form-group">
                  <input type="tel" name="telefone" placeholder="<?php echo $telefone; ?>">
                </div>
                <div class="form-group">
                  <input type="email" name="email" placeholder="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <input type="password" name="password" placeholder="<?php echo $password; ?>">
                </div>
			  <div class="checkbox">
				<label><input type="checkbox">Manter a minha informação privada</label>
			  </div>
		  </div>
		  <div class="col-sm-4" align="center">
			<br><br><br>
            <img src="imagens/profile.png" width="40%" height="30%"><br><br><br>
              <input type="image" placeholder="<?php echo $image; ?>">
			  <div class="form-group">
                <button type="button" class=" btn btn-primary">Cancelar</button>
			  </div>
			  <div class="form-group">
			  <button type="submit" class=" btn btn-primary">Submeter</button>
			  </div>
			</form>
            <form role="form">
              <div class="form-group">
                <button type="button" class=" btn btn-primary">Editar Disponibilidade</button>
			  </div>
            </form>
            <form role="form">
              <div class="form-group">
                <button type="button" class=" btn btn-primary">Editar Áreas de Interesse e Grupos</button>
			  </div>
            </form>
		  </div>
          <div class="col-sm-2"></div>
		</div>
	</div>