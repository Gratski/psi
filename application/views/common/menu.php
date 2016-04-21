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
  </head>
  <body>
    <nav class="navbar navbar-default">
  	  <div class="container-fluid">
              <a class="navbar-brand page-scroll" href="home.php">Volunteer@FCUL</a>
    		<ul class="nav navbar-nav navbar-right">
    		  <li class="dropdown">
      			<a class="dropdown-toggle" data-toggle="dropdown" href="#" align="right">
                      <img src="imagens/profile.png" width="3%" height="3%">
                      <?php echo $username; ?>
      			<span class="caret"></span></a>
      			<ul class="dropdown-menu">
                    <li><a href="views/volunteer/edit/basic.php">Editar Perfil</a></li>
                    <li><a href="views/volunteer/edit/schedule.php">Editar Horário</a></li>
                    <li><a href="views/volunteer/edit/areas.php">Editar Preferências</a></li>
                    <li><a href="views/welcome/home.php">Logout (Sair)</a></li>
      			</ul>
    		  </li>
    		</ul>
  	  </div>
    </nav>