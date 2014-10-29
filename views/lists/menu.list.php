<?php
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";

if (isset($_GET['action']) && $_GET['action'] == "delete" && isset($_GET['idMenu'])) {
    $cM = new ControllerMenu();

    $menu = new Menu();
    $menu->setIdMenu($_GET['idMenu']);

    $cM->actionControl("delete", $menu);
    header("location: menu.list.php");
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
            <span>Listagem de Menus</span>
        </div>
        <div id="content">
            <div class="container img-rounded BVerde">
                <div class="col-md-12"><h2><center>Listagem de Menus</center></h2><hr></div>
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-default" href="../forms/menu.form.php?action=insert">Criar Novo</a></div>

                    <form class="form-horizontal" onsubmit="return false;">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="order" class="col-sm-4 control-label">Ordenar por</label>
                                <div class="col-sm-8">
                                    <select id="order" class="form-control" name="order">
                                        <option value="localization">Localização</option>
                                        <option value="a-z">Nome A-Z</option>
                                        <option value="z-a">Nome Z-A</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter" class="col-sm-4 control-label">Filtrar por:</label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="filter" type="text" name="filter">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <br/>
                    <br/>
                    <div class="col-md-12">
                        <table class="table table-striped table-condensed table-hover table-bordered">

                            <thead>
                                <tr>
                                    <th>Localização</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th width="15%"> Ações </th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <?php
                                $cM = new ControllerMenu();
                                $menus = $cM->actionControl("selectAll");

                                foreach ($menus as $menu) {
                                    echo "<tr>";
                                    switch ($menu->getLocalization()) {
                                        case "E":
                                            echo "<td>Acima</td>";
                                            break;
                                        case "L";
                                            echo "<td>Lateral</td>";
                                            break;
                                    }
                                    echo "<td>"
                                    . "<a href='submenu.list.php?idMenu=" . $menu->getIdMenu() . "'>" . $menu->getTitle() . "</a>"
                                    . "</td>";
                                    echo "<td>" . $menu->getDescription() . "</td>";
                                    echo "<td>"
                                    . "<div class='btn-group'>"
                                    . "<a class='btn btn-default' title='Editar Menu' href='../forms/menu.form.php?action=update&idMenu=" . $menu->getIdMenu() . "'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a class='btn btn-default act-excluir'  title='Excluir Menu' href='menu.list.php?action=delete&idMenu=" . $menu->getIdMenu() . "'><span class='glyphicon glyphicon-trash'></span></a>"
                                    . "<a title='Gerenciar Submenus' class='btn btn-default' href='submenu.list.php?idMenu=" . $menu->getIdMenu() . "'><span class='glyphicon glyphicon-folder-open'></span></a>"
                                    . "</div></td>";
                                }
                                ?>
                                <!--glyphicon glyphicon-folder-open-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div></div>
        <script type="text/javascript" charset="utf-8">
        </script>


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
