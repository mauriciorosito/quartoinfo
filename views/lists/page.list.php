<?php
include_once("../../controllers/content.control.php");

if(isset($_GET['p'])) {	
	$content = new Content();
	$content->setIdContent($_GET['p']);

	$cc = new ControllerContent();
	$content = $cc->actionControl('selectOne',$content);
	
	if($content === null) {
		header('Location: 404.list.php');
	}
}
else {
	header('Location: 404.list.php');
}
include_once("../parts/header.php");
?>
<meta charset="utf-8">
		<!--	<div style="margin-left: 11.5%">-->
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        <div id="menuL" class="col-sm-3 col-md-2 sidebar" role="navigation">
							<ul class="nav nav-sidebar">
						
								<li class="active"><a href="institucional.php">Apresentação</a></li>
								<li><a href="institucional_localizacao.php" class="sld" >Localização</a></li>
								<li><a href="institucional_estrutura.php">Estrutura</a></li>
								<li><a href="institucional_acessibilidade.php">Acessibilidade</a></li>
								<li><a href="institucional_calendario.php">Calendário Acadêmico</a></li>
							</ul>
						</div>
						<div id="conteudo" class="well">	
							
							
							<h3><b><?php echo $content->getTitle(); ?></b></h3><br>
							<?php echo $content->getText(); ?>
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
