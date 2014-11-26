<?php
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
                <?php
                    if(isset($_GET['msg'])){
                        echo '<div class="alert alert-success col-md-5" role="alert">'.$_GET['msg'].'</div><br><br><br>';
                    }
                ?>
                <br>
                <?php if(isset($_GET['search'])){
                    
                    require_once '../../controllers/banners.control.php';
                    $bc = new ControllerBanners();
                    $banners = $bc->search($_GET['search']);
                    echo '<div class="alert alert-success col-md-5" role="alert"> A pesquisa retornou '.count($banners).' resultados</div><br><br><br><br>'; 
                    echo '<a href="banners.php" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a><br><br>';} ?>
                    <?php if(!isset($_GET['search'])){ echo '<a href="../forms/banners.form.php?action=create" class="btn btn-default">Inserir</a>'; } ?>
                    <form class="navbar-form navbar-right" role="search" action="banners.php" method="GET">
                        <div class="form-group" style="margin-left:-15%;">
                            <label for="pesquisar">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-1" placeholder="Pesquisar">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default" name="botaoPesquisa">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </label>
                        </div>
                    </form>
                    Nome em ordem <a href="?ordem=c">Crescente</a> / <a href="?ordem=d">Decrescente</a>
                    <?php if(!isset($_GET['search'])){ ?>
                    <table cellspacing="5px" id="tabelaDados" class="table table-striped table-condensed table-bordered table-hover">

                    </table>
                    <?php

                    }
                    else {
                    ?>
                    <table cellspacing="5px" class="table table-striped table-condensed table-bordered table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Link</th>
                        <th>Imagem</th>
                        <th>Legenda</th>
                        <th>Ação</th>
                    </tr>
                    <?php foreach($banners as $banner): ?>
                    <tr>
                        <td><?php echo $banner->getId();?></td>
                        <td><?php echo $banner->getTitle();?></td>
                        <td><?php echo $banner->getDescription();?></td>
                        <td><?php echo $banner->getHref();?></td>
                        <td><?php echo $banner->getSrc();?></td>
                        <td><?php echo $banner->getAlt();?></td>
                        <td>
                            <a href="../forms/banners.form.php?action=update&id=<?php echo $banner->getId(); ?>"> Alterar </a>
                            <a href="../forms/banners.form.php?action=delete&id=<?php echo $banner->getId(); ?>"> Deletar </a>
                        </td> 
                    </tr>
                <?php endforeach; }?>
                </table>
                <?php
                $f = new functions();
                $f->pagination($bc->total[0]['count(*)']);
                ?>
                <script src="../../publics/js/jquery-1.10.2.js"></script>
                <script>
                    $(document).ready(function() {
                        $.ajax({
                            type: 'post',
                            data: 'page=1',
                            url: '../parts/loaderBanners.php?ordem=<?php echo $_GET['ordem']; ?>',
                            success: function(retorno) {
                                $('#tabelaDados').html(retorno);
                            }
                        })
                    });
                    $(".page").click(function() {
                        page = $(this).html();
                        $(".page").parent().removeClass("active");
                        $(this).parent().addClass("active");
                        $.ajax({
                            type: 'post',
                            data: 'page=' + page,
                            url: '../parts/loaderBanners.php',
                            success: function(retorno) {
                                $('#tabelaDados').html(retorno);
                            }
                        })
                    });
                </script>
            </div>
        </div>
    </body>
</html>