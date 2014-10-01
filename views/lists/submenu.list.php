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
<table class="table table-striped table-condensed table-hover">
    <thead>
        <tr>
            <td colspan="6" align="center"><h1>Lista de Itens do Submenu</h1></td>
        </tr>
        <tr><td><input class="btn btn-default" type="button" name="newMenu" value="Criar Novo"></td></tr>
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
            echo "<td colspan='2'><a href='../forms'>Alterar</a>";
            echo "|";
            echo "<a href='submenu.list.php?action=delete&idSubMenu='" . $submenu->getIdSubMenu() . ">Remover</a></td>";
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
