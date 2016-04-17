<?php
//o código PHP seguinte não permite acessos directos ao ficheiro
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - view_inicio.php (1a Versão)
//            - Guardar em views/
// ===========================================================================
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>voluntarios@FCUL</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/estilos.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	
  
</head>

<body id="page-top" class="index" style= "padding-top: 70px">
	
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" aria-expanded="false" aria-controls="navbar" type="button" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			    <a class="navbar-brand" href="#">Project name</a>
			</div>
        <div class="navbar-collapse collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider" role="separator"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container">
		<div class = "login">
			<form action = "user" class="form-signin" method = "POST">
				<h2 class="form-signin-heading">Iniciar Sessão</h2>
				<div class= "loginError">
					<p class= "erro"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Utilizador ou Palavra-passe errados.</p> 
				</div>
				<label for="inputEmail" class="sr-only">Email</label>
				<input name= "email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input name= "pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Lembrar-me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
			</form>		
		</div>
		<div class = "registo">
			<h2 class="form-signin-heading">Registar-se</h2>
			<div class= "loginError">
					<p> Registe-se agora para aceder à plataforma.</p> 
				</div>
			<div class= "opcoesRegisto">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Instituição</button>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Voluntário</button>
			</div>
		</div>
		
	</div>
   
	
	

</body>