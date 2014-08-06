<?php
	include_once("../parts/header.php");
	include_once("../../controllers/content.control.php");
	include_once("../../models/content.model.php");
	if(isset($_GET['idContent'])){
		$idContent = $_GET['idContent'];
	}
	$controllerContent = new ControllerContent();
	$c = new Content();
	$c->setIdContent($idContent);
	$content = $controllerContent->actionControl('selectOne', $c);
?>
<meta charset="utf-8">
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        
						<div class="well">	
							<div class="row">
				
                        <h3><b>Estágio</b></h3>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="../../publics/imgs/livro.jpg" alt="..." height="200px">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $content->getTitle(); ?></h4>
                                <p><?php echo $content->getText();?></p>
								<hr class="BordasExtras">
                            </div>
                        </div>
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
