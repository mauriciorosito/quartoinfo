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
<table class="table table-striped table-condensed table-hover">
    <thead>
        <tr>
            <td colspan="6" align="center"><h1>Lista de Itens do Menu</h1></td>
        </tr>
        <tr><td><a href="../forms/menu.form.php?action=insert">Criar Novo</a><td></tr>
        <tr>
            <td>Posição</td>
            <td>Título</td>
            <td colspan="2">Descrição</td>
            <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody data-link="row" class="rowlink">
        <?php
        $cM = new ControllerMenu();
        $menus = $cM->actionControl("selectAll");

        foreach ($menus as $menu) {

            echo "<tr>";
            echo "<td>" . $menu->getLocalization() . "</td>";
            echo "<td><a href='menu.list?idMenu=" . $menu->getIdMenu() . "'>" . $menu->getTitle() . "</a></td>";
            echo "<td colspan='2'>" . $menu->getDescription() . "</td>";
            echo "<td colspan='2'><a href='menu.list.php?action=update&idMenu=" . $menu->getIdMenu() . "'>Alterar</a> |
                     <a href='menu.list.php?action=delete&idMenu=" . $menu->getIdMenu() . "'>Remover</a></td>";
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