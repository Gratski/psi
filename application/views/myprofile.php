<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>
<!DOCTYPE html>
<html>
  <head>
  <title><?php
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
    ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="bs/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default">
	  <div class="container-fluid">
		<ul class="nav navbar-nav navbar-right">
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" align="right">
                <img src="imagens/profile.png" width="3%" height="3%">
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
            <div class="col-sm-2">
                <img src="imagens/profile.png" height="150" width="150" align="right">
            </div>
		  <div class="col-sm-3">
			<h1>
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

                $sql = "SELECT utilizador, data_nascimento, foto, U.nome as nome_user, U.id, telefone, freguesia, C.nome as nome_conselho, D.nome as nome_distrito, F.nome as freguesia_nome, P.nome as pais_nome 
                        FROM Voluntario, Utilizador U, Freguesia F, concelho C, Distrito D, Pais P 
                        WHERE U.id=utilizador 
                        AND freguesia=F.id 
                        AND F.concelho=C.id 
                        AND C.distrito=D.id 
                        AND D.pais=P.id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo  $row["nome_user"]. "</h1> " . $row["telefone"]. "<br> " . $row["freguesia_nome"]. ", " . $row["nome_conselho"]. ", " . $row["nome_distrito"]. ", " . $row["pais_nome"]. ". </div>
          <div class='col-sm-2'><br><br><p>" . $row["data_nascimento"]. "</p></div>";
                        if($row["foto"] == 0){
                            
                        } else {
                            
                        }
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>
		</div>
        <div class="row">
            <div class="col-sm-10">
                <h2>Oportunidades</h2>
            </div>
        </div>
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

                $sql = "SELECT A.nome as nome_area, O.horario as h, website, V.utilizador, UI.nome as nome_ins, funcao, I.utilizador, U.id, F.nome as nome_f, P.nome as nome_pais
                        FROM Voluntario V, Instituicao I, Utilizador UI, Utilizador U, Oportunidade O, area A, grupo G, grupo_area GA, interesses_voluntario iv, Freguesia F, concelho C, Distrito D, Pais P 
                        WHERE UI.id=I.utilizador
                        AND V.utilizador=U.id
                        AND U.id=iv.voluntario
                        AND A.id=iv.area
                        AND G.id=iv.grupo
                        AND O.freguesia=F.id 
                        AND F.concelho=C.id 
                        AND C.distrito=D.id 
                        AND D.pais=P.id
                        AND O.area=A.id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='row'><div class='col-sm-1' align='left'>" . $row["funcao"]. 
                            "</div> <div class='col-sm-6' align='right'> " . $row["nome_f"]. ", " . $row["nome_pais"]. ".  </div>
        </div>
        <div class='row'>
            <div class='col-sm-3' align='left'>
                <a href='" . $row["website"]. "'>" . $row["nome_ins"]. "</a></div><div class='col-sm-4' align='right'>"
                            . $row["h"]. "</div>
        </div>
        <div class='row'>
            <div class='col-sm-*' align='left'>
                <form role='form' action='#' method='post'>
                    <button  type='submit' class=' btn btn-primary'>" 
                      . $row["nome_area"]. " </button>
                </form>
            </div>
            </div>";
                    }
                } else {
                    echo "<div class='row'>Não há oportunidades a apresentar</div>";
                }

                mysqli_close($conn);
                ?>
	</div>
    <div class="footer">
        Grupo 018 - PSI
    </div>
</body>
</html>