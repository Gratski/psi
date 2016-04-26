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
    <link href="../psi/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../psi/css/estilos.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/style.css');?>">

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
			    <a class="navbar-brand" href="#">Voluntários@FCUL</a>
			</div>
        <div class="navbar-collapse collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li><a href="<? echo base_url(); ?>">Página inicial</a></li>
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container">
		<div class = "login" id="login">
			<form action = "user/createSession" class="form-signin" method = "POST">
				<h2 class="form-signin-heading">Iniciar Sessão</h2>
				<div class= "erro">
					<p><?php if(hasFlash()) printFlash(); ?></p> 
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
			<a onclick="change()">Registar-me</a>	
		</div>
		<div class = "registo" id="regist" style="display:none; border:none;">
			<h2 class="form-signin-heading">Registar-se</h2>
			<div class= "loginError">
					<p> Registe-se agora para aceder à plataforma.</p> 
				</div>
			<div class= "opcoesRegisto">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Instituição</button>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Voluntário</button>
			</div>
			<span><a onclick="change()">já tenho conta</a></span>
		</div>
		
	</div>
   
	
<script type="text/javascript">
	
	var isReg = false;
	var isLog = true;

	function change(){
		if(!isReg)
		{
			$('#regist').slideUp(function(){
				$('#login').slideDown();
			})
			isReg = true;
			isLog = false;
		}else{
			$('#login').slideUp(function(){
				$('#regist').slideDown();
			})
			isReg = false;
			isLog = true;
		}
	}

</script>

</body>