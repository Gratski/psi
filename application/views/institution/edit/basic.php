<div class="container">
	
	<div class="row">
		
		<div class="col-md-8">
			
			<!-- NAME -->
			<div class="col-md-12">
				<label  class ="control-label col-sm-4" for="username">Nome</label>
				<div class="form-group">
					<input class="form-control" type="text" name="username" id="username" value="<?php echo "NAME"; ?>">
				</div>

			</div>
			

			<!-- REPRESENTANT NAME -->
			<div class="col-md-12">
				<label  class ="control-label col-sm-4" for="representantName">Nome de representante</label>
				<div class="form-group">
					<input class="form-control" type="text" name="representantName" id="representantName" value="<?php echo "REPRESENTANT"; ?>">
				</div>

			</div>

			<!-- ADDRESS -->
			<div class="col-md-12">
				<label  class ="control-label col-sm-4" for="institutionAddress">Morada</label>
				<div class="form-group">
					<input class="form-control" type="text" name="institutionAddress" id="institutionAddress" value="<?php echo "MORADA"; ?>">
				</div>

			</div>

			<!-- CONTACTO TELEFONICO -->
			<div class="col-md-12">
				<label  class ="control-label col-sm-4" for="institutionPhone">Contacto telefónico</label>
				<div class="form-group">
					<input class="form-control" type="phone" name="institutionPhone" id="institutionPhone" value="<?php echo "TELEFONE"; ?>">
				</div>

			</div>

			<!-- DESCRIÇÃO -->
			<div class="col-md-12">
				<label  class ="control-label col-sm-4" for="institutionDescription">Descrição</label>
				<div class="form-group">
					<textarea class="form-control" name="institutionDescription" id="institutionDescription" value="<?php echo "DESCRIPTION"; ?>"></textarea>
				</div>

			</div>

			<!-- WEBSITE -->
			<div class="col-md-12">
				<label  class ="control-label col-sm-4" for="institutionWebsite">Website</label>
				<div class="form-group">
					<input class="form-control" type="phone" name="institutionWebsite" id="institutionWebsite" value="<?php echo "www.uiui.tete"; ?>">
				</div>

			</div>

			<!-- SEND BUTTTON -->
			<div class="form-group" style="width:100%;">
				<div class="submitButton" style="width:100%;">
					<button type="submit" class="btn btn-success pull-right" form ="institutionEdit" >Guardar alterações</button>
				</div>	
			</div>

		</div>

		<!-- MORE EDIT OPTION -> LOCATION -> PASSWORD -->
		<div class="col-md-4">
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editLocationModal">Alterar Localização</button>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editPasswordModal">Alterar Password</button>

		</div>

	</div>

</div>


<!-- MODALS -->
<!-- EDIT LOCATION MODAL -->
<div id="editLocationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar localização</h4>
      </div>
      <div class="modal-body">
        
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

      
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- EDIT LOCATION MODAL -->
<div id="editPasswordModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar localização</h4>
      </div>
      <div class="modal-body">
        
        <form action="edit/pass" method="POST">
			
			<!-- PASSWORD AND PASSWORD CONFIRMATION -->
			<label  class ="control-label col-sm-12" for="institutionPasswordActual">Password actual</label>
			<div class="form-group">
				<input type="password" name="institutionPasswordActual" class="form-control" id="institutionPasswordActual" required>
			</div>

			<label  class ="control-label col-sm-12" for="institutionPassword">Nova Password</label>
			<div class="form-group">
				<input type="password" name="institutionPassword" class="form-control" id="institutionPassword" required>
			</div>

			
			<label  class ="control-label col-sm-12" for="institutionPasswordConfirmation">Confirmação de nova password</label>
			<div class="form-group">
				<input type="password" name="institutionPasswordConfirmation" class="form-control" id="institutionPasswordConfirmation" required>
			</div>


		</form>
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </div>

  </div>
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




