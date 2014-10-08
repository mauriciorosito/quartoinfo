<?php
include_once('../../system/limited.php');
include_once("../../controllers/submenu.control.php");
include_once("../../controllers/content.control.php");
include_once("../../models/submenu.model.php");
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";
require_once "../../models/content.model.php";

//$limited = new Limited();
//$limited->check(array('A'));
?>


<?php
require_once "../../controllers/submenu.control.php";
require_once "../../models/submenu.model.php";
if (isset($_GET['idMenu'])) {
    $idMenu = $_GET['idMenu'];
}
if (isset($_POST['action'])) {
    $cSm = new ControllerSubMenu();
    $smenu = new subMenu();
    if ($_POST['action'] == 'insert') {
        @$smenu->setDescription($_POST['description']);
        @$smenu->setTitle($_POST['title']);
        @$smenu->setIdMenu($_POST['idMenu']);
        @$smenu->setType($_POST['type']);
        @$smenu->setUrl($_POST['url']);
        @$smenu->setIdCategory($_POST['category']);
        @$smenu->setIdPage($_POST['page']);
        $cSm->actionControl("insert", $smenu);
        header("location: ../lists/submenu.list.php?idMenu=" . $_POST['idMenu']);
    }
    if ($_POST['action'] == 'update') {
        @$smenu->setDescription($_POST['description']);
        @$smenu->setIdMenu($_POST['idMenu']);
        @$smenu->setTitle($_POST['title']);
        @$smenu->setType($_POST['type']);
        @$smenu->setUrl($_POST['url']);
        @$smenu->setIdCategory($_POST['category']);
        @$smenu->setIdPage($_POST['page']);
        @$smenu->setIdSubMenu($_POST['idSubMenu']);
        @$smenu->setPosition($_POST['position']);
        $cSm->actionControl("update", $smenu);
        header("location: ../lists/submenu.list.php?idMenu=" . $_POST['idMenu']);
    } else {
        echo "sem ação";
        die();
    }
}
if (isset($_GET['action']) && isset($_GET['idSubMenu'])) {
    $submenu = new subMenu();
    $submenu->setIdSubMenu($_GET['idSubMenu']);
    $sControll = new ControllerSubMenu();
    $submenu = $sControll->actionControl("selectOne", $submenu);
    $idMenu = $submenu->getIdMenu();
}
include_once("../parts/header.php");
?>
<hr class="BVerde">
<!-- contentE -->

<div class="col-md-12"><h1><center>Cadastro de Item do Menu</center></h1><hr></div>

<form class="form-horizontal" action="submenu.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php echo $_GET['action']; ?>">
    <input type="hidden" name="idSubMenu" value="<?php
    if (isset($_GET["idSubMenu"])) {
        echo $_GET["idSubMenu"];
    }
    ?>">
    <input type="hidden" name="position" value="<?php
    if (isset($submenu) && $submenu->getPosition() != "") {
        echo $submenu->getPosition();
    }
    ?>">
    <div class="col-md-8">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Título</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" placeholder="Max: 30 caractéres." pattern="[a-zA-Z-0-9]{3,30}" value="<?php
                if (isset($submenu) && $submenu->getTitle() != "") {
                    echo $submenu->getTitle();
                }
                ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="type" class="col-sm-2 control-label">Tipo de Item</label>
            <div class="col-sm-10">
                <select id="type" name="type" class="form-control">
                    <option <?php if(isset($submenu) && $submenu->getType() == "semlink") echo "selected"; ?> value="semlink">Sem Link</option>
                    <option <?php if(isset($submenu) && $submenu->getType() == "category") echo "selected"; ?> value="category">Categoria</option>
                    <option <?php if(isset($submenu) && $submenu->getType() == "link") echo "selected"; ?> value="link">Link</option>    
                    <option <?php if(isset($submenu) && $submenu->getType() == "page") echo "selected"; ?> value="page">Página</option>    
                </select>
            </div>
        </div>

        <div id="link_type" style="display: none;" class="form-group" >
            <label for="url"  class="col-sm-2 control-label">URL</label>
            <div class="col-sm-10">
                <input type="text" name="url" id="url" class="form-control" value="<?php
                if (isset($submenu) && $submenu->getUrl() != "") {
                    echo $submenu->getUrl();
                }
                ?>">
            </div>
        </div>
        <div id="category_type"  style="display: none;" class="form-group">
            <label for="category"  class="col-sm-2 control-label">Categoria</label>
            <div class="col-sm-10">
                <select name="idMenu" class="form-control">
                    <option value="0" > - - - - - - - </option>
                    <?php
                    //A FAZER
//                    $cPro = new ControllerProfile();
//                    $lines = $cPro->actionControl("selectAllCategories");
//                    foreach($lines as $categ){
//                        echo "<option value='".$categ->getIdCategory
//                    }
                    ?>

                </select>
            </div>
        </div>
        <div id="page" class="form-group" style="display: none;">
            <label for="page"  class="col-sm-2 control-label">Página</label>
            <div class="col-sm-10">
                <select name="page" class="form-control">
                    <option value="0" > - - - - - - - </option>
                    <?php
                    $cPag = new ControllerContent();
                    $pages = $cPag->actionControl("selectAllPages");
                    foreach ($pages as $page) {
                 
                        if (isset($submenu) && $submenu->getIdPage() == $page->getIdContent()) {
                            echo "<option value='" . $page->getIdContent() . "' selected>" . $page->getTitle() . " </option>";
                        }
                        echo "<option  value='" . $page->getIdContent() . "'>" . $page->getTitle() . " </option>";
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" placeholder="Max: 120 caractéres." pattern="[a-zA-Z-0-9]{3,120}"><?php
                    if (isset($submenu) && $submenu->getDescription() != "") {
                        echo $submenu->getDescription();
                    }
                    ?>
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="idMenu" value="<?php echo $idMenu; ?>">
        </div>
        <div class="col-md-4">
            <input class="btn btn-success" type="submit" name="button" value="Cadastrar">
        </div>
    </div> 

</form>

<script type="text/javascript" charset="utf-8">
</script>

<!-- FIM DO contentE-->
<hr  class="BVerde">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
        <hr><p><b>IFRS - Curso Técnino de Informática para Internet - Câmpus Bento Gonçalves</b></p>
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
<script type="text/javascript" src="../../publics/js/link_category_subMenu.js"></script>
<?php
if (isset($submenu)) {
    /*
     *  $("#category_type").hide();
        $("#link_type").hide();
        $("#page").hide();
     */
    
    if ($submenu->getIdPage() > 0) {
        echo "<script> $('#page').show(); </script>";
    }
    if ($submenu->getIdCategory() > 0) {
        echo "<script> $('#category_type').show(); </script>";
    }
    if ($submenu->getUrl() != "") {
        echo "<script> $('#link_type').show(); </script>";
    }
}
?>
</body>

</html>

