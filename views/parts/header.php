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

                                            </head>

                                            <body>
                                                <div id="content">
                                                    <div xmlns="http://www.w3.org/1999/xhtml" id="barra_governo"><div class="barra"><ul class="list-unstyled">
                                                                <li><a title="Portal de Estado do Brasil" class="logo" href="http://www.brasil.gov.br/" target="_blank"></a></li>
                                                                <li><a title="Acesso à Informação" class="ai" href="http://www.acessoainformacao.gov.br/" target="_blank"></a></li>
                                                            </ul></div></div>
                                                    <div class="container img-rounded BVerde">
                                                        <div class="cinza">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="navbar-header">
                                                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                                            <span class="sr-only">Toggle navigation</span>
                                                                            <span class="icon-bar"></span>
                                                                            <span class="icon-bar"></span>
                                                                            <span class="icon-bar"></span>
                                                                        </button>

                                                                    </div>
                                                                    <a href="../../index.php" id="logo"><img src="../../publics/imgs/logo.png" alt="logo do instituto federal do rio grande do sul" height="75px"/></a>
                                                                </div>
                                                                <div class="col-col-md-4 col-md-offset-9">
                                                                    <button type="button" class="btn btn-default" style="margin-top:15px;">A[+]</button>
                                                                    <button type="button" class="btn btn-default" style="margin-top:15px;">A[-]</button>
                                                                    <button type="button" class="btn btn-default" style="margin-top:15px;">A</button>
                                                                    <button type="button" class="btn btn-default" style="margin-top:15px;">Cores</button>
                                                                    </ul>
                                                                    <div class="btn-group" style="margin-top:15px;">
                                                                        <button type="button" class="btn" onclick="location.href = 'login.php'">Login</button>
                                                                        <button type="button" class="btn" onclick="location.href = '../forms/content.form.php?action=insert'">Cadastro</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-0"></div>
                                                                <div class="col-md-12">
                                                                    <nav class="navbar navbar-inverse" role="navigation">
                                                                        <div class="container-fluid">
                                                                            <div class="navbar-header">
                                                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                                                                    <span class="sr-only">Toggle navigation</span>
                                                                                    <span class="icon-bar"></span>
                                                                                    <span class="icon-bar"></span>
                                                                                    <span class="icon-bar"></span>
                                                                                </button>
                                                                                <!--<a class="navbar-brand" href="#">Menu/a>-->
                                                                            </div>

                                                                            <!-- Pega url para marcar menu. -->
                                                                            <?php
                                                                            $url = $_SERVER['PHP_SELF'];
                                                                            $url = explode("/", $url);
                                                                            $url = array_pop($url);
                                                                            $url = explode(".", $url);
                                                                            $url = $url[0];
                                                                            $url = explode("_", $url);
                                                                            $url = $url[0];
                                                                            if ($url == "institucional") {
                                                                                $id = "menu2";
                                                                            } else if ($url == "ensino") {
                                                                                $id = "menu3";
                                                                            } else if ($url == "pesquisa") {
                                                                                $id = "menu4";
                                                                            } else if ($url == "extensao" || $url == "extension") {
                                                                                $id = "menu5";
                                                                            } else if ($url == "servicos" || $url == "services") {
                                                                                $id = "menu6";
                                                                            } else if ($url == "fale") {
                                                                                $id = "menu7";
                                                                            } else {
                                                                                $id = "";
                                                                            }
                                                                            echo "<style>#" . $id . "{background-color:rgba(153,204,50, 0.9);}</style>";
                                                                            ?>


                                                                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                                                <ul class="nav navbar-nav">
                                                                                    <li id="menu1"><a href="../../index.php"><b>Página Principal</b></a></li>
                                                                                    <li id="menu2"><a href="institucional.php"><b>Instituição</b></a></li>
                                                                                    <li id="menu3"><a href="ensino_apresentacaoSuperior.php"><b>Ensino</b></a></li>
                                                                                    <li id="menu4"><a href="pesquisa_apresentacao.php"><b>Pesquisa e Inovação</b></a></li>
                                                                                    <li id="menu5"><a href="extensao_apresentacao.php"><b>Extensão</b></a></li>
                                                                                    <li id="menu6"><a href="servicos.php"><b>Serviços</b></a></li>
                                                                                    <li id="menu7"><a href="fale_apresentacao.php"><b>Fale conosco</b></a></li>

                                                                                </ul>
                                                                                <form class="navbar-form navbar-right" role="search" action="advanced_search.php" method="post">
                                                                                    <div class="form-group" style="margin-left:-15%;">
                                                                                        <label for="pesquisar">
                                                                                           <div class="input-group">
                                                                                             <input name="pesquisa" type="text" id="pesquisar"  class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-1" placeholder="Pesquisar">
                                                                                              <span class="input-group-btn">
                                                                                                        <button type="submit" class="btn btn-default" name="submit">
                                                                                                        <span class="glyphicon glyphicon-search"></span></button>
                                                                                                </span>
                                                                                            </div>
                                                                                        </label>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </nav>
                                                                    <div id="path">
                                                                        Caminho > Página
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
