<?php
include_once("../../controllers/content.control.php");
$controllerContent = new ControllerContent();
$contents = $controllerContent->actionControl('selectAllEvents');
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
		
		
		<noscript src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></noscript>
		<noscript src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></noscript>
		<noscript src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></noscript>
		<noscript src="../../packages/wysiwyg/lib/js/jasny-bootstrap.min.js"></noscript>
		<noscript src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></noscript>

    </head>

    <body>
        <div id="content">
			<div class="container img-rounded BVerde">
			<a href="../forms/content.form.php?action=insert" class="btn btn-default">Inserir</a> 
					 <table class="table table-striped table-condensed table-bordered table-hover">
					  <thead>
						<tr>
                          <th>#</th>
                          <th>Autor</th>
                          <th>Fonte</th>
                          <th>Título</th>
                          <th>Texto</th>
                          <th>Descrição</th>
                          <th>Data de publicação</th>
                          <th>Data de expiração</th>
                          <th>Tipo</th>
                          <th>Categorias</th>
                          <th>Mídias</th>
						  <th>Ações</th>
                        </tr>
					  </thead>
					  <tbody data-link="row" class="rowlink">
						<?php 
                            foreach($contents as $content)
                            {
                                ?>
                            <tr>
                              <td><a href="#"><?php echo $content->getIdContent(); ?></a></td>
                              <td><?php echo $content->getPublisher(); ?></td>
                              <td><?php echo $content->getSource(); ?></td>
                              <td><?php echo $content->getTitle(); ?></td>
                              <td><?php echo $content->getText(); ?></td>
                              <td><?php echo $content->getDescription(); ?></td>
                              <td><?php echo $content->getPostDate(); ?></th>
                              <td><?php echo $content->getExpirationDate(); ?></td>
                              <td><?php echo $content->getType(); ?></td>
                              <td><?php 
                                foreach($content->get_Category() as $category)
                                {
                                    echo $category->getIdCategory().'<br>'; 
                                }
                              ?></td>
                              <td><?php 
                                foreach($content->get_Medias() as $media)
                                {
                                    if($media->getIsMain()) echo "<b><em>".$media->getIdMedia().'</em></b><br>'; 
                                    else echo $media->getIdMedia().'<br>'; 
                                }
                              ?></td>
							  <td><a href="../forms/content.form.php?action=update&idContent=<?php echo $content->getIdContent();?> " class="btn btn-default">Editar</a> <a href="../forms/content.form.php?action=delete&idContent=<?php echo $content->getIdContent();?>" class="btn btn-default">Excluir</a></td>	
                            <?php
                        }
                            ?>					
							</tr>
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