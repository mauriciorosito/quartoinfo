﻿<?php
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

$pagina = (!isset($_GET['pagina'])) ? 1 : filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT);

$pag = array();
$pag['pagina'] = $pagina;
$pag['limite'] = 5;

$courses= $cCourse->actionControl("selecionarPaginacao", $pag);
$cont = $cCourse->actionControl("contarPaginas", 5);
if (isset($_GET['pesquisa'])) {
    $cont = $cCourse->actionControl("contarPaginas2", $_GET['pesquisa']);
}

if (isset($_POST["pesquisa"])) {
    $pesquisa = filter_var($_POST["pesquisa"]);
} else {
    $pesquisa = "";
}

if (isset($_GET["ordenacao"])) {
    if ($_GET["ordenacao"] == "desc") {
        $courses = $cCourse->actionControl("selectAllDescending", $pesquisa);
    } else {
        $courses = $cCourse->actionControl("selectAllGrowing", $pesquisa);
    }
} else {
    $courses = $cCourse->actionControl("selectAllGrowing", $pesquisa);
}


//$cCourse = new ControllerCourse();
//$courses = $cCourse->actionControl("selectAll");
//$pagina = (!isset($_GET['pagina'])) ? 1 : filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT);
//$cCourse = new ControllerCourse();
//$pag = array();
//$pag['pagina'] = $pagina;
//$pag['limite'] = 5;
//if (isset($_GET['ordenacao'])) {
//    $pag['ordenacao'] = $_GET['ordenacao'];
//}
//$courses = $cCourse->actionControl("selecionarPaginacao", $pag);
//$cont = $cCourse->actionControl("contarPaginas", 5);
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
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <a href="../forms/course.form.php?action=insert" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            &nbsp; Inserir Curso
                        </a> 
                    </div>
                   
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="course.list.php?ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                            <a href="course.list.php?ordenacao=desc" class="btn btn-default">Nome - Decrescente</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <form class="form-inline" role="form" method="post" action="course.list.php">
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
                   <?php
        if (isset($_GET["msg"])) {
            echo $_GET['msg'];
        }
        ?>
                <hr/>
                 <?php if (count($courses) != 0) { ?>
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
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
                               <a href="../forms/course.form.php?action=update&idCourse=<?php echo $course->getIdCourse(); ?> " class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a> 
                                <a href="../../views/forms/course.form.php?action=delete&idCourse=<?php echo $course->getIdCourse(); ?>"class="btn btn-default" title='Excluir'><span class="glyphicon glyphicon-trash"></span></a>

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
                                
<center>
                    <?php
                    echo "<hr/>";
                    echo "<div class='btn-group'>";
                    if ($pagina > 1) {
                        $flag = $pagina - 1;
                        echo "<a type='button' class='btn btn-default' href='profile.list.php?";
                        if (isset($_GET['ordenacao'])) {
                            echo "ordenacao=" . $_GET['ordenacao'] . "&";
                        }
                        if (isset($_GET['pesquisa'])) {
                            echo "pesquisa=" . $_GET['pesquisa'] . "&";
                        }
                        echo "pagina=" . $flag . "'><span class='glyphicon glyphicon-chevron-left'></span></a>";
                    } else {
                        $flag = $pagina - 1;
                        echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-left'></span></a>";
                    }
                    echo "<a href='#' class='btn btn-default disabled'>Página " . $pagina . " de " . $cont . "</a>";
                    if ($pagina < $cont) {
                        echo "<a type='button' class='btn btn-default' href='profile.list.php?";
                        if (isset($_GET['ordenacao'])) {
                            echo "ordenacao=" . $_GET['ordenacao'] . "&";
                        }
                        if (isset($_GET['pesquisa'])) {
                            echo "pesquisa=" . $_GET['pesquisa'] . "&";
                        }
                        echo "pagina=" . ($pagina + 1) . "'><span class='glyphicon glyphicon-chevron-right'></span></a>";
                    } else {
                        $flag = $pagina - 1;
                        echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-right'></span></a>";
                    }
                    echo "</div>";
                    echo "<p>&nbsp;</p>";
                    ?>
                </center>
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