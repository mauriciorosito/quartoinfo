<?php
include_once "../parts/header.php";
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";
require_once "../../controllers/submenu.control.php";
require_once "../../models/submenu.model.php";

if (isset($_GET['idMenu'])) {
    $idMenu = $_GET['idMenu'];
}
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $cM = new ControllerMenu();

    $menu = new subMenu();
    $menu->setIdSubMenu($_GET['idMenu']);

    $cM->actionControl("delete", $menu);
    header("location: submenu.list.php");
}
?>

<div class="col-md-12"><h1><center>Lista de Itens do Menu</center></h1><hr></div>

<div class="col-md-4"><a class="btn btn-default" href="../forms/submenu.form.php?action=insert">Criar Novo</a></div>

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
<table class="table table-striped table-condensed table-hover">
    <thead>
        <tr>
            <td width="20%">Url</td>
            <td>Título</td>
            <td>Tipo</td>
            <td colspan="2">Descrição</td>
            <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody data-link="row" class="rowlink">
        <?php
        $submenu = new subMenu();
        $submenu->setIdMenu($idMenu);
        $cSM = new ControllerSubMenu();
        $submenus = $cSM->actionControl("selectAllFromMenu", $submenu);

        foreach ($submenus as $submenu) {
            $url = $submenu->getUrl();
            if ($url == "") {
                $url = "- - - - - - - - - - - - - - - - - - - -";
            }
            echo "<tr>";
            echo "<td>" . $url . "</td>";
            echo "<td>" . $submenu->getTitle() . "</td>";
            echo "<td>" . $submenu->getType() . "</a></td>";
            echo "<td colspan='2'>" . $submenu->getDescription() . "</td>";
            echo "<td>"
            . "<div class='btn-group'>"
            . "<a class='btn btn-default' href='submenu.list.php?action=update&idSubMenu=" . $submenu->getIdSubMenu() . "'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a class='btn btn-default' href='submenu.list.php?action=delete&idSubMenu=" . $submenu->getIdSubMenu() . "'><span class='glyphicon glyphicon-trash'></span></a>"
            . "</div></td>";
            
        }
        ?>
    </tbody>
</table>

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
