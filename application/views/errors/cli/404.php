<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>

<!DOCTYPE html>
<html>
  <head>
  <title>Ups! Página não encontrada!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="bs/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default">
	  <div class="container-fluid">
		<ul class="nav navbar-nav navbar-right">
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" align="right"><img src="imagens/profile.png" width="3%" height="3%">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "psi_db";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT utilizador, foto, nome, id FROM Voluntario, Utilizador WHERE id=utilizador";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo  $row["nome"]. " ";
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
            ?>
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
	<div class="container">
		<div class="row">
		  <div class="col-sm-7">
			<h1>
				Ups! 
			</h1>
              <img src="imagens/surprised-patrick.png" height="30%" width="30%"><img src="imagens/404.png">
              <h4>
                  A página que tentou aceder não foi encontrada. Pedimos desculpa pelo incómodo.
              </h4>
			  </div>
		  </div>
          <div class="col-sm-2"></div>
		</div>
	</div>
</body>
</html>