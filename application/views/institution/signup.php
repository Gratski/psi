
	
		<div class="container">

			<div class="row" style="padding-top:10px;">
				<a href="<?php echo base_url(); ?>"><button class="btn btn-default">< Voltar a página inicial</button></a>
			</div>

			<div class="row">
				<div class="col-sm-8">
					<div class= "SectionTitle">
						<h1> Resgito de Instituição </h1>
						<p> Resgiste-se para  publicar oportunidades de voluntariado! </p>
						<div class="erro">
							<p><?php if(hasFlash()) printFlash(); ?><p>
						</div>
					</div>
					<div class = "registarForm">
					
						<form role="form" method="post" enctype="multipart/form-data" onsubmit="return formValidator()"  action="institution" id="institutionRegist">

							<!-- NAME -->
							<label  class ="control-label col-sm-4" for="instituitionName">Nome</label>
							<div class="form-group">
								<input type="text" name="username" class="form-control" id="instituitionName" placeholder="Nome de instituição..." required>
							</div>

							<!-- REPRESENTANT NAME -->
							<label  class ="control-label col-sm-4" for="instituitionName">Nome de representante</label>
							<div class="form-group">
								<input type="text" name="representantName" class="form-control" id="representanteName" placeholder="Nome de representante..." required>
							</div>
							
							<!-- LOCAL -->
							<div class="form-group">

								<label  class ="control-label col-sm-12" for="Location">Localização</label>
								<div id="Location" class="form-group col-sm-12">
									<div class="form-inline" >
										<div class="form-group">
											<label>Pais</label>
											<select id="country" name="country">
												<option value="1"> </option>
												<option value="2">Portugal</option>
											</select>
										</div>

										<div class="form-group" id="districtContainer" style="display:none;">
											<label>Distrito</label>
											<select id="district" name="district">
												
												<option value="0"></option>
												<option value="1">Estremadura</option>
												
											</select>
										</div>
										
										<div class="form-group" id="cityContainer" style="display:none;">
											<label>Concelho</label>
											<select id="city" name="city">
												<option value="0"></option>
												<option value="1">Lisboa</option>
											</select>
										</div>
										
										<div class="form-group" id="townContainer" style="display:none;">
											<label>Freguesia</label>
											<select id="town" name="town">
												<option value="0"></option>
												<option value="1">Odivelas</option>
											</select>
										</div>
								    </div>
								</div>
							</div>

							<!-- ADDRESS -->
							<label  class ="control-label col-sm-4" for="institutionAddress">Morada</label>
							<div class="form-group">
								<input type="text" name="institutionAddress" class="form-control" id="institutionAddress" placeholder="Morada  de Instituição..." required>
							</div>

							<!-- REPRESENTANT EMAIL -->
							<label  class ="control-label col-sm-4" for="institutionEmail">Email de contacto</label>
							<div class="form-group">
								<input type="email" name="institutionEmail" class="form-control" id="institutionEmail" placeholder="Email de contacto" required>
							</div>

							<!-- INSTITUTIO PHONE -->
							<label  class ="control-label col-sm-4" for="institutionPhone">Contacto telefónico</label>
							<div class="form-group">
								<input type="tel" name="institutionPhone" class="form-control" id="institutionPhone" placeholder="Contacto telefonico" required>
							</div>
							
							<!-- DESCRIPTION -->
							<label  class ="control-label col-sm-4" for="institutionDescription">Descrição <small>(breve)</small> </label>
							<div class="form-group">
								<textarea name="institutionDescription" class="form-control" id="institutionDescription" placeholder="Decrição breve da Instituição e do seu papel na sociedade" required></textarea>
							</div>
							
							<!-- WEBSITE -->
							<label  class ="control-label col-sm-4" for="institutionWebsite">Website</label>
							<div class="form-group">
								<input type="url" name="institutionWebsite" class="form-control" id="institutionWebsite" placeholder="Exemplo: www.instituição.pt" required>
							</div>

							<!-- PASSWORD AND PASSWORD CONFIRMATION -->
							<label  class ="control-label col-sm-4" for="institutionPassword">Password</label>
							<div class="form-group">
								<input type="password" name="institutionPassword" class="form-control" id="institutionPassword" required>
							</div>

							
							<label  class ="control-label col-sm-4" for="institutionPasswordConfirmation">Confirmação de password</label>
							<div class="form-group">
								<input type="password" name="institutionPasswordConfirmation" class="form-control" id="institutionPasswordConfirmation" required>
							</div>
							
							<!-- SEND BUTTTON -->
							<div class="form-group" style="width:100%;">
								<div class="submitButton" style="width:100%;">
									<button type="submit" class="btn btn-success pull-right" form ="institutionRegist" >Finalizar registo</button>
								</div>	
							</div>

							</form>
							
					
					</div>
					
				</div>
				<div class="col-sm-4">
					
					
				</div>



				<script type="text/javascript">
					
					/////////////////////////////////////////////////////////
					// VALIDATOR
					var website = $('#institutionWebsite');
					function formValidator(){

						alert(website.value);

					}


					/////////////////////////////////////////////////////////
					// LOCATION SERVICE
					// set all location variables
					var countryField = '#country';

					var districtFieldContainer = '#districtContainer';
					var districtField = '#district';

					var cityFieldContainer = '#cityContainer';
					var cityField = '#city';

					var townFieldContainer = '#townContainer';
					var townField = '#town';

					// set all event triggers for location fields changes
					$(countryField).change(function(){
						getDistricts(this.value);
					})

					$(districtField).change(function(){
						getCities(this.value);
					})

					$(cityField).change(function(){
						getTowns(this.value);
					})

					// gets all countries
					function getDistricts(countryId){

						

						// show loading

						// get all countries

						// hide city and town
						hideByIds([townFieldContainer, cityFieldContainer, districtFieldContainer]);

						// hide loading

						// show districts	
						showByIds([districtFieldContainer]);
					}

					function getCities(districtId){
						hideByIds([cityFieldContainer, townFieldContainer]);
						showByIds([cityFieldContainer]);
					}

					function getTowns(cityId){
						hideByIds([townFieldContainer]);
						showByIds([townFieldContainer]);
					}



					// UTILS
					// hide by id
					function hideByIds(list){
						list.forEach( function(element, index) {
							console.log('hide '+element);
							$(element).hide();
						});
					}

					function showByIds(list){
						list.forEach( function(element, index) {
							console.log('show '+element);
							$(element).show();
						});
					}

				</script>
							