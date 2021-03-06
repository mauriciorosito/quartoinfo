<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- Login http://www.html5dev.com.br/category/bootstrap/-->
<html lang="en">

    <head>

        <meta charset="utf-8">
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="description" content="">
                        <meta name="author" content="">
                            <link rel="shortcut icon" href="../../publics/imgs/logo.png">

                                <title>Informática</title>


                                <!-- Bootstrap core CSS -->
                                <link href="../../publics/css/bootstrap.css" rel="stylesheet">
                                    <!-- Add custom CSS here -->
                                    <link href="../../publics/css/small-business.css" rel="stylesheet">
                                        <link rel="stylesheet" href="../../publics/css/craftyslide.css" />
                                        <link type="text/css" rel="stylesheet" href="../../publics/css/rhinoslider-1.05.css" />
                                        <link rel="stylesheet" type="text/css" href="../../packages/wysiwyg/src/bootstrap-wysihtml5.css" />
                                        <script src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></script>
                                        <script src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></script>
                                        <script src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></script>
                                        <script src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></script>


                                        <link type="text/css" rel="stylesheet" href="../../publics/css/jasny-bootstrap.min.css" />
                                        <link href="../../publics/css/style.css" rel="stylesheet">

                                            <!-- Add WYSIWYG CSS and JS here -->
                                            <link rel="stylesheet" type="text/css" href="../../packages/wysiwyg/src/bootstrap-wysihtml5.css" />
                                            <!--noscript src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></noscript>
                                            <noscript src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></noscript>
                                            <noscript src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></noscript>
                                            <noscript src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></noscript-->


                                            <noscript src="../../publics/js/jasny-bootstrap.min.js"></noscript>
                                            <script src="../../publics/js/script.js"></script>
                                            
                                            </head>

                                            <body>
                                                <div id="content">
                                                    <div class="container img-rounded BVerde">
                                                        <div class="cinza">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>

        <?php include_once '../parts/navigation_admin.php'; ?>

<?php
include_once("../../utilities/Formatter.class.php");
include_once('../../system/limited.php');

$limited = new Limited();
$limited->check(array('A'));
?>

<hr class="BVerde">
<!-- contentE -->
<?php
include_once("../../controllers/content.control.php");
include_once("../../controllers/media.control.php");

/*echo "<pre>";
print_r($_SESSION);
die;*/

if (isset($_GET["action"], $_GET["idContent"])) {
    if ($_GET["action"] == "delete") {
        $content = new Content();
        $content->setIdContent($_GET["idContent"]);
        $cc = new ControllerContent();
        $cc->actionControl($_GET["action"], $content);
		if ($_GET['tipo'] == 'pagina') {
			header("location: ../lists/content.list.php?tipo=P&msg=Deletada");
		}
		else {
			header("location: ../lists/content.list.php?tipo=C&msg=Deletado");
		  } 
	}
	else {
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
        $content->setSource($content->getSource());
        $content->setText($content->getText());
        $content->setDescription($content->getDescription());
        $content->setExpirationDate($content->getExpirationDate());
        $content->setPostDate($content->getPostDate());
		$content->setPublisher($_SESSION["idUser"]);
        $content->setType($content->getType());
    }
}

if (isset($_POST["action"])) {      
    $content = new Content();
    $content->setIdContent($_POST["idContent"]);
    $content->setTitle($_POST["title"]);
    $content->setSource($_POST["source"]);
    $content->setText($_POST["text"]);
    $content->setDescription($_POST["description"]);
    $content->setExpirationDate($_POST["expirationDate"]);
    $content->setPostDate($_POST["postDate"]);
    $content->setType($_POST["type"]);
	$content->setPublisher($_SESSION["idUser"]);
    $cc = new ControllerContent();
    $cc->actionControl($_POST["action"], $content);

    $cm = new ControllerMedia();
    $ccm = new ControllerContentMedia();

    $maxIdC = $cc->actionControl("selectMaxId");
    $maxIdC = $maxIdC->getIdContent();

    if (!empty($_FILES['image']['name'])) {
        $img = $_FILES['image'];
        $name = explode(".", $img['name']);
        $ext = array_pop($name);
        $name = $name[0];

        echo $_FILES['image']['tmp_name'];

        $image = new Media();
        $image->setName($name);
        $image->setPath("uploads/imgs/" . $img['name']);
        $image->setAttachment(0);
        $image->setType("I");
        $image->setRestrict(0);
        $image->setDescription("DESCRIPTION");
        $cm->actionControl($_POST["action"], $image);

        $maxIdM = $cm->actionControl("selectMaxId");
        $maxIdM = $maxIdM->getIdMedia();

        $contm = new ContentMedia();
        $contm->setIsMain(1);
        $contm->setIdContent($maxIdC);
        $contm->setIdMedia($maxIdM);

        $ccm->actionControl($_POST["action"], $contm);
        move_uploaded_file($img['tmp_name'], "../../uploads/imgs/" . $img['name']);
    }

    if (!empty($_FILES['files']['name'][0])) {
        $aux = 0;
        $tmp = $_FILES['files']['tmp_name'];
        foreach ($_FILES['files'] as $chave => $file) {
            if ($chave == "name") {
                foreach ($file as $f) {
                    $nFile = new Media();
                    $nFile->setName($f);

                    $arq = pathinfo($f);
                    $ext = strtoupper($arq['extension']);
                    $tmp_name = $tmp[$aux];

                    echo $tmp_name;

                    if ($ext == "JPG" || $ext == "PNG" || $ext == "GIF" || $ext == "BMP") {
                        $path = "uploads/imgs/" . $f;
                    } else if ($ext == "TXT" || $ext == "DOC" || $ext == "XLS" || $ext == "PDF" || $ext == "ODT") {
                        $path = "uploads/docs/" . $f;
                    } else if ($ext == "AVI" || $ext == "MPEG" || $ext == "MOV" || $ext == "RMVB" || $ext == "MKV" || $ext == "WMV") {
                        $path = "uploads/videos/" . $f;
                    } else if ($ext == "MP3" || $ext == "WMA" || $ext == "AAC" || $ext == "OGG" || $ext == "AC3" || $ext == "WAV") {
                        $path = "uploads/audios/" . $f;
                    } else {
                        $path = "uploads/others/" . $f;
                    }
                    $nFile->setPath($path);
                    $nFile->setAttachment(0);
                    $nFile->setType("I");
                    $nFile->setRestrict(0);
                    $nFile->setDescription("DESCRIPTION");
                    $cm->actionControl($_POST["action"], $nFile);

                    $maxIdM = $cm->actionControl("selectMaxId");
                    $maxIdM = $maxIdM->getIdMedia();

                    $contm = new ContentMedia();
                    $contm->setIsMain(0);
                    $contm->setIdContent($maxIdC);
                    $contm->setIdMedia($maxIdM);
                    $ccm->actionControl($_POST["action"], $contm);
                    move_uploaded_file($tmp_name, "../../" . $path);
                    $aux++;
                }
            }
        }
    }
	if($_POST["action"] == "update"){
		$tipo = "Atualizad";
	}
	else {
		$tipo = "Inserid";
	}
	if($_POST["type"] == 'P') {
		header("location: ../lists/content.list.php?tipo=P&msg=".$tipo."a");
	}
	else {
		header("location: ../lists/content.list.php?tipo=C&msg=".$tipo."o");
	}
}
?>
<form action="content.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php if (isset($_REQUEST["action"])) {
    echo $_GET["action"];
} ?>">
    <input type="hidden" name="idContent" value="<?php if (isset($_REQUEST["idContent"])) {
    echo $_GET["idContent"];
} ?>">
    <table style="width:100%;padding:10px;">
		<tr>
			<td>Tipo do conteúdo: <select name="type" class="form-control" id="tipo">
                    <option  value="N" <?php if (isset($content) && $content->getType() == "N") {
    echo "selected";
} ?>> Notícia</option>
                    <option value="E" <?php if (isset($content) && $content->getType() == "E") {
    echo "selected";
} ?>> Eventos</option>
                    <option value="O" <?php if (isset($content) && $content->getType() == "O") {
    echo "selected";
} ?>> Oportunidades</option>
<option value="P" <?php if ((isset($content) && $content->getType() == "P") or ($_REQUEST['tipo'] == 'pagina' and $_REQUEST['action'] == 'insert')) {
    echo "selected";
} ?>> Página</option>
                </select>
            </td>
		</tr>
            <td>Título: <input type="text" name="title" class="form-control" value="<?php if (isset($content) && $content->getTitle() != "") {
    echo $content->getTitle();
} ?>"required><br></td>
            <td id="source">Fonte: <input type="text" name="source" class="form-control" value="<?php if (isset($content) && $content->getSource() != "") {
    echo $content->getSource();
} ?>"><br></td>
        </tr>
        <tr>
            <td>Descrição: <input type="text" name="description" class="form-control" value="<?php if (isset($content) && $content->getDescription() != "") {
    echo $content->getDescription();
} ?>"required><br></td>
            
        </tr>
        <tr>
            <td id="data1">Visualizar desde:<input type="date" name="postDate" class="form-control"  value="<?php if (isset($content) && $content->getPostDate() != "") {
    echo ($content->getPostDate());
} ?>"><br></td>
            <td id="data2">Visualizar até: <input type="date" name="expirationDate" class="form-control" value="<?php if (isset($content) && $content->getExpirationDate() != "") {
    echo ($content->getExpirationDate());
} ?>"><br></td>			
        </tr>
        <tr>
            <td colspan=2>Texto: <textarea name="text" value="" class="textarea form-control" placeholder="Enter text ..." style="width: 810px; height: 200px"> <?php if (isset($content) && $content->getText() != "") {
    echo $content->getText();
} ?> </textarea><br></td>
        </tr>
        <tr>
            <td>Imagem principal: <input type="file" name="image" class="form-control"></td>
            <td><p style="float:left;">Outros arquivos: </p><br><br>
                <div style="float:left;margin-top:-18px;">
                    <div id="origem" align="center" style="clear:both;">  
                        <input type="file" name="files[]" class="form-control"  maxlength="14" style="float:left;">
                    </div>
                </div>
                <div style="float:left;width:50px;margin-left:10px;">
                    <span class="glyphicon glyphicon-plus" style="cursor: pointer;float:left;" onclick="duplicarCampos();" ></span>
                    <span class="glyphicon glyphicon-minus" style="cursor: pointer;" onclick="removerCampos(this);" ></span>		
                </div>
                <div id="destino"></div> 
            </td>
        </tr>
    </table>
    <input type="submit" class="btn btn-primary" name="button" value="<?php if (isset($_GET["action"])) {
    echo ucwords($_GET["action"]);
} ?>">
	<a href="../lists/content.list.php?tipo=<?php if (@$_GET["tipo"] == "pagina" or (isset($content) && $content->getType() == "P")) echo "P"; else echo "C"; ?>" class="btn btn-default">Voltar</a>
	<br>
</form>

<script type="text/javascript">
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>

<script type="text/javascript" charset="utf-8">
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
	
	$('#tipo')
		.change(function () {
			tipo = $( "#tipo option:selected" ).text();
			
			if (tipo == ' Página') {
				$('#data1').hide();
				$('#data2').hide();
				$('#source').hide();
			}
			else {
				$('#data1').show();
				$('#data2').show();
				$('#source').show();
			}
		})
	.change();
</script>

<!-- FIM DO contentE-->
<hr  class="BVerde">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
        <a href="../../system/logout.php" class="btn"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Sair</a>
        <p><b>IFRS - Curso Técnico de Informática para Internet - Câmpus Bento Gonçalves</b></p>
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
