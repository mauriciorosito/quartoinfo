<?php
include_once("../../controllers/user.control.php");
include_once("../../controllers/profile.control.php");
include_once("../../models/course.model.php");
include_once("../../controllers/course.control.php");

//$controllerContent = new ControllerContent();
//$contents = $controllerContent->actionControl('selectAllEvents');

require_once('../../system/limited.php');

$limited = new Limited();
$limited->check(array('A'));

$cUser = new ControllerUser();
$users = $cUser->actionControl("selectAll");
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
                <a href="../../system/logout.php" class="btn btn-default standard-margin-10">Sair</a> 
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                    <th><center>Nome</center></th>
                    <th><center>Email</center></th>
                    <th><center>Sobre</center></th>
                    <th width="20%"><center>Ações</center></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) {
                            ?>
                            <tr>
                                <td><input type="checkbox" id="marcado<?php echo $user->getIdUser(); ?>"></td>
                                <td><?php echo $user->getName(); ?></td>
                                <td><?php echo $user->getEmail(); ?></td>
                                <td><?php echo $user->getAbout(); ?></td>
                                <td>
                        <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" title='Editar' href="#"><span class="glyphicon glyphicon-edit"></span></button>
                                <a href="../../views/forms/user.form.php?action=delete&idUser=<?php echo $user->getIdUser(); ?>"class="btn btn-default" title='Excluir'><span class="glyphicon glyphicon-trash"></span></a>

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