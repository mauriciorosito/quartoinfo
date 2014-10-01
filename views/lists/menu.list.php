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

<div class="col-md-12"><h1><center>Lista de Itens do Menu</center></h1><hr></div>

<div class="col-md-4"><a class="btn btn-default" href="../forms/menu.form.php?action=insert">Criar Novo</a></div>

<form class="form-horizontal" onsubmit="return false;">
    <div class="col-md-4">
        <div class="form-group">
            <span>Ordenar por</span>
            <select class="form-control" name="order">
                <option value="localization">Localização</option>
                <option value="a-z">Nome A-Z</option>
                <option value="z-a">Nome Z-A</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
           <label for="filter" class="control-label">Filtrar por:</label>
           <input class="form-control" id="filter" type="text" name="filter">
        </div>
    </div>
</form>
<table class="table table-striped table-condensed table-hover">
    <thead>
        <tr>
            <td><h4>Localização</h4></td>
            <td><h4>Título</h4></td>
            <td><h4>Descrição</h4></td>
            <td></td>
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
            . "<a class='btn btn-default' href='menu.list.php?action=update&idMenu=" . $menu->getIdMenu() . "'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a class='btn btn-default' href='menu.list.php?action=delete&idMenu=" . $menu->getIdMenu() . "'><span class='glyphicon glyphicon-trash'></span></a>"
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
