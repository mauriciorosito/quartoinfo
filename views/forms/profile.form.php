<!-- Cabeçalho -->
<?php
include_once("../parts/header.php");
include_once("../../controllers/profile.control.php");

$controllerProfile = new ControllerProfile();
$categories = $controllerProfile->actionControl('selectAllCategories');

if (isset($_POST['action'])) {
    if ($_POST['action'] == "insert") {
        $pControl = new ControllerProfile();
        $profile = new models\Profile();
        $profile->setName($_POST['title']);
        $profile->setDescription($_POST['description']);
        $is_admin = 0;
        if (isset($_POST['is_admin'])) {
            $is_admin = 1;
        }
        $profile->setIs_admin($is_admin);
        $pControl->actionControl("insert", $profile);
        $id = $pControl->actionControl("selectMaxId");
        $creates = array();
        $views = array();
        $deletes = array();
        $edits = array();
        if (isset($_POST['view'])) {
            $views = $_POST['view'];
        }
        if (isset($_POST['create'])) {
            $creates = $_POST['create'];
        }
        if (isset($_POST['edit'])) {
            $edits = $_POST['edit'];
        }
        if (isset($_POST['delete'])) {
            $deletes = $_POST['delete'];
        }
        if (!$is_admin == true) {
            foreach ($views as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($id);
                $profilec->setIdCategory($view);
                $profilec->setPermType("V");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
            foreach ($creates as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($id);
                $profilec->setIdCategory($view);
                $profilec->setPermType("C");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
            foreach ($edits as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($id);
                $profilec->setIdCategory($view);
                $profilec->setPermType("E");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
            foreach ($deletes as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($id);
                $profilec->setIdCategory($view);
                $profilec->setPermType("D");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
        }
    } else if ($_POST['action'] == "update") {
        $pControl = new ControllerProfile();
        $profile = new models\Profile();
        $profile->setName($_POST['title']);
        $profile->setDescription($_POST['description']);
        $is_admin = 0;
        if (isset($_POST['is_admin'])) {
            $is_admin = 1;
        }
        $profile->setIs_admin($is_admin);
        $profile->setIdProfile($_POST['idProfile']);
        $pControl->actionControl("update", $profile);

        $creates = array();
        $views = array();
        $deletes = array();
        $edits = array();
        if (isset($_POST['view'])) {
            $views = $_POST['view'];
        }
        if (isset($_POST['create'])) {
            $creates = $_POST['create'];
        }
        if (isset($_POST['edit'])) {
            $edits = $_POST['edit'];
        }
        if (isset($_POST['delete'])) {
            $deletes = $_POST['delete'];
        }
        if (!$is_admin == true) {
            foreach ($views as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($_POST['idProfile']);
                $profilec->setIdCategory($view);
                $profilec->setPermType("V");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
            foreach ($creates as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($_POST['idProfile']);
                $profilec->setIdCategory($view);
                $profilec->setPermType("C");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
            foreach ($edits as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($_POST['idProfile']);
                $profilec->setIdCategory($view);
                $profilec->setPermType("E");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
            foreach ($deletes as $view) {
                $profilec = new ProfileCategory();
                $profilec->setIdProfile($_POST['idProfile']);
                $profilec->setIdCategory($view);
                $profilec->setPermType("D");
                $pControl->actionControl("insertProfileCategory", $profilec);
            }
        }
    } else if ($_POST['action'] == "delete") {
        $pControl = new ControllerProfile();
        $profile = new models\Profile();
        $profile->setIdProfile($_POST['idProfile']);
        $pControl->actionControl("delete", $profile);
    }
    header('location:../lists/profile.list.php');
} else if ($_GET['action'] == "delete") {
    $pControl = new ControllerProfile();
    $profile = new models\Profile();
    $profile->setIdProfile($_GET['idProfile']);
    $pControl->actionControl("delete", $profile);
    header('location:../lists/profile.list.php');
} else if ($_GET['action'] == "update" && isset($_GET['idProfile'])) {
    $profile = new \models\Profile();
    $profile->setIdProfile($_GET['idProfile']);
    $pControl = new ControllerProfile();
    $profile = $pControl->actionControl("selectOne", $profile);
    $pcategories = array();
    foreach ($profile->get_Categories() as $cat) {
        $pcategories['id'][] = $cat->getIdCategory();
        $pcategories['type'][] = $cat->getType();
    }
} else if (!isset($_GET['action'])) {
    header('location:profile.form.php?action=insert');
}
?> 
<!-- Fim do cabeçalho -->

<!-- Conteúdo -->
<hr class="BVerde">
<form action="profile.form.php" method="post" name="form" onSubmit="return validaCheckboxes();">
    <div class="col-md-6">
        <input type="hidden" name="action" value="<?php
        if (isset($_GET["action"])) {
            echo $_GET["action"];
        }
        ?>">
        <input type="hidden" name="idProfile" value="<?php
        if (isset($_GET["idProfile"])) {
            echo $_GET["idProfile"];
        }
        ?>">
        <div class="form-group">
            <label for="exampleInputFile">Nome do perfil: </label> 
            <input type="text" name="title" required class="form-control" value="<?php if (isset($profile)) echo $profile->getName(); ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputFile"> Descrição do perfil: </label> 
            <textarea  name="description" required class="form-control" rows="3"><?php if (isset($profile)) echo $profile->getDescription(); ?></textarea>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_admin"  <?php if (isset($profile) && $profile->getIs_admin() == 1) echo "checked" ?> value="1"> Administrador
            </label>
        </div>
        <input type="submit" class="btn btn-success" name="button" <?php
        if (isset($_GET['action']) && $_GET['action'] == "update") {
            echo "value='Atualizar'";
        } else {
            echo "value='Cadastrar'";
        }
        ?>>
    </div>
    <div class="col-md-6">
        <?php
        $x = 0;
        foreach ($categories as $category) {
            echo "<h4>Categoria " . $category['name'] . ":</h4>";
            $v = "";
            $e = "";
            $c = "";
            $d = "";
            if(isset($pcategories['id'][0])){
            $types = array_keys($pcategories['id'], $category['idCategory']);
            } else{
                $types = array();
            }
            foreach ($types as $type) {
                if ($pcategories['type'][$type] == "V") {
                    $v = "checked";
                }
                if ($pcategories['type'][$type] == "C") {
                    $c = "checked";
                }
                if ($pcategories['type'][$type] == "D") {
                    $d = "checked";
                }
                if ($pcategories['type'][$type] == "E") {
                    $e = "checked";
                }
            }
            echo "<div class='checkbox'><input type='checkbox' name='view[]' " . $v . " value='" . $category['idCategory'] . "'>Visualizar</div>";
            echo "<div class='checkbox'><input type='checkbox' name='create[]' " . $c . " value='" . $category['idCategory'] . "'>Criar</div>";
            echo "<div class='checkbox'><input type='checkbox' name='edit[]' " . $e . " value='" . $category['idCategory'] . "'>Editar</div>";
            echo "<div class='checkbox'><input type='checkbox' name='delete[]' " . $d . " value='" . $category['idCategory'] . "'>Excluir</div>";
        }
        ?>

    </div>
</form>
<!-- Fim do conteúdo-->

<!-- Rodapé-->
</body>
<?php
include_once("../parts/footer.php");
?>
<!-- Fim do rodapé -->

</html>
