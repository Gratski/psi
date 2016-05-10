<head>

    <meta charset='utf-8' />
    <link href='<?php echo base_url('css/fullcalendar.css'); ?>' rel='stylesheet' />
    <link href='<?php echo base_url('css/fullcalendar.print.css'); ?>' rel='stylesheet' media='print' />
    <script src='<?php echo base_url('css/lib/moment.min.js'); ?>'></script>
    <script src='<?php echo base_url('css/lib/jquery.min.js'); ?>'></script>
    <script src='<?php echo base_url('css/lib/jquery-ui.custom.min.js'); ?>'></script>
    <script src='<?php echo base_url('js/fullcalendar.min.js'); ?>'></script>
    <script src= '<?php echo base_url('js/myCalendar.js'); ?>'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
</head>

<div class="container">

    <div class="row">
        <div class="col-sm-8">

            <div class= "SectionTitle">

                <h1> Nova Oportunidade:</h1>
                <form action="addOportunidade" id="addOportunidade" method="post" role="form" onsubmit="return validateHorario();">
                    <input type="text" name="funcao" value="funcao"></br>

                    <?php
                    foreach ($arr as $row) {
                        foreach($row->getGrupos() as $grupo){
                            echo 'AREA: '.$row->getNome();
                            echo ' , GRUPO: '.$grupo->getNome().'<br>';
                        }
                    }
                    ?>

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


                    <lista de areas de interesse>

                        <lista de grupos de atuação>

                            <h6>Numero de vagas</h6><br>
                            <ul class="dropdown-menu" name="num">
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>

                            </ul>

                            <div class="col-sm-8">
                                <div class= "SectionTitle" style="margin-bottom:30px;">
                                    <h1> Defina a data e o horário</h1>
                                </div>

                                <div id='wrap' style="width:500px">

                                    <div id='calendar'></div>

                                    <div style='clear:both'></div>

                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class= "escolheHorario" style="margin-top:90px;">
                                    <div class="dataForm">
                                        <h3>Selecione no calendário, a data de início:</h3>
                                        <label>Data de início selecionada:</label>
                                        <input type="text" class="form-control" id="data_inicio" name="data_inicio" required>
                                        <label>Data de fim selecionada:</label>
                                        <input type="text" class="form-control" id="data_fim" name="data_fim" required>
                                    </div>
                                    <div class="horaForm" id="horaFormId">
                                        <h3>Defina o horário da oportunidade:</h3>
                                        <label>Hora de inicio:</label>
                                        <input type="number" class="form-control" id="hora_i" name="hora_inicio" min="0" max="24" required>
                                        <label>Hora de fim:</label>
                                        <input type="number" class="form-control"  id="hora_f" name="hora_fim" min="0" max="24" required>
                                    </div>
                                </div>

                            </div>



                            <button form ="addOportunidade">Submit</button>
                            <a href="<?php echo base_url('index.php/institution/my'); ?>"><button type="reset">Cancel</button></a>
                            </form>

                            </div>
                            </div>
                            </div>
                            </div>
