<?php
include_once("../../controllers/links.control.php");
include_once("../../models/links.model.php");

require_once('../../system/limited.php');

$limited = new Limited();
$limited->check(array('A'));

$cLink = new ControllerLinks();

if (isset($_POST["pesquisa"])) {
    $pesquisa = filter_var($_POST["pesquisa"]);
} else {
    $pesquisa = "";
}

if (isset($_GET["ordenacao"])) {
    if ($_GET["ordenacao"] == "desc") {
        $links = $cLink->actionControl("selectAllDescending", $pesquisa);
    } else {
        $links = $cLink->actionControl("selectAllGrowing", $pesquisa);
    }
} else {
    $links = $cLink->actionControl("selectAllGrowing", $pesquisa);
}
?>
<!DOCTYPE html>
<html lang="en">

    <body>

        <?php include_once '../parts/navigation_admin.php'; ?>

        <div id="content">
            <div class="container img-rounded BVerde">
                <div class="row standard-margin-10">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <a href="../forms/links.form.php?action=insert" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            &nbsp; Inserir Link
                        </a> 
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="links.list.php?ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                            <a href="links.list.php.list.php?ordenacao=desc" class="btn btn-default">Nome - Decrescente</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <form class="form-inline" role="form" method="post" action="links.list.php">
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
                <?php if (count($links) != 0) { ?>
                    <table class = "table table-striped table-condensed table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><center>Título</center></th>
                        <th><center>Descrição</center></th>
                        <th><center>Direção</center></th>
                        <th width = "20%"><center>Legenda</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($links as $link) {
                                ?>
                                <tr>
                                    <td><?php echo $link->getTitle(); ?></td>
                                    <td><?php echo $link->getDescription(); ?></td>
                                    <td><?php echo $link->getUrl(); ?></td>
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

    </body>

</html>

