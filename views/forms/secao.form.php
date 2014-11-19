<?php
include_once("../parts/header.php");
//include_once '../parts/navigation_admin.php'; 
?>

<hr class="BVerde">
<!-- contentE -->
<?php
include_once("../../models/secao.model.php");
include_once("../../controllers/secao.control.php");

require_once('../../system/limited.php');

if (isset($_GET["action"], $_GET["idSecao"])) {
    if ($_GET["action"] == "delete") {
        echo "<script>Alert('Tem certeza que deseja excluir');</script>";
        $secao = new Secao();
        $secao->setIdSecao($_GET["idSecao"]);
        $cu = new ControllerSecao();
        $cu->actionControl($_GET["action"], $secao);
        header("location: ../lists/secao.list.php");
    } else {
        $secao = new Secao();
        $secao->setIdsecao($_GET["idSecao"]);
        $cu = new ControllerSecao();
        $secao = $cu->actionControl("selectOne", $secao);
    }

    if ($_GET["action"] == "update") {
        $secao = new Secao();
        $secao->setIdSecao($_GET["idSecao"]);
		//$secao->setTitulo($_GET["titulo"]);
		//$secao->setAlias($_GET["Alias"]);
		//$secao->setDescrica($_GET["descricao"]);
		
        $cu = new ControllerSecao();
		$secao = $cu->actionControl("selectOne", $secao);

    }
}

if (isset($_POST["action"])) {
    $secao = new Secao();
    $secao->setIdSecao($_POST["idSecao"]);
    $secao->setTitulo($_POST["titulo"]);
    $secao->setAlias($_POST["alias"]);
    $secao->setDescricao($_POST["descricao"]);
    
    $cu = new ControllerSecao();
    $cu->actionControl($_POST["action"], $secao);

    echo "<script>$('#ol-caminho').html('Cadastro Realizado com Sucesso !!!');</script>";
	header('location: ../lists/secao.list.php');
}
?>
<form action="secao.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php
    if (isset($_GET["action"])) {
        echo $_GET["action"];
    }
    ?>">
    <input type="hidden" name="idSecao" value="<?php
    if (isset($_GET["idSecao"])) {
        echo $_GET["idSecao"];
    }
    ?>">
    <input type="hidden" name="canReceiveContent" value="0">
    <table style="width:100%;padding:10px;">
        <tr>
            <td>Titulo: <input type="text" name="titulo" class="form-control" value="<?php
                if (isset($secao) && $secao->getTitulo() != "") {
                    echo $secao->getTitulo();
                }
                ?>" required><br>
			</td>
		</tr>
		<tr>			
            <td>Alias: <input type="text" name="alias" class="form-control" value="<?php
                if (isset($secao) && $secao->getAlias() != "") {
                    echo $secao->getAlias();
                }
                ?>" required><br>
			</td>
        </tr>
        <tr>
            <td colspan=2>Descrição: <textarea name="descricao" value="" class="textarea form-control" placeholder="Enter text ..." style="width: 810px; height: 200px"> <?php
                    if (isset($secao) && $secao->getDescricao() != "") {
                        echo $secao->getDescricao();
                    }
                    ?> </textarea><br></td>
        </tr>

    </table>
    <?php
    if (isset($_GET["action"])) {
        if (ucwords($_GET["action"]) == "Insert") {
            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-ok-circle'></i>&nbsp;Cadastrar</button>";
        } elseif (ucwords($_GET["action"]) == "Update") {
            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-ok-circle'></i>&nbsp;Salvar</button>";
        } else {
            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-trash'></i>&nbsp;Excluir</button>";
        }
    }
    ?>
    <button class="btn btn-default" type="reset" name="reset"><i class="glyphicon glyphicon-repeat"></i>&nbsp;Limpar Campos</button>
    <br>
</form>

<script type="text/javascript">
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>



<!-- FIM DO contentE-->
<hr  class="BVerde">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
        <a href="../../system/logout.php" class="btn"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Sair</a>
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
