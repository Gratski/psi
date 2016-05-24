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
                
                <div class="col-md-12">

                    <h4>Informação geral</h4><br>

                    <table class="table" style="font-size:14px;">
                        


                        <!-- NOME -->
                        <tr>
                            <td><b>Nome:</b></td>
                            <td><?php echo $nome?></td>
                            <td><i onclick="showHide('nomeEdit');" class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                        <tr id="nomeEdit" style="display:none;">
                            <form action="column" method="post">
                                <td>
                                    <input type="text" class="form-control" name="field" value="nome" style="display:none;" />
                                    <input type="text" class="form-control" name="value" value="<?php echo $nome?>" />
                                </td>
                                <td>
                                    <td> 
                                        <button onclick="showHide('nomeEdit')" class="btn btn-sm btn-warning">
                                            cancelar
                                        </button>
                                        <button class="btn btn-sm btn-success">guardar</button> 
                                    </td>
                                </td>    
                            </form>
                        </tr>



                        <!-- DATA NASCIMENTO -->
                        <tr>
                            <td><b>Data de Nascimento:</b></td>
                            <td><?php echo $data_nascimento; ?></td>
                            <td><i onclick="showHide('data_nascimentoEdit');" class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                        <tr id="data_nascimentoEdit" style="display:none;">
                            <form action="columnVolunteer" method="post">
                                <td>
                                    <input type="text" class="form-control" name="field" value="data_nascimento" style="display:none;" />
                                    <input type="text" class="form-control" name="value" value="<?php echo $data_nascimento;?>" />
                                </td>
                                <td>
                                    <td> 
                                        <button onclick="showHide('data_nascimentoEdit')" class="btn btn-sm btn-warning">
                                            cancelar
                                        </button>
                                        <button class="btn btn-sm btn-success">guardar</button> 
                                    </td>
                                </td>    
                            </form>
                        </tr>



                        <!-- GENERO -->
                        <tr>
                            <td><b>Género:</b></td>
                            <td><?php if($genero == 'M'){echo "Masculino";}else{echo "Feminino";} ?></td>
                            <td><i onclick="showHide('generoEdit');" class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                         <tr id="generoEdit" style="display:none;">
                            <form action="columnVolunteer" method="post">
                                <td>
                                    <input type="text" class="form-control" name="field" value="genero" style="display:none;" />
                                    <select name="value">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </td>
                                <td>
                                    <td> 
                                        <button onclick="showHide('generoEdit')" class="btn btn-sm btn-warning">
                                            cancelar
                                        </button>
                                        <button class="btn btn-sm btn-success">guardar</button> 
                                    </td>
                                </td>    
                            </form>
                        </tr>



                        <!-- LOCALIDADE -->
                        <tr>
                            <td><b>Localidade:</b></td>
                            <td><?php echo $pais.', '.$distrito.','.$concelho.', '.$freguesia; ?></td>
                            <td><i onclick="showHide('localidadeEdit')" class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                        <tr id="localidadeEdit" style="display:none;">
                            <td><b>Localidade:</b></td>
                            <td><?php echo $pais.', '.$distrito.','.$concelho.', '.$freguesia; ?></td>
                            <td><i class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                        


                        <!-- CONTACTO TELEFONICO -->
                        <tr>
                            <td><b>Contacto Telefónico:</b></td>
                            <td><?php echo $telefone; ?></td>
                            <td><i onclick="showHide('contactoEdit')" class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                        <tr id="contactoEdit" style="display:none;">

                            <form action="column" method="post">
                                <td>
                                    <input type="text" class="form-control" name="field" value="telefone" style="display:none;" />
                                    <input type="text" class="form-control" name="value" value="<?php echo $telefone;?>" />
                                </td>
                                <td>
                                    <td> 
                                        <button onclick="showHide('contactoEdit')" class="btn btn-sm btn-warning">
                                            cancelar
                                        </button>
                                        <button class="btn btn-sm btn-success">guardar</button> 
                                    </td>
                                </td>    
                            </form>
                            
                        </tr>
                    </table>
                    



                    <!-- HABILITACOES -->
                    <h4>Habilitações&nbsp;&nbsp;&nbsp;<small><button onclick="showHide('addHabilitacoes')" class="btn btn-sm btn-success">+</button></small></h4><br>
                    
                    <!-- ADICIONAR HABILITACAO -->
                    <form action="addHabilitacao" method="post">
                        <table id="addHabilitacoes" class="table" style="font-size:14px; display:none;">
                            <tr>
                                <td><input class="form-control" type="text" name="grau" placeholder="Grau" /></td>
                                <td><input class="form-control" type="text" name="descricao" placeholder="Descricao" /></td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td> 
                                    <button onclick="showHide('addHabilitacoes')" class="btn btn-sm btn-warning">
                                        cancelar
                                    </button>
                                    <button class="btn btn-sm btn-success">adicionar</button> 
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                    <!-- LISTA DE HABILITACOES -->
                    <table class="table" style="font-size:14px;">
                            <?php foreach ($habilitacoes as $value) { ?>
                               <tr>
                                   <td><b>Grau:</b></td>
                                   <td><?php echo $value->grau; ?></td>
                                   <td><b>Descrição</b></td>
                                   <td><?php echo $value->area; ?></td>
                                   <form action="removeHabilitacoes" method="post">
                                        <input type="text" value="<? echo $value->id; ?>" name="id" style="display:none;"/>

                                       <td><input type="submit" value="remover" class="btn btn-sm btn-danger"></td>
                                   </form>
                                   
                               </tr> 
                            <?php } ?>
                    </table>




                    <!-- PALAVRA-PASSE -->
                    <h4>Palavra-Passe</h4><br>
                    <table class="table" style="font-size:14px;">
                        <tr>
                            <td><b>Actual</b></td>
                            <td> <i class="glyphicon glyphicon-lock"></i>  <td>
                            <td><i onclick="showHide('passwordEdit');" class="glyphicon glyphicon-edit"></i></td>
                        </tr>
                    </table>


                    <form action="password" method="post">
                        <table id="passwordEdit" class="table" style="font-size:14px; display:none;">
                            <tr>
                                <td><b>Actual:</b></td>
                                <td><input type="password" name="actual" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><b>Nova:</b></td>
                                <td><input type="password" name="nova" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><b>Confirmação de Nova:</b></td>
                                <td><input type="password" name="novaConfirmacao" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td class="text-right"> 
                                    <button onclick="showHide('passwordEdit')" class="btn btn-sm btn-warning">
                                        cancelar
                                    </button>
                                    <button class="btn btn-sm btn-success">adicionar</button> 
                                </td>
                            </tr>
                        </table>     
                    </form>
                    
                </div>













                <!-- ANTIGA -->
                
                                    </div>
                                    <div class="col-sm-2"></div>
                                    </div>
                                    </div>
                                    </div>



<script type="text/javascript">
    
    function showHide(id){

        var edits = ['nomeEdit', 'data_nascimentoEdit' ,'generoEdit', 'localidadeEdit', 'contactoEdit', 'addHabilitacoes', 'passwordEdit'];
        edits.forEach( function(element, index) {
            if(element != id)
                $('#'+element).hide();
        });


        $('#'+id).is(':hidden') ? $('#'+id).show() : $('#'+id).hide();
    }

</script>
 