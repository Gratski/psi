<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/bs/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="../css/bs/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
          <a class="navbar-brand page-scroll" href="home.php">Volunteer@FCUL</a>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" align="right">
                <img src="imagens/profile.png" width="3%" height="3%">
                <?php echo $nome; ?>
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