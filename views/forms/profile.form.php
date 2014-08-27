<!-- Cabeçalho -->
<?php
include_once("../parts/header.php");
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
        <label> Categorias de Visualização: </label>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>
        <br>
        <label> Categorias de Edição: </label>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>
        <br>
        <label> Categorias de Publicação: </label>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>
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
