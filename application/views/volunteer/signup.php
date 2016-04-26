<!DOCTYPE html>
<html>
	<head>
		<title>Registar Voluntário</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/registoEstilos.css');?>">
		<meta charset="UTF-8">
		<script src="http://code.jquery.com/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="<? echo base_url('css/bs/js/bootstrap.min.js');?>"></script>
		 <script type="text/javascript" src="../PSI/js/function.js"></script>

	</head>
	<body>
	<!-- 
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<ul class="nav navbar-nav navbar-left">
				 <a class="navbar-brand page-scroll" href="home.php">Volunteer@FCUL</a>
			</ul>
		  </div>
		</nav>
	-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class= "SectionTitle">
						<h1> Regista-te </h1>
						<p> Ajuda a tua causa! </p>
						<div class="erro">
							<p><?php if(hasFlash()) printFlash(); ?><p>
						</div>
					</div>
					<div class = "registarForm">
					
						<form role="form" method="post" enctype="multipart/form-data" onsubmit="return validateForm()"  action="volunteer" id="registaVoluntario">
						
							<div class="form-group">
								<input type="text" name="username" class="form-control" id="exampleInputName2" placeholder="Nome próprio" required>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-sm-2" for="data">Data de Nascimento:</label>
								<input type="date" name="birthDay"id="dataN" placeholder="Data de Nascimento" required>
							</div>
							
							<fieldset class="form-group row">
								<label  class ="control-label col-sm-2" for="exampleSelect1">Género:</label>
								<select id="Genero" name="gender">
									<option value="M">Masculino</option>
									<option value="F">Feminino</option>
								</select>
							</fieldset>
							
							<div class="form-inline" >
								<div class="form-group">
									<label>Pais</label>
									<select id="pais" name="country" onchange = "setDistritos()">
										<option> </option>
										<option>Portugal</option>
									</select>
								</div>

								<div class="form-group">
									<label>Distrito</label>
									<select id="distrito" name="district" onchange = "setConcelhos()">
										<option> </option>
										
									</select>
								</div>
								
								<div class="form-group">
									<label>Concelho</label>
									<select id="concelho" name="city" onchange = "setFreguesias()">
										<option> </option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Freguesia</label>
									<select id="freguesia" name="town">
										<option> </option>
									</select>
								</div>
						    </div>
							
							<div class = "hablitacoes" id = "hablitID">
								<div class="hablitacoesLAbel">
									<label>Hablitações:</label>	
								</div>
								<!--  visivel-->
								<div class="form-inline" id="toAdd">
									<div class="form-group" id ="xpto">
										<label>Grau</label>
										<select  name="degree0" >
											<option value="Sem grau">Sem grau</option>
											<option value="Ensino Básico">Ensino Básico</option>
											<option value="12ºano">12ºano </option>
											<option value="Licenciature">Licenciatura</option>
											<option value="Mestrado">Mestrado</option>
											<option value="Doutoramento">Doutoramento</option>
										</select>
									</div>
									<div class="form-group" >
											<input type="text" class="form-control" id="exampleInputName2" placeholder="Área" name="course0" required>
									</div>
							
									
									<div class="form-group">
											<button type="button" id="addForm" onclick="adicionaForm()"class="btn btn-default" aria-label="Left Align" style="visibility:visible">
												<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
											</button>

									</div>
									
								</div>
								
								<!-- Escondido 1-->
								<div class="form-inline" id="toAdd1" style="display:none" >
								
								
									<div class="form-group" id ="xpto">
										<label>Grau</label>
										<select  name="degree1" >
											<option value="Sem grau">Sem grau</option>
											<option value="Ensino Básico">Ensino Básico</option>
											<option value="12ºano">12ºano </option>
											<option value="Licenciature">Licenciatura</option>
											<option value="Mestrado">Mestrado</option>
											<option value="Doutoramento">Doutoramento</option>
										</select>
									</div>
									<div class="form-group" >
											<input type="text" class="form-control" id="exampleInputName2" placeholder="Área" name="course1">
									</div>
				
								</div>
								
								<!-- Escondido 2-->
								<div class="form-inline" id="toAdd2" style="display:none">
									<div class="form-group">
										<label>Grau</label>
										<select  name="degree2" >
											<option value="Sem grau">Sem grau</option>
											<option value="Ensino Básico">Ensino Básico</option>
											<option value="12ºano">12ºano </option>
											<option value="Licenciature">Licenciatura</option>
											<option value="Mestrado">Mestrado</option>
											<option value="Doutoramento">Doutoramento</option>
										</select>
									</div>
									<div class="form-group" >
											<input type="text" class="form-control" id="exampleInputName2" placeholder="Área" name="course2">
									</div>
				
								</div>
								
								
								
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="telefone" placeholder="telefone" name="phone">
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
								<div class = "passwords" id="passID">
									<input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="pass" required>
									<input type="password" class="form-control" id="inputPassword2" placeholder="Repetir Password" name="pass2"required>
								</div>
							</div>
								<!--
								<button type="submit" class="btn btn-default">Submit</button>
								-->
							
					
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class ="foto">
						<img class="img-responsive img-circle" id = "myFoto" alt="" src="../img/camera.jpg">
					</div>
					<div class= "escolheFoto">
						
							<label class="file">
								<input type="file" id="file" name= "photo" onchange = "setFoto()">
								<span class="file-custom"></span>
							</label>
					
					</div>
					
					</form>
					<div class="submitButton">
						<button type="submit" class="btn btn-default" form ="registaVoluntario" >Submit</button>
					</div>	
				</div>
							
			
		 <footer>
			<div class="container">
				<div class="row" id="footerRow" >
					<span class="copyright">Copyright &copy; Grupo18- PSI</span>
				</div>
			</div>
		</footer>
	</body>
</html>