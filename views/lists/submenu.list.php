<?php
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";
require_once "../../controllers/submenu.control.php";
include_once("../../controllers/content.control.php");
require_once "../../models/submenu.model.php";
require_once "../../models/content.model.php";

if (isset($_GET['idMenu'])) {
    $idMenu = $_GET['idMenu'];
} else {
    header("location: menu.list.php");
}

if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $cM = new ControllerSubMenu();
    $menu = new subMenu();
    $menu->setIdSubMenu($_GET['idSubMenu']);
    $menu->setIdMenu($_GET['idMenu']);
    $idMenu = $_GET['idMenu'];

    $cM->actionControl("delete", $menu);
    header("location: submenu.list.php?idMenu=$idMenu");
}
if (isset($_GET['action']) && $_GET['action'] == "up") {
    $cM = new ControllerSubMenu();
    $submenu = new subMenu();
    $submenu->setIdSubMenu($_GET['idSubMenu']);
    $submenu = $cM->actionControl("selectOne", $submenu);
    $newPos = $submenu->getPosition() - 1;
    $submenu->setPosition($newPos);
    $cM->actionControl("upOneLevel", $submenu);
    header("location: submenu.list.php?idMenu=$idMenu");
}

if (isset($_GET['action']) && $_GET['action'] == "down") {
    $cM = new ControllerSubMenu();
    $submenu = new subMenu();
    $submenu->setIdSubMenu($_GET['idSubMenu']);
    $submenu = $cM->actionControl("selectOne", $submenu);
    $newPos = $submenu->getPosition() + 1;
    $submenu->setPosition($newPos);
    $cM->actionControl("downOneLevel", $submenu);
    header("location: submenu.list.php?idMenu=$idMenu");
}


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

$pag['idMenu'] = $idMenu;

$cM = new ControllerSubMenu();

$submenus = $cM->actionControl("selecionarPaginacao", $pag);

$cont = $cM->actionControl("contarPaginas", $pag);

if (isset($_GET['pesquisa'])) {
    $cont = $cM->actionControl("contarPaginas2", $pag);
}

$fim = $cM->getLastPos($pag);

if (isset($_GET['return']) && $_GET['return'] == "insert"){
    echo "<script type='text/javascript'>";
    echo "alert('Novo Item de Menu Cadastrado');";
    echo "</script>";
}
elseif (isset($_GET['return']) && $_GET['return'] == "update"){
    echo "<script type='text/javascript'>";
    echo "alert('Item de Menu Alterado.');";
    echo "</script>";
}

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
        <div style="margin-left: 5%;">
            <span><a href="menu.list.php">Listagem de Menus</a> -> </span>
            <span>Listagem de Itens do Menu</span>
        </div>
        <div id="content">
            <div class="container img-rounded BVerde">
                <div class="col-md-12"><h2><center>Lista de Itens do Menu</center></h2><hr></div>
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-default" href="../forms/submenu.form.php?action=insert&idMenu=<?php echo $idMenu; ?>">Criar Novo</a></div>



                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <form class="form-inline" role="form" method="get" action="submenu.list.php">
                            <div  style="padding-right: 10px;" class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="pesquisa" placeholder="Digite sua Pesquisa">
                                    <?php
                                    if (isset($_GET['ordenacao'])) {
                                        echo "<input type='hidden' name='ordenacao' value='" . $_GET['ordenacao'] . "'>";
                                    }
                                    if (isset($_GET['pagina'])) {
                                        echo "<input type='hidden' name='pagina' value='" . $_GET['pagina'] . "'>";
                                    }
                                   
                                    ?>
                                     <input type='hidden' name="idMenu" value='<?php echo $idMenu; ?>'>
                                    <span class="input-group-btn">
                                        <button type="submit" name="botao_pesquisa" class="btn btn-success">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
                                    </span>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-condensed table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th width="20%">Redirecionamento</th>
                                    <th>Título</th>
                                    <th>Tipo</th>
                                    <th colspan="2">Descrição</th>
                                    <th width="15%" colspan="2">Ações</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <?php
                                foreach ($submenus as $submenu) {
                                    echo "<tr>";
                                    echo "<td>" . $submenu->getPosition() . " </td>";

                                    echo "<td>";
                                    $url = $submenu->getUrl();
                                    $page = $submenu->getIdPage();
                                    $category = $submenu->getIdCategory();
                                    $type = $submenu->getType();

                                    if ($url != "") {
                                        echo $url;
                                    } elseif ($page > 0) {
                                        $con = new Content();
                                        $con->setIdContent($page);
                                        $cCon = new ControllerContent();
                                        $pagina = $cCon->actionControl("selectOne", $con);
                                        echo $pagina->getTitle();
                                    } elseif ($category > 0) {
                                        //A FAZER
                                        echo $category;
                                    } elseif ($type == "semlink") {
                                        echo " - - - - - - - - - - -";
                                    }

                                    echo "</td>";
                                    echo "<td>" . $submenu->getTitle() . "</td>";
                                    echo "<td>" . $submenu->getType() . "</a></td>";
                                    echo "<td colspan='2'>" . $submenu->getDescription() . "</td>";
                                    echo "<td colspan='2'><div style='font-size:10PX'  class='btn-group'>";
                                    if ($submenu->getPosition() > 1)
                                        echo "<a  title='Subir um Nível' class='btn btn-default' href='submenu.list.php?action=up&idSubMenu=" . $submenu->getIdSubMenu() . "&idMenu=" . $idMenu . "'><span class='glyphicon glyphicon-arrow-up'></span></a>";
                                    if ($submenu->getPosition() < $fim)
                                        echo "<a  title='Descer um Nível' class='btn btn-default' href='submenu.list.php?action=down&idSubMenu=" . $submenu->getIdSubMenu() . "&idMenu=" . $idMenu . "'><span class='glyphicon glyphicon-arrow-down'></span></a>";
                                    echo "<a class='btn btn-default' title='Alterar' href='../forms/submenu.form.php?action=update&idSubMenu=" . $submenu->getIdSubMenu() . "'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    echo "<a  title='Excluir' class='act-excluir btn btn-default' href='submenu.list.php?action=delete&idSubMenu=" . $submenu->getIdSubMenu() . "&idMenu=" . $idMenu . "'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</div></td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                     <?php
                        if (empty($submenus)) {
                            echo "<div class='col-md-12'><div class='alert alert-info' role='alert'>
                                    <strong>Alerta!</strong> Não há nenhum item de menu cadastrado, insira um novo!
                                  </div> </div>";
                        }
                        ?>
                    <center>
                        <?php
                        echo "<hr/>";
                        echo "<div class='btn-group'>";
                        if ($pagina > 1) {
                            $flag = $pagina - 1;
                            echo "<a type='button' class='btn btn-default' href='submenu.list.php?";
                            if (isset($_GET['ordenacao'])) {
                                echo "ordenacao=" . $_GET['ordenacao'] . "&";
                            }
                            if (isset($_GET['pesquisa'])) {
                                echo "pesquisa=" . $_GET['pesquisa'] . "&";
                            }
                            echo "pagina=" . $flag . "&idMenu=".$idMenu."'><span class='glyphicon glyphicon-chevron-left'></span></a>";
                        } else {
                            $flag = $pagina - 1;
                            echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-left'></span></a>";
                        }
                        echo "<a href='#' class='btn btn-default disabled'>Página " . $pagina . " de " . $cont . "</a>";
                        if ($pagina < $cont) {
                            echo "<a type='button' class='btn btn-default' href='submenu.list.php?";
                            if (isset($_GET['ordenacao'])) {
                                echo "ordenacao=" . $_GET['ordenacao'] . "&";
                            }
                            if (isset($_GET['pesquisa'])) {
                                echo "pesquisa=" . $_GET['pesquisa'] . "&";
                            }
                            echo "pagina=" . ($pagina + 1) . "&idMenu=".$idMenu."'><span class='glyphicon glyphicon-chevron-right'></span></a>";
                        } else {
                            $flag = $pagina - 1;
                            echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-right'></span></a>";
                        }
                        echo "</div>";
                        echo "<p>&nbsp;</p>";
                        ?>
                    </center>
                    
                </div>

            </div>
        </div>

        <!-- 
        glyphicon glyphicon-arrow-up
        glyphicon glyphicon-arrow-down
        -->
       
        <script type="text/javascript" charset="utf-8">
        </script>

        <!-- FIM DO contentE-->

        <!-- JavaScript -->


        <script src="../../publics/js/jquery-1.10.2.js"></script>
        <!--script src="../../publics/js/bootstrap.js"></script-->
        <script src="../../publics/js/craftyslide.js"></script>
        <script src="../../publics/js/script.js"></script>
        <script type="text/javascript" src="../../publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="../../publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="../../publics/js/easing.js"></script>
    </body>

</html>
