﻿<?php
include_once("../../controllers/controller.class.php");
include_once("../../controllers/profile.control.php");

//$controllerContent = new ControllerContent();
//$contents = $controllerContent->actionControl('selectAllEvents');

$cProfile = new ControllerProfile();
$profiles = $cProfile->actionControl("selectAll");
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <!--<meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="publics/imgs/logo.png">

        <title>Informática</title>

        <!-- Bootstrap core CSS -->
        <link href="../../publics/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../../publics/css/small-business.css" rel="stylesheet">
        <link rel="stylesheet" href="../../publics/css/craftyslide.css" />
        <link type="text/css" rel="stylesheet" href="../../publics/css/rhinoslider-1.05.css" />
        <link rel="stylesheet" type="text/css" href="../../packages/wysiwyg/src/bootstrap-wysihtml5.css" />
        <link type="text/css" rel="stylesheet" href="../../packages/wysiwyg/lib/css/jasny-bootstrap.min.css" />	


        <script src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></script>
        <script src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></script>
        <script src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></script>
        <script src="../../packages/wysiwyg/lib/js/jasny-bootstrap.min.js"></script>
        <script src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></script>

    </head>

    <body>
        <div id="content">
            <div class="container img-rounded BVerde">
                <a href="#" class="btn btn-default standard-margin-10">Inserir Usuário</a> 
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>Nome</center></th>
                            <th><center>Descrição</center></th>
                            <th width="20%"><center>Ações</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($profiles as $profile) {
                            ?>
                            <tr>
                                <td><input type="checkbox" id="marcado<?php echo $profile->getIdProfile(); ?>"></td>
                                <td><?php echo $profile->getName(); ?></td>
                                <td><?php echo $profile->getDescription(); ?></td>
                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" title='Editar' href="#"><span class="glyphicon glyphicon-edit"></span></button>
                                            <button type="button" class="btn btn-default" title='Excluir' href="#"><span class="glyphicon glyphicon-trash"></span></button>
                                        </div>
                                    </center>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- JavaScript -->
        <script src="publics/js/jquery-1.10.2.js"></script>
        <script src="publics/js/bootstrap.js"></script>
        <script src="publics/js/craftyslide.js"></script>
        <script src="publics/js/script.js"></script>
        <script type="text/javascript" src="publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="publics/js/easing.js"></script>

    </body>

</html>