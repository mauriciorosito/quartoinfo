﻿<?php
include_once('../../system/limited.php');

//$limited = new Limited();
//$limited->check(array('A'));
?>

<hr class="BVerde">
<!-- contentE -->
<?php
require_once "../../controllers/menu.control.php";
require_once "../../models/menu.model.php";
<<<<<<< HEAD

if (isset($_POST['action'])) {
    $cM = new ControllerMenu();
    $menu = new Menu();
    if ($_POST['action'] == 'insert') {
        $menu->setDescription($_POST['description']);
        $menu->setLocalization($_POST['localization']);
        $menu->setTitle($_POST['title']);
        $cM->actionControl("insert", $menu);
        
        header("location: ../lists/menu.list.php?return=insert");
    }
    if ($_POST['action'] == 'update') {
        $menu->setIdMenu($_POST['idMenu']);
        $menu->setDescription($_POST['description']);
        $menu->setLocalization($_POST['localization']);
        $menu->setTitle($_POST['title']);
        $cM->actionControl("update", $menu);
        header("location: ../lists/menu.list.php?return=update");
    } else {
        echo "sem ação";
    }
}if (isset($_GET['action']) && $_GET['action'] == "update") {

    $men = new Menu();
    $men->setIdMenu($_GET['idMenu']);
    $cM = new ControllerMenu();
    $menu = $cM->actionControl("selectOne", $men);
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
            <div style="margin-left: 5%;">
                <span><a href="../lists/menu.list.php">Listagem de Menus</a> -> </span>
                <span>Criar / Editar Menu</span>
            </div>
            <div class="col-md-12"><h2><center>Cadastro de Menus</center></h2><hr></div>
            <div class="container img-rounded BVerde">
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

                    <div class="col-md-6">
                        <label> Título: </label> <input type="text" name="title" class="form-control" placeholder="Max: 30 caractéres." pattern="[a-zA-Z-0-9]+{3,30}" value="<?php
                        if (isset($menu) && $menu->getTitle() != "") {
                            echo $menu->getTitle();
                        }
                        ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Localização Menu:</label> <select name="localization" class="form-control">
                            <option  value="E" <?php
                            if (isset($menu) && $menu->getLocalization() == "E") {
                                echo "selected";
                            }
                            ?>> Superior</option>

                            <option value="L" <?php
                            if (isset($menu) && $menu->getLocalization() == "L") {
                                echo "selected";
                            }
                            ?>> Lateral</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <br>
=======
if (isset($_POST['action'])) {
    $cM = new ControllerMenu();
    $menu = new Menu();
    if ($_POST['action'] == 'insert') {
        $menu->setDescription($_POST['description']);
        $menu->setLocalization($_POST['localization']);
        $menu->setTitle($_POST['title']);
        $cM->actionControl("insert", $menu);
        header("location: ../lists/menu.list.php");
    }
    if ($_POST['action'] == 'update') {
        $menu->setIdMenu($_POST['idMenu']);
        $menu->setDescription($_POST['description']);
        $menu->setLocalization($_POST['localization']);
        $menu->setTitle($_POST['title']);
        $cM->actionControl("update", $menu);
        header("location: ../lists/menu.list.php");
    } else {
        echo "sem ação";
    }
}if (isset($_GET['action']) && $_GET['action'] == "update") {

    $men = new Menu();
    $men->setIdMenu($_GET['idMenu']);
    $cM = new ControllerMenu();
    $menu = $cM->actionControl("selectOne", $men);
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
            <div class="col-md-12"><h2><center>Cadastro de Menus</center></h2><hr></div>
            <div class="container img-rounded BVerde">
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

                    <div class="col-md-6">
                        <label> Título: </label> <input type="text" name="title" class="form-control" placeholder="Max: 30 caractéres." pattern="[a-zA-Z-0-9]+{3,30}" value="<?php
                        if (isset($menu) && $menu->getTitle() != "") {
                            echo $menu->getTitle();
                        }
                        ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Localização Menu:</label> <select name="localization" class="form-control">
                            <option  value="E" <?php
                            if (isset($menu) && $menu->getLocalization() == "E") {
                                echo "selected";
                            }
                            ?>> Superior</option>

                            <option value="L" <?php
                            if (isset($menu) && $menu->getLocalization() == "L") {
                                echo "selected";
                            }
                            ?>> Lateral</option>
                        </select>
                    </div>

                    <div class="col-md-12">
>>>>>>> origin/master
                        <label>Descrição:</label> <textarea name="description" class="form-control" placeholder="Max: 120 caractéres" pattern="[a-zA-Z-0-9]+{3,120}"> <?php
                            if (isset($menu) && $menu->getDescription() != "") {
                                echo $menu->getDescription();
                            }
                            ?></textarea><br/>
                    </div>


                    <input type="submit" name="button" class="btn btn-success" value="Cadastrar"><br>
                </form>
            </div></div>
        <script type="text/javascript" charset="utf-8">
        </script>


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

