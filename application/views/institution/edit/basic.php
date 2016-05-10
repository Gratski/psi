<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Guardar em views/
// ===========================================================================
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class= "SectionTitle">
                <h1> Editar Instituição </h1>
                <div class= "error">
                    <p><?php if (hasFlash()) printFlash(); ?></p>
                </div>
            </div>  
            <div class = "registarForm">

                <form role="form" method="post"  action="updateBasic" id="registaInstituicao">

                    <div class="form-inline" style="display:none" >
                        <input type="text" name="id" class="form-control" value= " <?php echo $id; ?> " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" id="exampleInputName2" 
                               placeholder="Nome instituição" value= " <?php echo $nome; ?> " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="descricao" class="form-control" id="exampleInputName2" 
                               placeholder="descrição" value= " <?php echo $descricao; ?> " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="website" class="form-control" id="exampleInputName2" 
                               placeholder="website" value= " <?php echo $website; ?> " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="nome_representante" class="form-control" id="exampleInputName2" 
                               placeholder="nome_representante" value= " <?php echo $representante; ?> " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="morada" class="form-control" id="exampleInputName2" 
                               placeholder="morada" value= " <?php echo $morada; ?> " required>
                    </div>

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

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="data">telefone:</label>
                        <input type="number" class="form-control" id="telefone" 
                               placeholder="<?php echo $telefone; ?>" name="telefone" value= "<?php echo $telefone; ?> ">
                        <label class="control-label col-sm-2" for="data">email instituição:</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo $email; ?> " required>
                    </div>


                    <div class= "form-group row" id= "alteraPass">
                        <label  class ="control-label col-sm-2" for="exampleSelect1">Alterar Password? </label>
                        <label class="radio-inline"><input type="radio" onclick ="showPass()" name="optradio">sim</label>
                        <label class="radio-inline"><input type="radio" onclick ="hidePass()" name="optradio" checked>não</label>


                        <div class = "passwords" id="passID" style="display:none">
                            <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="password" value= "<?php echo $password; ?>" required>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Repetir Password" name="pass2" value= "<?php echo $password; ?>"required>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <a href="<?php echo base_url('index.php/institution/my'); ?>"><button type="button" class=" btn btn-primary">Cancelar</button></a>
        </div>
        <div class="form-group">
            <input type="submit" class=" btn btn-primary" value="Submit"></>
        </div>
    </div>
</form>
</div>

<script type="text/javascript">

    /////////////////////////////////////////////////////////
    // VALIDATOR
    var website = $('#institutionWebsite');
    function formValidator() {

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
    $(countryField).change(function () {
        getDistricts(this.value);
    })

    $(districtField).change(function () {
        getCities(this.value);
    })

    $(cityField).change(function () {
        getTowns(this.value);
    })

    // gets all countries
    function getDistricts(countryId) {



        // show loading

        // get all countries

        // hide city and town
        hideByIds([townFieldContainer, cityFieldContainer, districtFieldContainer]);

        // hide loading

        // show districts	
        showByIds([districtFieldContainer]);
    }

    function getCities(districtId) {
        hideByIds([cityFieldContainer, townFieldContainer]);
        showByIds([cityFieldContainer]);
    }

    function getTowns(cityId) {
        hideByIds([townFieldContainer]);
        showByIds([townFieldContainer]);
    }



    // UTILS
    // hide by id
    function hideByIds(list) {
        list.forEach(function (element, index) {
            console.log('hide ' + element);
            $(element).hide();
        });
    }

    function showByIds(list) {
        list.forEach(function (element, index) {
            console.log('show ' + element);
            $(element).show();
        });
    }

</script>