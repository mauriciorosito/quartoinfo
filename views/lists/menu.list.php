<?php
include_once("../parts/header.php");
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

<div class="col-md-12"><h1><center>Listagem de Menus</center></h1><hr></div>
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
        <table class="table table-striped table-condensed table-hover">

            <thead>
                <tr>
                    <td><h5>Localização</h5></td>
                    <td><h5>Título</h5></td>
                    <td><h5>Descrição</h5></td>
                    <td width="15%"><h5> Ações </h5></td>
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
                    . "<a href='menu.list?idMenu=" . $menu->getIdMenu() . "'>" . $menu->getTitle() . "</a>"
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
<script type="text/javascript" charset="utf-8">
</script>

<!-- FIM DO contentE-->
<hr  class="BVerde">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
        <p><b>IFRS - Curso Técnino de Informática para Internet - Câmpus Bento Gonçalves</b></p>
        <p>Avenida Osvaldo Aranha, 540 | Bairro Juventude da Enologia | CEP: 95700-000 | Bento Gonçalves/RS</p>
        <p>E-mail: mauricio.rosito@bento.ifrs.edu.br | Telefone: (54) 3455-3200: Ramal 207 | Fax: (54) 3455-3246</p>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pull-right">
        <a href="#content"><span class="glyphicon glyphicon-arrow-up"></span>Topo</a>
    </div>
</div>
</footer>

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
