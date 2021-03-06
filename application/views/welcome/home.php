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
        <link href="<?php echo base_url('/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url("/css/estilos.css"); ?>" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>

    <body id="page-top" class="index">



        <!-- Header -->
        <header>
            <div class="container">

                <div class="col-md-4 text-left">
                    <div class="intro-text">
                        <div><h1 style="color:#333;">Bem-vindo</h1></div>
                        <div><h2 style="color:#333;">Voluntários@FCUL</h2></div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#loginModal">ENTRAR</button>
                        </div>          
                    </div>
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </header>



        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">LOGIN/REGISTO</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-6">
                            <form action = "index.php/user/login" class="form-signin" method = "POST">
                                <h2 class="form-signin-heading">Iniciar Sessão</h2>
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
                        </div>
                        <div class="col-md-6">
                            <h2 class="form-signin-heading">Registar-se</h2>
                            <div class= "opcoesRegisto">
                                <a href="index.php/signup/institution" class="btn btn-lg btn-primary btn-block">Instituição</a>
                                <a href="index.php/signup/volunteer" class="btn btn-lg btn-primary btn-block">Voluntário</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div> 
            </div>
        </div>


    </body>