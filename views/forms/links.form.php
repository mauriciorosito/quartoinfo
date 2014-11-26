<?php
require_once('../../models/links.model.php');
require_once('../../controllers/links.control.php');

$link = new Links();
$cl = new ControllerLinks();
if(isset($_POST['create'])){
        $erro = null;

                $link->setTitle($_POST['title']);
                $link->setDescription($_POST['description']);
                $link->setUrl($_POST['url']);
                $cl->actionControl('insert', $link);

                header('location:../lists/links.list.php');
}
if(isset($_POST['update'])){
    $link->setTitle($_POST['title']);
    $link->setDescription($_POST['description']);
    $link->setUrl($_POST['url']);
    
    $cl->actionControl('update', $link);
    
    header('location:../lists/links.list.php');
}
if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        $link->setId($id);
        $cl->actionControl('delete', $link);
        header('location:../lists/links.list.php');
    }
    if($_GET['action'] == 'update'){
	$id = $_GET['id'];
        $link->setId($id);
        $dados = $cl->actionControl('selectOne', $link);
        $dados = $dados[0];
    }
}

$requires = array(
    'controllers/links.control.php',
    'models/links.model.php',
    'packages/system/functions.model.php'
);

foreach ($requires as $require) {
    require_once '../../' . $require;
}

$lc = new ControllerLinks();
$links = $lc->actionControl('selectAll', 1);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="publics/imgs/logo.png">

        <title>Links</title>

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
                <br>
                <a href="../lists/links.php" class="btn btn-default">Voltar</a> 
                <form class="navbar-form navbar-right" role="search" action="links.php" method="GET">
                    <div class="form-group" style="margin-left:-15%;">
                        <label for="pesquisar">
                            <div class="input-group">
                                <input name="pesquisa" type="text" class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-1" placeholder="Pesquisar">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" name="search">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </label>
                    </div>
                </form>
                <br><br><br><center><div class="alert alert-danger" style="width: 450px"> Atenção! Todos os campos são obrigatórios! </div></center><br>
                <form enctype="multipart/form-data" action="links.form.php" method="POST">
		<table style="margin:0px auto;width:450px;padding:10px;">
                    <tr>
                        <td>Título</td>
                        <td><input type="text" name="title" class="form-control" required value="<?php if(isset($dados)){ echo $dados['title']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td><input type="text" name="description" class="form-control" required value="<?php if(isset($dados)){ echo $dados['description']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Direção</td>
                        <td><input type="text" name="url" class="form-control" required value="<?php if(isset($dados)){ echo $dados['url']; } ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                                <input type="submit" value="<?php if(isset($dados)){ echo 'Atualizar'; } else{ echo 'Inserir'; } ?>" name="<?php if(isset($dados)){ echo 'update'; } else{ echo 'create'; } ?>" class="form-control">
                        </td>
                    </tr>
		</table>
                    <input type="hidden" name="id" value="<?php if(isset($dados)){ echo $dados['id'];} ?>">
	</form>
            </div>
        </div>
    </body>
</html>
