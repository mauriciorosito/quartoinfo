<!-- Cabeçalho -->
<?php
include_once("../parts/header.php");
include_once("../../controllers/profile.control.php");

$controllerProfile = new ControllerProfile();
$categories = $controllerProfile->selectAllCategories();
var_dump($categories);

//        $content = new Content();
//        $content->setIdContent($_GET["idContent"]);
//        $cc = new ControllerContent();
//        $cc->actionControl($_GET["action"], $content);
//        header("location: ../lists/content.list.php");
//
//        $content = new Content();
//        $content->setIdContent($_GET["idContent"]);
//        $cc = new ControllerContent();
//        $content = $cc->actionControl("selectOne", $content);
    
?>
<!-- Fim do cabeçalho -->

<!-- Conteúdo -->
<hr class="BVerde">
<?php
//include_once("../../controllers/profile.control.php");
?>
<form action="profile.form.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <input type="hidden" name="action" value="">
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
            foreach($categories as $category){
                echo "<label>Categorias ".$category['name']."<label>";
                echo "<input type='checkbox' name='view".$category['idCategory']."[]'>Visualizar";
                echo "<input type='checkbox' name='edit".$category['idCategory']."[]'>Editar";
                echo "<input type='checkbox' name='delete".$category['idCategory']."[]'>Excluir";
                
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
