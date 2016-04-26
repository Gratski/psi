<html>
  <head>
      <title>
        <?php
          if(isset($titulo))
            echo $titulo;
          else
            echo 'Volunteer@FCUL';
        ?>
      </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/bs/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/style.css');?>">
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="<?php echo base_url('/css/bs/js/bootstrap.min.js'); ?>"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
  	  <div class="container-fluid">
        <a class="navbar-brand page-scroll" href="">Volunteer@FCUL</a>
    		<ul class="nav navbar-nav navbar-right">
    		  <li class="dropdown pull-right">
      			<a class="dropdown-toggle" data-toggle="dropdown" href="#" align="right">
                      <img src="<?php echo base_url('/img/profile.png'); ?>" width="3%" height="3%">
                      <?php echo $username; ?>
      			<span class="caret"></span></a>
      			<ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('views/volunteer/edit/basic.php'); ?>">Editar Perfil</a></li>
                    <li><a href="<?php echo base_url('views/volunteer/edit/schedule.php'); ?>">Editar Horário</a></li>
                    <li><a href="<?php echo base_url('views/volunteer/edit/areas.php'); ?>">Editar Preferências</a></li>
                    <li><a href="<?php echo base_url('views/welcome/home.php'); ?>">Logout (Sair)</a></li>
      			</ul>
    		  </li>
    		</ul>
  	  </div>
    </nav>
