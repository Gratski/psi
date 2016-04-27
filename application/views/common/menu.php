<html>
    <head>
        <title>
            <?php
            if (isset($titulo))
                echo $titulo;
            else
                echo 'Volunteer@FCUL';
            ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/bs/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/style.css'); ?>">
        <meta charset="UTF-8">
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="<?php echo base_url('/css/bs/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/function.js'); ?>"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <a class="navbar-brand page-scroll" href="">Volunteer@FCUL</a>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" align="right">
                            <? echo getSmallPicture($id, $foto); ?>
                            <?php echo $nome; ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('index.php/volunteer/edit/basic'); ?>">Editar Perfil</a></li>
                            <li><a href="<?php echo base_url('index.php/volunteer/edit/schedule'); ?>">Editar Horário</a></li>
                            <li><a href="<?php echo base_url('index.php/volunteer/edit/areas'); ?>">Editar Preferências</a></li>
                            <li><a href="<?php echo base_url('index.php/user/logout'); ?>">Logout (Sair)</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
