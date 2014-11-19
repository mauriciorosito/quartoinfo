<?php
include_once("../../utilities/Formatter.class.php");
include_once("../../controllers/content.control.php");
require_once("../../packages/system/functions.model.php");
$controllerContent = new ControllerContent();
$pagina = (!isset($_GET['pagina'])) ? 1 : filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT);
$pag = array();
$pag['pagina'] = $pagina;
$pag['limite'] = 5;
if (isset($_GET['ordenacao'])) {
    $pag['ordenacao'] = $_GET['ordenacao'];
}

if(!isset($_REQUEST["tipo"])) {
	$_REQUEST["tipo"] = "C";
}

if(!isset($_REQUEST["pesquisa"])) {
	$_REQUEST["pesquisa"] = "";
}

if ($_REQUEST["tipo"] == "P") {
	$contents = $controllerContent->actionControl("selecionarPaginacaoPaginas", $pag);
	$cont = $controllerContent->actionControl("contarPaginasPaginas", 5);
}
Else {
	$contents = $controllerContent->actionControl("selecionarPaginacaoConteudos", $pag);
	$cont = $controllerContent->actionControl("contarPaginasConteudos", 5);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" 'ent="">
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


        <noscript src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></noscript>
        <noscript src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></noscript>
        <noscript src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></noscript>
        <noscript src="../../packages/wysiwyg/lib/js/jasny-bootstrap.min.js"></noscript>
        <noscript src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></noscript>

    </head>

    <body>

        <?php include_once '../parts/navigation_admin.php'; ?>

        <div id="content">
            <div class="container img-rounded BVerde">
                <div class="row standard-margin-10">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <a href="../forms/content.form.php?action=insert&tipo=<?php if($_REQUEST["tipo"] == "C") echo "conteudo"; else echo "pagina"; ?>" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                            &nbsp; Inserir <?php if($_REQUEST["tipo"] == "C") echo "Conteúdo"; else echo "Página"; ?>
                        </a><br><br>
						<span>Listar:</span>
						<br>
						<form id="tipoForm" method="post" action="content.list.php">
							<select class="form-control" id="tipo" name="tipo">
							  <option value="C" <?php if($_REQUEST["tipo"] == "C") echo "selected"; ?>>Conteúdo</option>
							  <option value="P" <?php if($_REQUEST["tipo"] == "P") echo "selected"; ?>>Página</option>
							</select>
							<input type="hidden" name="pesquisa" value=<?php echo '"'.$_REQUEST["pesquisa"].'"'; ?>>
						</form>
                    </div>
					<div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="content.list.php?<?php
                            if (isset($_GET['pagina'])) {
                                echo "pagina=" . $_GET['pagina'] . "&";
                            }
							echo "tipo=" . $_REQUEST['tipo'] . "&";
                            ?>ordenacao=asc" class="btn btn-default">Titulo - Crescente</a>
                            <a href="content.list.php?<?php
                            if (isset($_GET['pagina'])) {
                                echo "pagina=" . $_GET['pagina'] . "&";
                            }
							echo "tipo=" . $_REQUEST['tipo'] . "&";
                            ?>ordenacao=desc" class="btn btn-default">Titulo - Decrescente</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <form class="form-inline" role="form" action="content.list.php" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="pesquisa" type="text" id="pesquisar"  class="form-control " placeholder="Digite sua Pesquisa">
									<input type="hidden" name="tipo" value=<?php echo '"'.$_REQUEST["tipo"].'"'; ?>>
                                    <span class="input-group-btn">
                                        <button type="submit" name="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
					<div class="row standard-margin-10">
						
					</div>
                </div>
				
                <hr/>
                <?php
				if ($_REQUEST["pesquisa"] <> "") {
					echo '<h1> Pesquisando por:' . $_REQUEST['pesquisa'] . '</h1>';
					$pesquisa = new functions();
					
					if ($_REQUEST["tipo"] == "P") {
						$resultados = ($pesquisa->searchAllPages($_REQUEST["pesquisa"], $pagina));
					}
					else {
						$resultados = ($pesquisa->searchAll($_REQUEST["pesquisa"], $pagina));
					}
				}
				if (!empty($resultados) or !empty($contents)) {
                ?>
				
				<?php if ($_REQUEST["tipo"] <> "P") { ?>
				<table class="table table-striped table-condensed table-bordered table-hover" id="tabela">
                    <thead>
                        <tr>
                            <th>Autor</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Data <wbr/> publicação</th>
                            <th>Data <wbr/> expiração</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody data-link="row" class="rowlink">
                        <?php
                        if ($_REQUEST['pesquisa'] == "") {
                            foreach ($contents as $content) {
                                ?>
                                <tr>
                                    <td><?php echo $content->getPublisher(); ?></td>
                                    <td><?php echo $content->getTitle(); ?></td>
                                    <td><?php echo $content->getDescription(); ?></td>
                                    <td><?php echo str_replace("-", "/", $content->getPostDate()); ?></td>
                                    <td><?php echo str_replace("-", "/", $content->getExpirationDate()); ?></td>
                                    <td>
                                        <?php
                                        if ($content->getType() == "E") {
                                            echo "Evento";
                                        } elseif ($content->getType() == "N") {
                                            echo "Notícia";
                                        } elseif ($content->getType() == "O") {
                                            echo "Oportunidade";
                                        } else {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </td>
                                    <td>
                            <center>
                                <div class="btn-group">
                                    <a href="../forms/content.form.php?action=update&idContent=<?php echo $content->getIdContent(); ?> " class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a> 
                                    <a href="../forms/content.form.php?action=delete&idContent=<?php echo $content->getIdContent(); ?>" class="btn btn-default">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                            </center>
                            </td>	
                            <?php
                        }
                    } else {
                        if (isset($resultados)) {
                            foreach ($resultados as $resultado) {
                                ?>
                                <tr>
                                    <td><?php echo $resultado["publisher"]; ?></td>
                                    <td><?php echo $resultado["title"]; ?></td>
                                    <td><?php echo $resultado["description"]; ?></td>
                                    <td><?php echo str_replace("-", "/", $resultado["postDate"]); ?></td>
                                    <td><?php echo str_replace("-", "/", $resultado["expirationDate"]); ?></td>
                                    <td>
                                        <?php
                                        if($resultado["type"] == "E"){
                                            echo "Evento";
                                        } elseif($resultado["type"] == "N"){
                                            echo "Notícia";
                                        } elseif($resultado["type"] == "O"){
                                            echo "Oportunidade";
                                        } else{
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </td>
                                    <td><a href="../forms/content.form.php?action=update&idContent=<?php echo $resultado["idContent"]; ?> " class="btn btn-default">Editar</a> <a href="../forms/content.form.php?action=delete&idContent=<?php echo $resultado["idContent"]; ?>" class="btn btn-default">Excluir</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>		
				<?php } else { ?>
                <table class="table table-striped table-condensed table-bordered table-hover" id="tabela">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody data-link="row" class="rowlink">
                        <?php
                        if ($_REQUEST['pesquisa'] == "") {
                            foreach ($contents as $content) {
                                ?>
                                <tr>
                                    <td><?php echo $content->getTitle(); ?></td>
                                    <td><?php echo $content->getDescription(); ?></td>
                                    <td>
										<center>
											<div class="btn-group">
												<a href="../forms/content.form.php?action=update&idContent=<?php echo $content->getIdContent(); ?> " class="btn btn-default">
													<span class="glyphicon glyphicon-edit"></span>
												</a> 
												<a href="../forms/content.form.php?action=delete&idContent=<?php echo $content->getIdContent(); ?>&tipo=pagina" class="btn btn-default">
													<span class="glyphicon glyphicon-trash"></span>
												</a>
											</div>
										</center>
									</td>	
                            <?php
                        }
                    } else {
						foreach ($resultados as $resultado) {
							?>
							<tr>
								<td><?php echo $resultado["title"]; ?></td>
								<td><?php echo $resultado["description"]; ?></td>
								<td>
									<center>
										<div class="btn-group">
											<a href="../forms/content.form.php?action=update&idContent=<?php echo $resultado["idContent"]; ?> " class="btn btn-default">
												<span class="glyphicon glyphicon-edit"></span>
											</a> 
											<a href="../forms/content.form.php?action=delete&idContent=<?php echo $resultado["idContent"]; ?>&tipo=pagina" class="btn btn-default">
												<span class="glyphicon glyphicon-trash"></span>
											</a>
										</div>
									</center>
								</td>
							</tr>
							<?php
						}
                    }
                    ?>
					<?php } ?>
                    </tbody>
                </table>
				<?php
				}
				if (empty($resultados) and $_REQUEST["pesquisa"] <> "") {
				?>
					<div class="alert alert-danger">
						<center>
							<p class="lead">Sua pesquisa não encontrou nenhum resultado. Por favor, verifique sua pesquisa e tente novamente.</p>
						</center>
					</div>
				<?php
				}
				else {
				
				}
				?>
				<center>
                    <?php
						if ($_REQUEST["pesquisa"] <> "") {
							$cont = ceil($pesquisa->total / $pag['limite']);
						}
						echo "<hr/>";
						echo "<div class='btn-group'>";
						if ($pagina > 1) {
							$flag = $pagina - 1;
							echo "<a type='button' class='btn btn-default' href='content.list.php?";
							if (isset($_GET['ordenacao'])) {
								echo "ordenacao=" . $_GET['ordenacao'] . "&";
							}
							if (isset($_REQUEST['pesquisa'])) {
								echo "pesquisa=" . $_REQUEST['pesquisa'] . "&";
							}
							echo "tipo=".$_REQUEST['tipo']."&pagina=" . $flag . "'><span class='glyphicon glyphicon-chevron-left'></span></a>";
						} else{
							$flag = $pagina - 1;
							echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-left'></span></a>";
						}
						echo "<a href='#' class='btn btn-default disabled'>Página " . $pagina . " de " . $cont . "</a>";
						if ($pagina < $cont) {
							echo "<a type='button' class='btn btn-default' href='content.list.php?";
							if (isset($_GET['ordenacao'])) {
								echo "ordenacao=" . $_GET['ordenacao'] . "&";
							}
							if (isset($_REQUEST['pesquisa'])) {
								echo "pesquisa=" . $_REQUEST['pesquisa'] . "&";
							}
							echo "tipo=".$_REQUEST['tipo']."&pagina=" . ($pagina + 1) . "'><span class='glyphicon glyphicon-chevron-right'></span></a>";
						} else{
							$flag = $pagina - 1;
							echo "<a type='button' disabled class='btn btn-default' href=''><span class='glyphicon glyphicon-chevron-right'></span></a>";
						}
						echo "</div>";
						echo "<p>&nbsp;</p>";
                    ?>
                </center>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- JavaScript -->
        <script src="../../publics/js/jquery-1.10.2.js"></script>
        <script src="../../publics/js/bootstrap.js"></script>
        <script src="../../publics/js/craftyslide.js"></script>
        <script src="../../publics/js/script.js"></script>
        <script type="text/javascript" src="../../publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="../../publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="../../publics/js/easing.js"></script>
		
		<script>
		$(document).ready(function() {
		  $( "#tipo" ).change(function() {
			$( "#tipoForm" ).submit();
		  });
	   });
		</script>
    </body>

</html>
