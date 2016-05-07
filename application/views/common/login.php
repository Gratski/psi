

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
				<a href="signup/institution" class="btn btn-lg btn-primary btn-block">Instituição</a>
				<a href="signup/volunteer" class="btn btn-lg btn-primary btn-block">Voluntário</a>
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