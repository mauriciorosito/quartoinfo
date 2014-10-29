<?php
include_once("../../controllers/controller.class.php");
include_once("../../controllers/category.control.php");

//$controllerContent = new ControllerContent();
//$contents = $controllerContent->actionControl('selectAllEvents');

$cCategory = new ControllerCategory();

if (isset($_POST["pesquisa"])) {
    $pesquisa = filter_var($_POST["pesquisa"]);
} else {
    $pesquisa = "";
}

if (isset($_GET["ordenacao"])) {
    if ($_GET["ordenacao"] == "desc") {
        $categories = $cCategory->actionControl("selectAllDescending", $pesquisa);
    } else{
        $categories = $cCategory->actionControl("selectAllGrowing", $pesquisa);
    }
} else {
    $categories = $cCategory->actionControl("selectAllGrowing", $pesquisa);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <!--<meta charset="utf-8">-->
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
        <div id="content">
            <div class="container img-rounded BVerde">
			<a href="../forms/content.form.category.php?action=insert" class="btn btn-default standard-margin-10">Inserir Categoria</a>
			<div class="btn-group">
                            <a href="" class="btn btn-success">Ordenar por:</a>
                            <a href="list.category.php?ordenacao=asc" class="btn btn-default">Nome - Crescente</a>
                            <a href="list.category.php?ordenacao=desc" class="btn btn-default">Nome - Decrescente</a> 
							<form class="form-inline" role="form" method="post" action="list.category.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-controlCATEG" type="text" name="pesquisa" placeholder="Digite sua Pesquisa"> 
                                    <span class="input-group-btn"><br>
                                        <button type="submit" class="btn btn-default-CATEG">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button> <br>
                                    </span>
                                </div>
                            </div>
							</form>
                        </form>
                    </div>
                </div>		
                </div>
				<?php if (count($categories) != 0) { ?>
                <table class = "table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                           
                            <th><center>Nome</center></th>
                            <th><center>Categoria pai</center></th>
                            <th width="20%"><center>Ações</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($categories as $category) {
                            ?>
                            <tr>
                        
                                <td><?php echo $category->getName(); ?></td>
                                <td><?php echo $category->getType(); ?></td>
                                <td>
                                    <center>
                                        <div class="btn-group">
                                           <a class="btn btn-default" title='Editar' href="../../views/forms/content.form.category.php?action=update&idCategory=<?php echo $category->getIdCategory(); ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                            <a class="btn btn-default" title='Excluir' href="../../views/forms/content.form.category.php?action=delete&idCategory=<?php echo $category->getIdCategory(); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                        </div>
                                    </center>
                        </td>
                        </tr>
                    <?php } ?>
					<?php } else { ?>
                        <div class="alert alert-danger">
                            <center>
                                <p class="lead">Sua pesquisa não encontrou nenhum resultado. Por favor, verifique sua pesquisa e tente novamente.</p>
                            </center>
                        </div>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- JavaScript -->
        <script src="publics/js/jquery-1.10.2.js"></script>
        <script src="publics/js/bootstrap.js"></script>
        <script src="publics/js/craftyslide.js"></script>
        <script src="publics/js/script.js"></script>
        <script type="text/javascript" src="publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="publics/js/easing.js"></script>

    </body>

</html>