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
                <h1> Editar Perfil </h1>
                <div class= "error">
                    <p><?php if (hasFlash()) printFlash(); ?></p>
                </div>
            </div>
            <div class = "registarForm">

                <form role="form" method="POST" onsubmit="return validateForm()"  action="volunteer" id="registaVoluntario">

                    <div class="form-inline" style="display:none" >
                        <input type="text" name="id" class="form-control" value= " <?php echo $id; ?> " required>
                    </div>


                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" id="exampleInputName2" placeholder="Nome próprio" value= " <?php echo $nome; ?> " required>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="data">Data de Nascimento:</label>
                        <label class="control-label" id="changeDate" for="data"><?php echo $data_nascimento; ?></label>
                        <input type="date" name="data_nascimento" id="dataN" placeholder= "<?php echo $data_nascimento; ?> " value= " <?php echo $data_nascimento; ?> " onchange= "changeDate()" >
                    </div>

                    <fieldset class="form-group row">
                        <label  class ="control-label col-sm-2" for="exampleSelect1">Género:</label>
                        <select id="Genero" name="genero">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </fieldset>

                    <div class= "form-group row">
                        <label  class ="control-label col-sm-2" for="exampleSelect1">Freguesia: <span><?php echo $freguesia ?> <span> </label>
                                    <button class="btn btn-info" type="button" onclick = "mostraMorada()"  style="padding:0px;background-color:blue;border-color:blue" onclick = "mostraMorada()">Editar</button>

                                    </div>

                                    <div class="form-inline" id="moradaForm" style="display:none">
                                        <div class="form-group">
                                            <label>Pais</label>
                                            <select id="pais" name="pais" onchange = "setDistritos()">
                                                <option> </option>
                                                <option>Portugal</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Distrito</label>
                                            <select id="distrito" name="distrito" onchange = "setConcelhos()">
                                                <option> </option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Concelho</label>
                                            <select id="concelho" name="cidade" onchange = "setFreguesias()">
                                                <option> </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Freguesia</label>
                                            <select id="freguesia" name="freguesia">
                                                <option>  </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class = "habilitacoes" id = "habilitID">
                                        <div class="habilitacoesLAbel">
                                            <label>Habilitações:</label>	
                                        </div>
                                        <!--  visivel-->
                                        <div class="form-inline" id="toAdd">
                                            <div class="form-group" id ="xpto">
                                                <label>Grau</label>
                                                <select  name="degree0" required>
                                                    <option value="Sem grau"> </option>
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
                                        <label class="control-label col-sm-2" for="data">telefone:</label>
                                        <input type="number" class="form-control" id="telefone" placeholder="<?php echo $telefone; ?>" name="telefone" value= "<?php $telefone; ?> ">
                                        <label class="control-label col-sm-2" for="data">email:</label>
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
                                    <!--
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    -->


                                    </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class ="foto">
                                            <img class="img-responsive img-circle" id = "myFoto" alt="" src="<?php echo base_url('img/camera.jpg'); ?>">
                                        </div>
                                        <div class= "escolheFoto">

                                            <label class="file">
                                                <input type="file" id="file" name= "photo" onchange = "setFoto()">
                                                <span class="file-custom"></span>
                                            </label>

                                        </div>

                                        </form>
                                        <div class="form-group">
                                            <button type="button" class=" btn btn-primary">Cancelar</button>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class=" btn btn-primary">Submeter</button>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?php echo base_url('index.php/volunteer/edit/schedule'); ?>" class="btn btn-lg btn-primary btn-block">Editar Disponibilidade</a>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?php echo base_url('index.php/volunteer/edit/areas'); ?>" class="btn btn-lg btn-primary btn-block">Editar Áreas de Interesse e Grupos</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                    </div>
                                    </div>
                                    </div>
