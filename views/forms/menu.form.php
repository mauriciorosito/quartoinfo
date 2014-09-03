<?php
include_once("../parts/header.php");
include_once('../../system/limited.php');

//$limited = new Limited();
//$limited->check(array('A'));
?>

<hr class="BVerde">
<!-- contentE -->
<?php
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";
if (isset($_POST['action'])) {
    $cM = new ControllerMenu();
    $menu = new Menu();
    if ($_POST['action'] == 'insert') {
        $menu->setDescription($_POST['description']);
        $menu->setLocalization($_POST['localization']);
        $menu->setTitle($_POST['title']);
        $cM->actionControl("insert", $menu);
        header("location: menu.form.php");
    }
    if ($_POST['action'] == 'update') {
        $menu->setIdMenu($_POST['idMenu']);
        $menu->setDescription($_POST['description']);
        $menu->setLocalization($_POST['localization']);
        $menu->setTitle($_POST['title']);
        $cM->actionControl("update", $menu);
         header("location: menu.form.php");
    } else {
        echo "sem ação";
    }
}//else{
//  echo 'Você não pode fazer isso.';
// die;
//}
?>
<form action="menu.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php
if (isset($_GET["action"])) {
    echo $_GET["action"];
}
?>">
    <input type="hidden" name="idMenu" value="<?php
    if (isset($_GET["idMenu"])) {
        echo $_GET["idMenu"];
    }
?>">

    <table style="width:100%;padding:10px;">
        <tr>
            <td>Título: <input type="text" name="title" class="form-control" value="<?php
    if (isset($menu) && $menu->getTitle() != "") {
        echo $menu->getTitle();
    }
?>"></td>
            <td>Localização Menu: <select name="localization" class="form-control">
                    <option  value="E" <?php
                if (isset($menu) && $menu->getLocalization() == "E") {
                    echo "selected";
                }
?>> Em cima</option>

                    <option value="L" <?php
                    if (isset($menu) && $menu->getLocalization() == "L") {
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
?>"><br></td>
        </tr>


    </table>

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

