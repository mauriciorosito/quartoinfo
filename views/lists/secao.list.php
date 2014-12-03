<?php
include_once("../../controllers/secao.control.php");
require_once("../../packages/system/functions.model.php");


//$cProfile = new ControllerSecao();

$controllerSecao = new ControllerSecao();

$pagina = (!isset($_GET['pagina'])) ? 1 : filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT);
$pag = array();
$pag['pagina'] = $pagina;
$pag['limite'] = 5;

if (isset($_GET['ordenacao'])) {
    $pag['ordenacao'] = $_GET['ordenacao'];
}
if (isset($_GET['pesquisa'])) {
    $pag['pesquisa'] = $_GET['pesquisa'];
}


$profiles = $controllerSecao->actionControl("selecionarPaginacao", $pag);
$cont = $controllerSecao->actionControl("contarPaginas", 5);
if (isset($_GET['pesquisa'])) {
    $cont = $controllerSecao->actionControl("contarPaginas2", $_GET['pesquisa']);
}
if (!isset($_POST['pesquisa'])){
    $contents = $controllerSecao->actionControl('selectAllDescending');
}
if (isset($_POST["pesquisa"])) {
    $pesquisa = filter_var($_POST["pesquisa"]);
} else {
    $pesquisa = "";
}
/**
if (isset($_GET["ordenacao"])) {
    if ($_GET["ordenacao"] == "desc") {
        $users = $controllerSecao->actionControl("selectAllDescending", $pesquisa);
    } else {
        $users = $controllerSecao->actionControl("selectAllGrowing", $pesquisa);
    }
} else {
    $users = $controllerSecao->actionControl("selectAllGrowing", $pesquisa);
}
**/


if(@$_GET['erro'] == 'Nomeduplicado'){
    echo"<script>alert('Esta seção ja existe !');</script>";
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


        <noscript src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></noscript>
        <noscript src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></noscript>
        <noscript src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></noscript>
        <noscript src="../../packages/wysiwyg/lib/js/jasny-bootstrap.min.js"></noscript>
        <noscript src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></noscript>

    </head>

    <body>

<?php include_once '../parts/navigation_admin.php'; ?>

        <div id="content">
            <div class="container img-rounded BVerde" style="padding-top: 22px;"> 
                
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <a href="../forms/secao.form.php?action=insert" class="btn btn-default">Inserir</a>                     
                </div>    
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="btn-group">
                        <a href="" class="btn btn-success">Ordenar por:</a>
                        <a href="secao.list.php?ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                        <a href="secao.list.php?ordenacao=desc" class="btn btn-default">Nome - Decrescente</a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <form class="form-inline" role="form" method="post" action="secao.list.php">
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

                

                <?php
                if (isset($_POST['page']))
                    $page = $_POST['page'];
                else
                    $page = 1;
                if (isset($_POST["submit"])) {
                    if (isset($_POST["pesquisa"])) {
                        echo '<h1> Pesquisando por:' . $_POST['pesquisa'] . '</h1>';
                        $pesquisa = new functions();

                        $resultados = ($pesquisa->searchAll($_POST["pesquisa"], $page));
                    }
                }
                ?>	
                <table class="table table-striped table-condensed table-bordered table-hover" id="tabela" style="margin-top: 60px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Alias</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody data-link="row" class="rowlink">
                        <?php
                        if (!isset($_POST['pesquisa'])) {
/**
if(@$_GET['ordenacao'] == 'desc' || @$_GET['ordenacao'] == 'asc'){
	$aaa = $users;
}else{
	$aaa = $profiles;
}
foreach ($aaa as $user) {
**/
foreach ($profiles as $user) {
                                ?>
                                <tr>
                                    <td><a href="#"><?php echo $user->getIdSecao(); ?></a></td>
                                    <td><?php echo filter_var($user->getTitulo(), FILTER_SANITIZE_STRING); ?></td>
                                    <td><?php echo filter_var($user->getAlias(), FILTER_SANITIZE_STRING); ?></td>
                       
                                    <td>
                                        <a href="../forms/secao.form.php?action=update&idSecao=<?php echo $user->getIdSecao(); ?> " class="btn btn-default">Editar</a> 
                                        <a onclick="myFunction()"  class="btn btn-default">Excluir</a>
                                    </td>	
<script>
    function myFunction() {
        var x;
        if (confirm("Tem certeza que deseja excluir ?") == true) {
            x = "You pressed OK!";
            location.href="../forms/secao.form.php?action=delete&idSecao=<?php echo $user->getIdSecao(); ?>";
        } else {
            alert("Processo cancelado!");
        }
    }
</script> 
                                   <?php
                                }
                            } else {
                                if (isset($resultados)) {
                                    foreach ($resultados as $resultado) {
                                        ?>
                                    <tr>
                                        <td><?php echo $resultado["idsecao"]; ?></td>
                                        <td><?php echo $resultado["titulo"]; ?></td>
                                        <td><?php echo $resultado["alias"]; ?></td>
                                        <td><a  href="../forms/secao.form.php?action=update&idSecao=<?php echo $resultado["idsecao"]; ?> " class="btn btn-default">Editar</a> <a href="../forms/secao.form.php?action=delete&idSecao=<?php echo $resultado["idSecao"]; ?>" class="btn btn-default">Excluir</a></td>
                                    </tr>
            <?php
        }
    }
}
?>		
                        </tr>
                    </tbody>
                </table>
                
<center>
                    <?php
                    echo "<hr/>";
                    echo "<div class='btn-group'>";
                    if ($pagina > 1) {
                        $flag = $pagina - 1;
                        echo "<a type='button' class='btn btn-default' href='secao.list.php?";
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
                        echo "<a type='button' class='btn btn-default' href='secao.list.php?";
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
                
                
<?php
//if (isset($pesquisa)) {
//    $pesquisa->pagination($pesquisa->total, $page);
//}
?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- JavaScript -->
        <script src="../../publics/js/jquery-1.10.2.js"></script>
        <script src="../../publics/js/bootstrap.js"></script>
        <script src="../../publics/js/craftyslide.js"></script>
        <script src="../../publics/js/script.js"></script>
        <script type="text/javascript" src="../../publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="../../publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="../../publics/js/easing.js"></script>

        <script>
            $(".page").click(function() {
                page = $(this).html();
                $(".page").parent().removeClass("active");
                $(this).parent().addClass("active");
                $.ajax({
                    type: 'post',
                    data: 'page=' + page + '&pesquisa=<?php echo $_POST['pesquisa']; ?>&submit=<?php echo $_POST['submit']; ?>',
                    url: '../parts/content.php',
                    success: function(retorno) {
                        $('#tabela').html(retorno);
                    }
                })
            });
        </script>

    </body>

</html>
