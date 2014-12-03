<?php
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
                    
                    require_once '../../controllers/links.control.php';
                    $lc = new ControllerLinks();
                    $links = $lc->search($_GET['search']);
                    echo '<div class="alert alert-success col-md-5" role="alert"> A pesquisa retornou '.count($links).' resultados</div><br><br><br><br>'; 
                    echo '<a href="links.list.php" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a><br><br>';} ?>
                    <?php if(!isset($_GET['search'])){ echo '<a href="../forms/links.form.php?action=create" class="btn btn-default"><i class="glyphicon glyphicon-plus-sign"></i>  Inserir Link</a>'; } ?>
                    <form class="navbar-form navbar-right" role="search" action="links.list.php" method="GET">
                        <div class="form-group" style="margin-left:-25%;">
                            <label for="pesquisar">
                                <div class="input-group">
                                    <input name="search" type="text"  class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-1" placeholder="Pesquisar">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success"  name="botaoPesquisa"> 
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </label>
                        </div>
                    </form>
                    <div class="btn-group"><a href="" class="btn btn-success">Ordenar por:</a><a href="?ordem=c" class="btn btn-default"> <i class="glyphicon glyphicon-arrow-up"></i>Nome - Crescente</a> <a href="?ordem=d" class="btn btn-default"><i class="glyphicon glyphicon-arrow-down"></i>Nome - Decrescente</a></div>
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
                        <th>Ação</th>
                    </tr>
                    <?php foreach($links as $link): ?>
                    <tr>
                        <td><?php echo $link->getId();?></td>
                        <td><?php echo $link->getTitle();?></td>
                        <td><?php echo $link->getDescription();?></td>
                        <td><?php echo $link->getUrl();?></td>
                        <td>
                            <a href="../forms/links.form.php?action=update&id=<?php echo $link->getId(); ?>"> Alterar </a>
                            <a href="../forms/links.form.php?action=delete&id=<?php echo $link->getId(); ?>"> Deletar </a>
                        </td> 
                    </tr>
                <?php endforeach; }?>
                </table>
                <?php
                $f = new functions();
                $f->pagination($lc->total[0]['count(*)']);
                ?>
                <script src="../../publics/js/jquery-1.10.2.js"></script>
                <script>
                    $(document).ready(function() {
                        $.ajax({
                            type: 'post',
                            data: 'page=1',
                            url: '../parts/loaderLinks.php?ordem=<?php echo $_GET['ordem']; ?>',
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
                            url: '../parts/loaderLinks.php',
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