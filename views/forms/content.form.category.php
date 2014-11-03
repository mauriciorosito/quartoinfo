<?php
include_once("../parts/header.php");
include_once('../../system/limited.php');

//$limited = new Limited();
//$limited->check(array('A'));
?>

<hr class="BVerde">
<!-- categoryE -->
<?php
include_once("../../controllers/category.control.php");


if (isset($_GET["action"], $_GET["idCategory"])) {
    if ($_GET["action"] == "delete") {
        $category = new \models\Category();
        $category->setIdCategory($_GET["idCategory"]);
        $cc = new ControllerCategory();
        $cc->actionControl($_GET["action"], $category);
       header("location: ../lists/list.category.php");
    } else {
        $category = new \models\Category();
        $category->setIdCategory($_GET["idCategory"]);
        $cc = new ControllerCategory();
        $category = $cc->actionControl("selectOne", $category);
    }

    if ($_GET["action"] == "update") {
        $category = new \models\Category();
        $category->setIdCategory($_GET["idCategory"]);
        $cc = new ControllerCategory();
        $category = $cc->actionControl("selectOne", $category);
        $category->setName($category->getName());
        $category->setType($category->getType());
    }
}

if (isset($_POST["action"])) {
    $category = new \models\Category();
    $category->setIdCategory($_POST["idCategory"]);
    $category->setName($_POST["name"]);
    $category->setType($_POST["type"]);
    $cc = new ControllerCategory();
    $cc->actionControl($_POST["action"], $category);

   
   
    header("location: ../lists/list.category.php");
}
?>
<form action="content.form.category.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php if (isset($_GET["action"])) {
    echo $_GET["action"];
} ?>">
    <input type="hidden" name="idCategory" value="<?php if (isset($_GET["idCategory"])) {
    echo $_GET["idCategory"];
} ?>">

	<table style="width:30%;padding:10px;">
		<tr>
			<td>Título: <input type="text" required name="name" class="form-control" value="<?php if (isset($category) && $category->getName() != "") {
				echo $category->getName();
				} ?>"><br>
			</td>
		</tr>
		<tr>
			<td>Tipo do conteúdo: <select name="type" class="form-control" id="type">
                    <option  value="Notícia" <?php if (isset($category) && $category->getType() == "Notícia") {
    echo "selected";
} ?>> Notícia</option>
                    <option value="Eventos" <?php if (isset($category) && $category->getType() == "Eventos") {
    echo "selected";
} ?>> Eventos</option>
                    <option value="Extensão" <?php if (isset($category) && $category->getType() == "Extensão") {
    echo "selected";
} ?>> Extensão</option>
<option value="Pesquisa" <?php if (isset($category) && $category->getType() == "Pesquisa") {
    echo "selected";
} ?>> Pesquisa</option>
                </select>
            </td>
		</tr>
	</table>
	<br>
    <input type="submit" name="button" value="<?php if (isset($_GET["action"])) {
    echo ucwords($_GET["action"]);
} ?>"><br>
</form>

<!-- FIM DO categoryE-->
<hr  class="BVerde">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
        <p><b>IFRS - Curso Técnino de Informática para Internet - Câmpus Bento Gonçalves</b></p>
        <p>Avenida Osvaldo Aranha, 540 | Bairro Juventude da Enologia | CEP: 95700-000 | Bento Gonçalves/RS</p>
        <p>E-mail: mauricio.rosito@bento.ifrs.edu.br | Telefone: (54) 3455-3200: Ramal 207 | Fax: (54) 3455-3246</p>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pull-right">
        <a href="#category"><span class="glyphicon glyphicon-arrow-up"></span>Topo</a>
    </div>
</div>
</footer>

</div>
</div>
</div>
</div>
</div>
<!-- /.container -->
</div>
<!-- /#category -->
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
