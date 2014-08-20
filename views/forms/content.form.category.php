<?php
include_once("../parts/header.php");
include_once('../../system/limited.php');

$limited = new Limited();
$limited->check(array('A'));
?>

<hr class="BVerde">
<!-- contentE -->
<?php
include_once("../../controllers/controleCategoria.php");


if (isset($_GET["action"], $_GET["idContent"])) {
    if ($_GET["action"] == "delete") {
        $content = new Content();
        $content->setIdContent($_GET["idContent"]);
        $cc = new ControllerContent();
        $cc->actionControl($_GET["action"], $content);
        header("location: ../lists/content.list.php");
    } else {
        $content = new Content();
        $content->setIdContent($_GET["idContent"]);
        $cc = new ControllerContent();
        $content = $cc->actionControl("selectOne", $content);
    }

    if ($_GET["action"] == "update") {
        $content = new Content();
        $content->setIdContent($_GET["idContent"]);
        $cc = new ControllerContent();
        $content = $cc->actionControl("selectOne", $content);
        $content->setTitle($content->getTitle());
        $content->setText($content->getText());
        $content->setCategory($content->getCategory());
    }
}

if (isset($_POST["action"])) {
    $content = new Content();
    $content->setIdContent($_POST["idContent"]);
    $content->setTitle($_POST["title"]);
    $content->setText($_POST["text"]);
    $content->setCategory($_POST["category"]);
    $cc = new ControllerContent();
    $cc->actionControl($_POST["action"], $content);

    $maxIdC = $cc->actionControl("selectMaxId");
    $maxIdC = $maxIdC->getIdContent();
    
    header("location: ../lists/content.list.php");
}
?>
<form action="content.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php if (isset($_GET["action"])) {
    echo $_GET["action"];
} ?>">
    <input type="hidden" name="idContent" value="<?php if (isset($_GET["idContent"])) {
    echo $_GET["idContent"];
} ?>">

	<table style="width:60%;padding:10px;">
		<tr>
			<td>Título: <input type="text" name="title" class="form-control" value="<?php if (isset($content) && $content->getTitle() != "") {
				echo $content->getTitle();
				} ?>"><br>
			</td>
		</tr>
		<tr>
			<td colspan=2>Descrição: 
				<textarea name="text" value="" class="textarea form-control" placeholder="Enter text ..." style="width: 810px; height: 200px"> 
				<?php if (isset($content) && $content->getText() != "") {
					echo $content->getText();
				} ?> 
				</textarea><br>
			</td>
		</tr>
		<tr>
			<td> Categoria pai: <br>
				<select>
					<option>Extensão</option>
					<option>Pesquisa</option>
				</select>
			</td>
		</tr>
	</table>
	<br>
    <input type="submit" name="button" value="<?php if (isset($_GET["action"])) {
    echo ucwords($_GET["action"]);
} ?>"><br>
</form>

<script type="text/javascript" charset="utf-8">
    $('.textarea').wysihtml5();

    $(prettyPrint);

    function duplicarCampos() {
        var clone = document.getElementById('origem').cloneNode(true);
        var destino = document.getElementById('destino');
        destino.appendChild(clone);

        var camposClonados = clone.getElementsByTagName('input');

        for (i = 0; i < camposClonados.length; i++) {
            camposClonados[i].value = '';
        }
    }

    function removerCampos(id) {
        var node1 = document.getElementById('destino');
        node1.removeChild(node1.childNodes[0]);
    }
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

</div>
</div>
</div>
</div>
</div>
<!-- /.container -->
</div>
<!-- /#content -->
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
