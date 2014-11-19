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

if (isset($_POST["pesquisa"])) {
    $pesquisa = filter_var($_POST["pesquisa"]);
} else {
    $pesquisa = "";
}

if (isset($_GET["ordenacao"])) {
    if ($_GET["ordenacao"] == "desc") {
        $users = $cUser->actionControl("selectAllDescending", $pesquisa);
    } else {
        $users = $cUser->actionControl("selectAllGrowing", $pesquisa);
    }
} else {
    $users = $cUser->actionControl("selectAllGrowing", $pesquisa);
}
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

        <?php include_once '../parts/navigation_admin.php'; ?>

        <div id="content">
            <div class="container img-rounded BVerde">
                <div class="row standard-margin-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-info" id="div-msg" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <a href="../forms/user.form.php?action=insert" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            &nbsp; Inserir Usuário
                        </a> 
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="user.list.php?ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                            <a href="user.list.php?ordenacao=desc" class="btn btn-default">Nome - Decrescente</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <form class="form-inline" role="form" method="post" action="user.list.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pesquisa" placeholder="Digite sua Pesquisa">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr/>
                <?php if (count($users) != 0) { ?>
                    <table class = "table table-striped table-condensed table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><center>Matrícula</center></th>
                        <th><center>Nome</center></th>
                        <th><center>Email</center></th>
                        <th><center>Curso</center></th>
                        <th width = "20%"><center>Ações</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user->getRegistration(); ?></td>
                                    <td><?php echo $user->getName(); ?></td>
                                    <td><?php echo $user->getEmail(); ?></td>
                                    <td><?php echo $user->getCourseName(); ?></td>
                                    <td>
                            <center>
                                <div class="btn-group">
                                    <a class="btn btn-default" title='Editar' href="../../views/forms/user.form.php?action=update&idUser=<?php echo $user->getIdUser(); ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="../../views/forms/user.form.php?action=delete&idUser=<?php echo $user->getIdUser(); ?>"class="btn btn-default" title='Excluir'><span class="glyphicon glyphicon-trash"></span></a>

                                </div>
                            </center>
                            </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="alert alert-danger">
                            <center>
                                <p class="lead">Sua pesquisa não encontrou nenhum resultado. Por favor, verifique sua pesquisa e tente novamente.</p>
                            </center>
                        </div>
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

        <?php
        if (isset($_GET["msg"])) {
            echo "<script>"
            . "$('#div-msg').show();"
            . "$('#div-msg').append('" . $_GET["msg"] . "');"
            . "</script>";
        }
        ?>

    </body>

</html>