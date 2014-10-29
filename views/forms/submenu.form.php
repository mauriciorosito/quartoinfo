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
        <div id="content">
            <div class="container img-rounded BVerde">

     

                <div class="col-md-12"><h2><center>Cadastro de Item do Menu</center></h2><hr></div>

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
                                    <option <?php if (isset($submenu) && $submenu->getType() == "semlink") echo "selected"; ?> value="semlink">Sem Link</option>
                                    <option <?php if (isset($submenu) && $submenu->getType() == "category") echo "selected"; ?> value="category">Categoria</option>
                                    <option <?php if (isset($submenu) && $submenu->getType() == "link") echo "selected"; ?> value="link">Link</option>    
                                    <option <?php if (isset($submenu) && $submenu->getType() == "page") echo "selected"; ?> value="page">Página</option>    
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
                            <input class="btn btn-success" type="submit" name="button" style="margin-bottom: 20px" value="Cadastrar">
                        </div>
                    </div> 

                </form>
            </div>
        </div>
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

