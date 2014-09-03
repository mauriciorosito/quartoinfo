<?php
include_once("../parts/header.php");
include_once('../../system/limited.php');
//include_once("../../controllers/submenu.controller.php");
//include_once("../../models/submenu.model.php");
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";

//$limited = new Limited();
//$limited->check(array('A'));
?>

<hr class="BVerde">
<!-- contentE -->
<?php
    //código para inserir e atualizar
?>
<form action="menu.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php
    if (isset($_GET["action"])) {
        echo $_GET["action"];
    }
    ?>">
    <input type="hidden" name="idSubMenu" value="<?php
    if (isset($_GET["idSubMenu"])) {
        echo $_GET["idSubMenu"];
    }
    ?>">

    <table style="width:100%;padding:10px;">
        <tr>
            <td>Título: <input type="text" name="title" class="form-control" value="<?php
                if (isset($submenu) && $submenu->getTitle() != "") {
                    echo $submenu->getTitle();
                }
                ?>"></td>
            <td>Tipo de link: <select name="localization" class="form-control">
                    <option  value="E" <?php
                    if (isset($submenu) && $submenu->getLocalization() == "E") {
                        echo "selected";
                    }
                    ?>> Em cima</option>

                    <option value="L" <?php
                    if (isset($submenu) && $submenu->getLocalization() == "L") {
                        echo "selected";
                    }
                    ?>> Lateral</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Descrição: <input type="text" name="description" class="form-control" value="<?php
                if (isset($menu) && $menu->getDescription() != "") {
                    echo $menu->getDescription();
                }
                ?>"></td>
            <td>Menu Pai: <select name="idMenu" class="form-control">
                    <?php
                    $cM = new ControllerMenu();
                    $menu = new Menu();
                    $menus = $cM->actionControl("selectAll");
                    foreach($menus as $menu){
                        echo "<option value =".$menu->getIdMenu().">".$menu->getTitle()."</option>";
                    }
                    
                    ?>
                    
                </select>
            </td>
        </tr>
        


    </table>
    <br>
    <input type="submit" name="button" value="Cadastrar"><br>
</form>

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


