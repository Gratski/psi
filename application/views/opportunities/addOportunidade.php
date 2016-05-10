<head>

    <meta charset='utf-8' />
    <link href='<?php echo base_url('css/fullcalendar.css'); ?>' rel='stylesheet' />
    <link href='<?php echo base_url('css/fullcalendar.print.css'); ?>' rel='stylesheet' media='print' />
    <script src='<?php echo base_url('css/lib/moment.min.js'); ?>'></script>
    <script src='<?php echo base_url('css/lib/jquery.min.js'); ?>'></script>
    <script src='<?php echo base_url('css/lib/jquery-ui.custom.min.js'); ?>'></script>
    <script src='<?php echo base_url('js/fullcalendar.min.js'); ?>'></script>
    <script src= '<?php echo base_url('js/myCalendar.js'); ?>'></script>
    
</head>

<div class="container">

    <div class="row">
        <div class="col-sm-8">

            <div class= "SectionTitle">

                <h2> Nova Oportunidade:</h2>
                <form action="addOportunidade" id="escolheHorario" method="post" role="form" onsubmit="return validateHorario();">
                    
                    
                    <!-- Titulo -->
                    <h6>Titulo</h6><br>
                    <input type="text" name="titulo" class="form-control">

                    <!-- Descricao -->
                    <h6>Descrição</h6><br>
                    <textarea name="descricao" cols="30" rows="10" class="form-control"></textarea>
                    
                    <!-- Funcao -->
                    <h6>Função</h6><br>
                    <input type="text" name="funcao" value="funcao" class="form-control"></br>

                    <!-- Selecao de areas -->
                    <h6>Selecione a area e o grupo</h6><br>
                    <select name="area" id="areaSelector" class="form-control">
                        <option value="-1"></option>
                        <?php
                        foreach ($arr as $area) {
                        ?>
                            <option value="<?php echo $area->getId(); ?>"><?php echo $area->getNome(); ?></option>
                        <?
                        }
                        ?>
                    </select>

                    <!-- grupos -->
                    <?php
                        foreach ($arr as $area) {
                            ?>
                            <select class="grupoPicker form-control" id="grupoSelector<? echo $area->getId(); ?>" name="grupo" style="display:none;">
                                <?
                                foreach($area->getGrupos() as $grupo){
                                ?>
                                
                                    <option value="<? echo $grupo->getId(); ?>">
                                        <?php echo $grupo->getNome(); ?>
                                    </option>

                                <?php 
                                    }
                                ?>
                            </select>
                    <?
                    }
                    ?>
                    
                    <!-- Numero de vagas -->
                    <h6>Numero de vagas</h6><br>
                    <input type="number" name="vagas" class="form-control">

                    <!-- LOCAL -->
                    <div class="form-group">

                        <!-- Numero de vagas -->
                        <h6>Localização</h6><br>
                        <div id="Location" class="form-group col-sm-12">
                            <div class="form-inline" >
                                <div class="form-group">
                                    <select id="country" name="country">
                                        <option value="">Selecionar País</option>
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
                    

                    <div class="col-md-12">
                        
                        <div class="col-sm-8">
                             <h6>Horário de voluntariado</h6><br>

                            <div id='wrap'>

                                <div id='calendar'></div>

                                <div style='clear:both'></div>

                            </div>
                        </div>

                        
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class= "escolheHorario" style="margin-top:90px;">
                                <div class="dataForm">
                                    <label>Data de início selecionada:</label>
                                    <input type="text" class="form-control" id="data_inicio" name="data_inicio" required>
                                    <label>Data de fim selecionada:</label>
                                    <input type="text" class="form-control" id="data_fim" name="data_fim" required>
                                </div>
                                <div class="horaForm" id="horaFormId">
                                    <label>Hora de inicio:</label>
                                    <input type="number" class="form-control" id="hora_i" name="hora_inicio" min="0" max="24" required>
                                    <label>Hora de fim:</label>
                                    <input type="number" class="form-control"  id="hora_f" name="hora_fim" min="0" max="24" required>
                                </div>
                            </div>

                        </div>
                         
                    </div>
                    <div class="col-md-12 text-right">

                        <a href="<?php echo base_url('index.php/institution/my'); ?>">
                            <button class="btn btn-warning">Cancelar</button>
                        </a>
                        <!-- Submit button -->   
                        <button class="btn btn-success">Submit</button>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                    </div>
                    

                    </form>
                    </div>
                    </div>
                    </div>
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


                                // PARA AREAS
                                $('#areaSelector').change(function(){
                                   $('.grupoPicker').hide();
                                   $('#grupoSelector'+this.value).show();
                                });








                            </script>
