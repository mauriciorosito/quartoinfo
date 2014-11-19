<?php
require_once('../../models/banners.model.php');
require_once('../../controllers/banners.control.php');

$banner = new banners();
$cb = new ControllerBanners();
if(isset($_POST['create'])){
        $erro = null;
        if (isset($_FILES['src']))
        {
                $extensoes = array(".jpg");
                $caminho = "../../publics/imgs/slider/";
                $nome = $_FILES['src']['name'];
                $temp = $_FILES['src']['tmp_name'];
                if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
                        $erro = "Extensão inválida";
                }
                if (!isset($erro)) {
                        $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
                        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                                $erro = "Não foi possível anexar o arquivo";
                }

                $banner->setTitle($_POST['title']);
                $banner->setDescription($_POST['description']);
                $banner->setHref($_POST['href']);
                $banner->setSrc($nomeAleatorio);
                $banner->setAlt($_POST['alt']);
                $banner->setType($_POST['type']);
                $cb->actionControl('insert', $banner);

                header('location:../lists/banners.php?msg=Novo banner ('.$banner->getTitle().') cadastrado!');
        }
}
if(isset($_POST['update'])){
    $erro = null;
        if (isset($_FILES['src']))
        {
                $extensoes = array(".jpg");
                $caminho = "../../publics/imgs/slider/";
                $nome = $_FILES['src']['name'];
                $temp = $_FILES['src']['tmp_name'];
                if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
                        $erro = "Extensão inválida";
                }
                if (!isset($erro)) {
                        $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
                        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                                $erro = "Não foi possível anexar o arquivo";
                }
        }
        if(!isset($nomeAleatorio)){
            $nomeAleatorio = $_POST['src'];
        }
        $banner->setId($_POST['id']);
        $banner->setTitle($_POST['title']);
        $banner->setDescription($_POST['description']);
        $banner->setHref($_POST['href']);
        $banner->setSrc($nomeAleatorio);
        $banner->setAlt($_POST['alt']);
        $banner->setType($_POST['type']);
        
        $cb->actionControl('update', $banner);

        header('location:../lists/banners.php?msg=Item '.$banner->getId().' atualizado!');
}
if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        $banner->setId($id);
        $cb->actionControl('delete', $banner);
        header('location:../lists/banners.php?msg=deletado');
    }
    if($_GET['action'] == 'update'){
	$id = $_GET['id'];
        $banner->setId($id);
        $dados = $cb->actionControl('selectOne', $banner);
        $dados = $dados[0];
    }
}

$requires = array(
    'controllers/banners.control.php',
    'models/banners.model.php',
    'packages/system/functions.model.php'
);

foreach ($requires as $require) {
    require_once '../../' . $require;
}

$bc = new ControllerBanners();
$banners = $bc->actionControl('selectAll', 1);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="publics/imgs/logo.png">

        <title>Banners</title>

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
        <?php
            include_once '../parts/navigation_admin.php';
        ?>
        <div id="content">
            <div class="container img-rounded BVerde">
                <br>
                <a href="../lists/banners.php" class="btn btn-default">Voltar</a> 
                <form class="navbar-form navbar-right" role="search" action="adminBanners.list.php" method="GET">
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
                <form enctype="multipart/form-data" action="banners.form.php" method="POST">
		<table style="margin:0px auto;width:450px;padding:10px;">
                    <tr>
                        <td>Título</td>
                        <td><input type="text" name="title" class="form-control" value="<?php if(isset($dados)){ echo $dados['title']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td><input type="text" name="description" class="form-control" value="<?php if(isset($dados)){ echo $dados['description']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Direção</td>
                        <td><input type="text" name="href" class="form-control" value="<?php if(isset($dados)){ echo $dados['href']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Arquivo</td>
                        <td><input type="file" name="src" class="form-control" value="<?php if(isset($dados)){ echo $dados['src']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Texto Alternativo</td>
                        <td><input type="text" name="alt" class="form-control" value="<?php if(isset($dados)){ echo $dados['alt']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td>
                            <select name="type" class="form-control">
                                <option value="centro"> Banner de destaque </option>
                                <option value="esquerda"> Banner da esquerda </option>
                                <option value="direita"> Banner da direita </option>
                            </select>
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