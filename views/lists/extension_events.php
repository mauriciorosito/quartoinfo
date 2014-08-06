<?php
	include_once("../parts/header.php");
	include_once("../../controllers/content.control.php");
	$controllerContent = new ControllerContent();
	$contents = $controllerContent->actionControl('selectAllEvents');
?>
<meta charset="utf-8">
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        <div id="menuL" class="col-sm-3 col-md-2 sidebar" role="navigation">
							<ul class="nav nav-sidebar">
								<li><a href="extensao_apresentacao.php">Apresentação</a></li>
								<li><a href="extensao_comites.php">Comitês</a></li>
								<li><a href="extensao_projetos.php">Projetos de Extensão</a></li>
								<li class="active"><a href="extension_events.php">Eventos</a></li>
								<li><a href="extensao_cursos.php">Cursos</a></li>
								<li><a href="extension_internship.php">Estágios</a></li>
								<li><a href="extensao_links.php">Links Úteis</a></li>
							</ul>
						</div>
						<div id="conteudo" class="well">	
							<div class="row">
				
                        <h3><b>Eventos recentes</b></h3>
                       <?php foreach($contents as $content) { ?>
                       <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="../../publics/imgs/calendar.jpg" alt="..." height="64px">
							</a>
							<div class="media-body">
                                <h4 class="media-heading"><?php echo $content->getTitle(); ?></h4> 
                                <p><?php echo $content->getDescription();?></p>
                                <button type="button" class="btn btn-default " onclick="location.href='events_details.php?idContent=<?php echo $content->getIdContent(); ?>'"> Continuar lendo<span class="glyphicon glyphicon-arrow-right"></span></button>
								<hr class="BordasExtras">
                            </div>
                        </div>
						<?php } ?>
						</div>
							<div class="btn-toolbar" style="float: right; margin-top: 52px;">
							  <div class="btn-group">
								<button class="btn">1</button>
								<button class="btn">2</button>
								<button class="btn">3</button>
								<button class="btn">4</button>
							  </div>
							</div>
          
                  <?php
							include_once("../parts/footer.php");
				?>
            </div>
		</div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       
    </body>

</html>
