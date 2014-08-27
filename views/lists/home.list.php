<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- Login http://www.html5dev.com.br/category/bootstrap/-->

<?php
session_start();
include_once("../../controllers/content.control.php");
include_once("../../controllers/contentMedia.control.php");
include_once("../../controllers/media.control.php");
include_once("../../models/media.model.php");

$controllerContent = new ControllerContent();
$news = $controllerContent->actionControl('selectPreviewNews');
$events = $controllerContent->actionControl('selectPreviewEvents');
$oportunities = $controllerContent->actionControl('selectPreviewOportunities');

$controllerContentMedia = new ControllerContentMedia();
$controllerMedia = new ControllerMedia();
?>


<html lang="en">
    <head>
	
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
		<link rel="shortcut icon" href="../../publics/imgs/logo.png" alt="logo do instituto">

        <title>Informática</title>

        <!-- Bootstrap core CSS -->
        <link href="../../publics/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../../publics/css/small-business.css" rel="stylesheet">
        <link rel="stylesheet" href="../../publics/css/craftyslide.css" />
        <link type="text/css" rel="stylesheet" href="../../publics/css/rhinoslider-1.05.css" />
		<style>
			#barra_governo{
				margin-top:-10px !important;
				height:24px !important;
			}
		</style>
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
								<a href="../../index.php" id="logo"><img src="../../publics/imgs/logo.png" height="75px"/></a>
					</div>
					<div class="col-col-md-4 col-md-offset-9">
						<button type="button" class="btn btn-default" style="margin-top:15px;">A[+]</button>
						<button type="button" class="btn btn-default" style="margin-top:15px;">A[-]</button>
						<button type="button" class="btn btn-default" style="margin-top:15px;">A</button>
						<button type="button" class="btn btn-default" style="margin-top:15px;">Cores</button>
					</ul>
						<div class="btn-group" style="margin-top:15px;">
						  <button type="button" class="btn" onclick="location.href='../../views/lists/login.php'">Login</button>
						  <button type="button" class="btn" onclick="location.href='../../views/forms/content.form.php?action=insert'">Cadastrar</button>
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

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							  <ul class="nav navbar-nav">
								<li><a href="../../index.php" style="background-color:rgba(153,204,50, 0.9);"><b>Página Principal</b></a></li>
								<li><a href="../../views/lists/institucional.php"><b>Instituição</b></a></li>
								<li><a href="../../views/lists/ensinoApresentacaoSuperior.php"><b>Ensino</b></a></li>
				                <li><a href="../../views/lists/pesquisa_apresentacao.php"><b>Pesquisa e Inovação</b></a></li>
								<li><a href="../../views/lists/extensao_apresentacao.php"><b>Extensão</b></a></li>
								<li><a href="../../views/lists/servicos.php"><b>Serviços</b></a></li>
								<li><a href="../../views/lists/fale_apresentacao.php"><b>Fale conosco</b></a></li>
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
                                                                                        <br>
                                                                                            <a href="advanced_search.php"><i>Pesquisa Avançada</i></a>
                                                                                    </div>
                        				</form>
							</div>
						  </div>
						</nav>
												<div id="path">
						<ol class="breadcrumb">
                                                    <li class="active">Home</li>
                                                  </ol>
						</div>

					</div>
					</div>
					</div>
					<!--	<div style="margin-left: 11.5%">-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right" style="margin-top: 7%" >
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            <ul id="slideshow" class="list-unstyled" >
                                <li>
                                    <img src="../../publics/imgs/slider/ifrs.jpg" class="img-responsive"  alt="Breve descrição do evento ou notícia" />
                                    <div class="rhino-caption col-lg-12 col-md-12 col-sm-12 col-xs-12" ><strong>HTML Caption</strong> -
                                        <a href="http://rhinoslider.com/">www.rhinoslider.com</a>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../publics/imgs/slider/seletivo.jpg" class="img-responsive" alt="Breve descrição do evento ou notícia" />
                                    <div class="rhino-caption" ><strong>HTML Caption</strong> -
                                        <a href="http://rhinoslider.com/">www.rhinoslider.com</a>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../publics/imgs/slider/meni.jpg" class="img-responsive" alt="Breve descrição do evento ou notícia" />
                                    <div class="rhino-caption" ><strong>HTML Caption</strong> -
                                        <a href="http://rhinoslider.com/">www.rhinoslider.com</a>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../publics/imgs/slider/livros.jpg" class="img-responsive" alt="Breve descrição do evento ou notícia" />
                                    <div class="rhino-caption" ><strong>HTML Caption</strong> -
                                        <a href="http://rhinoslider.com/">www.rhinoslider.com</a>
                                    </div>
                                </li>
                                <li>
                                    <img src="../../publics/imgs/slider/alunos.jpg" class="img-responsive" alt="Breve descrição do evento ou notícia" />
                                    <div class="rhino-caption" ><strong>HTML Caption</strong> -
                                        <a href="http://rhinoslider.com/">www.rhinoslider.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
						 <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <ul><br> <div id="">
                                <a href="http://diariodareitora.ifrs.edu.br/"><img src="../../publics/imgs/banner1.png" style="margin-top:1.25px" class="img-responsive" width="100%" alt="diário da reitoria"/></a> </div>
								<div id="">
								<a href="http://radio.ifrs.edu.br/"><img src="../../publics/imgs/banner2.png" style="margin-top:1.25px" class="img-responsive" width="100%"alt="radio IFRS"/></a> </div>
								<div id="">
								<a href="http://radio.ifrs.edu.br/"><img src="../../publics/imgs/banner3.png" style="margin-top:1.25px" class="img-responsive" width="100%" alt="radio IFRS"/></a> </div>
							</ul>
                        </div>	
                    </div>
                    <div class="row" margin="10px;">
						<hr class="BVerde">
							<?php foreach($news as $new) { 
								$contentMedia = $controllerContentMedia->actionControl('selectIdMedia',$new);
								if(isset($contentMedia)){
									$m = new Media();
									$m->setIdMedia($contentMedia->getIdMedia());
									$media = $controllerMedia->actionControl('selectOne',$m);
									$path = $media->getPath();
								}
								else{
									$path = "publics/imgs/noticia.jpg";
								}
							?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                            <div class="thumbnail">
                                <img class="img-circle" data-src="holder.publics/js/140x140" alt="imagem" src="../../<?php echo $path; ?>" style="width: 140px; height: 140px;">
                                <h2><?php echo $new->getTitle(); ?></h2>
                                <p><?php echo $new->getDescription();?></p>
                                <a class="btn btn-default" href="news_details.php?idContent=<?php echo $new->getIdContent(); ?>">Mais Informações</a>
                            </div>
                        </div>
							<?php } ?>
							<a class="btn btn-default" href="all_news.php" style="float: right;">Ler mais notícias</a>
                    </div>
                    <div class="row">
					 <hr class="BVerde">
					 <!--Eventos-->
                        <h3>Eventos recentes</h3>
						
						<?php foreach($events as $event) { ?>
                        <div class="media">
                            <a class="pull-left" href="events_details.php">
                                <img class="media-object" src="../../publics/imgs/calendar.jpg" alt="..." height="64px">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $event->getTitle(); ?></h4>
                                <p><?php echo $event->getDescription();?></p> 
								<button type="button" class="btn btn-default " onclick="location.href='events_details.php?idContent=<?php echo $event->getIdContent(); ?>'"> Continuar lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
								<hr class="BordasExtras">
                            </div>
                        </div>
							<?php } ?>
							<a class="btn btn-default" href="extension_events.php" style="float: right;">Ler mais eventos</a>
						</div>
					<!--Estágios-->
                    <div class="row">
					 <hr class="BVerde" width="">
                        <h3>Estágios</h3>
						<?php foreach($oportunities as $oport) { ?>
                        <div class="media">
                            <a class="pull-left" href="internship_details.php">
                                <img class="media-object" src="../../publics/imgs/classi.png" alt="..." height="64px">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $oport->getTitle(); ?></h4>
                                <p><?php echo $oport->getDescription();?></p>
								<button type="button" class="btn btn-default " onclick="location.href='internship_details.php?idContent=<?php echo $event->getIdContent(); ?>'">Continuar lendo<span class="glyphicon glyphicon-arrow-right"></span></button>
								<hr class="BordasExtras">
                            </div>
                        </div>
							<?php } ?>
							<a class="btn btn-default" href="extension_internship.php" style="float: right;">Ler mais oportunidades</a>
                    </div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <footer>
                        <hr  class="BVerde">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
                                <p><b>IFRS - Curso Técnino de Informática para Internet - Câmpus Bento Gonçalves</b></p>
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
        <script src="../../publics/js/bootstrap.js"></script>
        <script src="../../publics/js/craftyslide.js"></script>
        <script src="../../publics/js/script.js"></script>
        <script type="text/javascript" src="../../publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="../../publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="../../publics/js/easing.js"></script>

    </body>

</html>
