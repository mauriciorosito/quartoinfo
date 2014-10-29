<?php
include_once("../../controllers/controller.class.php");
include_once("../../controllers/profile.control.php");

$cProfile = new ControllerProfile();
$profiles = $cProfile->actionControl("selectAll");
$pagina = (!isset($_GET['pagina'])) ? 1 : filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT);
$cProfile = new ControllerProfile();
$pag = array();
$pag['pagina'] = $pagina;
$pag['limite'] = 5;
if (isset($_GET['ordenacao'])) {
    $pag['ordenacao'] = $_GET['ordenacao'];
}
$profiles = $cProfile->actionControl("selecionarPaginacao", $pag);
$cont = $cProfile->actionControl("contarPaginas", 5);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
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
                        <a href="../forms/profile.form.php?action=insert" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            &nbsp; Inserir Perfil
                        </a>

                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="profile.list.php?<?php
                            if (isset($_GET['pagina'])) {
                                echo "pagina=" . $_GET['pagina'] . "&";
                            }
                            ?>ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                            <a href="profile.list.php?<?php
                            if (isset($_GET['pagina'])) {
                                echo "pagina=" . $_GET['pagina'] . "&";
                            }
                            ?>ordenacao=desc" class="btn btn-default">Nome - Decrescente</a>
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
                <hr>
                <table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:40px;"><center>#</center></th>
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
                                <a type="button" class="btn btn-default" title='Editar' href="../forms/profile.form.php?action=update&idProfile=<?php echo $profile->getIdProfile(); ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                <a type="button" class="btn btn-default" title='Excluir' href="../forms/profile.form.php?action=delete&idProfile=<?php echo $profile->getIdProfile(); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>
                        </center>
                        </td>
                        </tr>
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
                        echo "pagina=" . $flag . "'><span class='glyphicon glyphicon-chevron-left'></span></a>";
                    } else{
                        $flag = $pagina - 1;
                        echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-left'></span></a>";
                    }
                    echo "<a href='#' class='btn btn-default disabled'>Página " . $pagina . " de " . $cont . "</a>";
                    if ($pagina < $cont) {
                        echo "<a type='button' class='btn btn-default' href='profile.list.php?";
                        if (isset($_GET['ordenacao'])) {
                            echo "ordenacao=" . $_GET['ordenacao'] . "&";
                        }
                        echo "pagina=" . ($pagina + 1) . "'><span class='glyphicon glyphicon-chevron-right'></span></a>";
                    } else{
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