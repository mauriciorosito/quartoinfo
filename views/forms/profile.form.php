<!-- Cabeçalho -->
<?php
include_once("../parts/header.php");
include_once("../../controllers/profile.control.php");

$controllerProfile = new ControllerProfile();
$categories = $controllerProfile->actionControl('selectAllCategories');

if(isset($_GET['action']) || isset($_POST['action'])){
    if($_POST['action'] == "insert" ){
        $pControl = new ControllerProfile();
        $profile = new models\Profile();
        $profile->setName($_POST['name']);
        $profile->setDescription($_POST['description']);
        $profile->setIs_admin($_POST['id_admin']);
        $pControl->actionControl("update",$profile);
        $views = $_POST['views'];
        $creates = $_POST['create'];
        $edits = $_POST['edit'];
        $deletes = $_POST['delete'];
        foreach($views as $view){
//            if(in_array) VERIFICAR SE ESTÁ EM TODOS OS ARRAY DAEEE CRIA is_admin
        }
    }
} else{
   //header('location:profile.list.php');
}
?> 
<!-- Fim do cabeçalho -->

<!-- Conteúdo -->
<hr class="BVerde">
<form action="profile.form.php" method="post">
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
            <input type="text" name="title" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="exampleInputFile"> Descrição do perfil: </label> 
            <textarea  name="description" class="form-control" rows="3">
            </textarea>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Administrador
            </label>
        </div>
        <input type="submit" class="btn btn-success" name="button" value="Cadastrar">
    </div>
    <div class="col-md-6">
        <?php
        foreach ($categories as $category) {
            echo "<h4>Categoria " . $category['name'] . ":</h4>";
            echo "<div class='checkbox'><input type='checkbox' name='view[]' value='".$category['idCategory']."'>Visualizar</div>";
            echo "<div class='checkbox'><input type='checkbox' name='create[]' value='".$category['idCategory']."'>Criar</div>";
            echo "<div class='checkbox'><input type='checkbox' name='edit[]' value='".$category['idCategory']."'>Editar</div>";
            echo "<div class='checkbox'><input type='checkbox' name='delete[]' value='".$category['idCategory']."'>Excluir</div>";
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
