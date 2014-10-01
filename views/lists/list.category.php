<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- Login http://www.html5dev.com.br/category/bootstrap/-->
<?php


include_once("../../models/category.model.php");
include_once("../../controllers/category.class.php");

$c = new ControllerCategory();
$category = $c->actionControl("selectAll");
?>
<html lang="en">

    <head>
	
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="../../publics/css/style.css" rel="stylesheet">
        <link href="../../publics/css/bootstrap.css" rel="stylesheet">
        <script src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></script>            
        <noscript src="../../publics/js/jasny-bootstrap.min.js"></noscript>
    </head>
    <body>
        <div id="contentEditMenu">
            <h1>Lista de Categorias</h1>
            <table bgcolor="white" class="table table-hover">
                <tr align="center">
                    <td><b>Título</b></td>
                    <td><b>Categoria pai</b></td>
                    <td><b>Remover ou alterar</b></td>
                    <td></td>
                </tr>
				 <?php foreach ($category as $categories) {?>
				  <tr align="center">
                    <td><?php  echo $categories->getName(); ?></td>
                    <td><?php  echo $categories->getType(); ?></td>
                    <td>
						<a href="../../views/forms/content.form.category.php?action=update&idCategory=<?php echo $categories->getIdCategory(); ?>">Alterar</a>
						<a href="../../views/lists/list.category.php?action=delete&idCategory=<?php echo $categories->getIdCategory(); ?>">Remover</a>
				   </td>
                </tr>
				 <?php } ?>
            </table>
			<form class="navbar-form navbar-right" role="search" action="list.category.php" method="post">
                    <div class="form-group" style="margin-left:-1.5%;">
                        <!--<label for="pesquisar">
                           <div class="group">
                             <input name="pesquisa" type="text" id="pesquisar"  class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-1" placeholder="Filtrar por">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" name="submit">
                                    <span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </label>-->
                    </div>
            </form>
			
			<a href="../forms/content.form.category.php?action=insert"><input class="btn btn-default" type="button" name="return" value="Voltar"></a>
        </div>
    </body>
</html>
