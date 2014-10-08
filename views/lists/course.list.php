<?php
//include_once("../../controllers/user.control.php");
//include_once("../../controllers/profile.control.php");
include_once("../../models/course.model.php");
include_once("../../controllers/course.control.php");

//$controllerContent = new ControllerContent();
//$contents = $controllerContent->actionControl('selectAllEvents');

require_once('../../system/limited.php');

$limited = new Limited();
$limited->check(array('A'));

$cCourse = new ControllerCourse();

if (isset($_GET["ordenacao"])) {
    if ($_GET["ordenacao"] == "desc") {
        $courses = $cCourse->actionControl("selectAllDescending");
    } else {
        $courses = $cCourse->actionControl("selectAll");
    }
} else {
    $courses = $cCourse->actionControl("selectAll");
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
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="course.list.php?ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                            <a href="course.list.php?ordenacao=desc" class="btn btn-default">Nome - Decrescente</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="btn-group pull-right">
                            <a href="../forms/course.form.php?action=insert" class="btn btn-default">
                                <i class="glyphicon glyphicon-plus-sign"></i>
                                &nbsp; Inserir Curso
                            </a> 
                            <a href="../../system/logout.php" class="btn btn-default">
                                <i class="glyphicon glyphicon-off"></i>
                                &nbsp; Sair
                            </a>
                        </div> 
                    </div>
                </div>
                <hr/>
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                    <th><center>Nome</center></th>
                    <th><center>Descrição</center></th>
                    <th><center>Tipo</center></th>
                    <th><center>Alias</center></th>
                    <th width="20%"><center>Ações</center></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course) {
                            ?>
                            <tr>
                                <td><input type="checkbox" id="marcado<?php echo $course->getIdCourse(); ?>"></td>
                                <td><?php echo $course->getName(); ?></td>
                                <td><?php echo $course->getDescription(); ?></td>
                                <td><?php if ($course->getType() == 'T'){
                                    echo 'Técnico';
                                }
                                if ($course->getType() == 'E'){
                                    echo 'EAD';
                                }if ($course->getType() == 'S'){
                                    echo 'Superior';
                                }
                                ?>
                                </td>
                                 <td><?php echo $course->getAlias(); ?></td>
                                <td>
                        <center>
                            <div class="btn-group">
                               <a href="../forms/course.form.php?action=update&idCourse=<?php echo $course->getIdCourse(); ?> " class="btn btn-default">Editar</a> 
                                <a href="../../views/forms/course.form.php?action=delete&idCourse=<?php echo $course->getIdCourse(); ?>"class="btn btn-default" title='Excluir'><span class="glyphicon glyphicon-trash"></span></a>

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