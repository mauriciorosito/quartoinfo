<?php
	include_once("../parts/header.php");
	include_once("../../controllers/content.control.php");
	include_once("../../models/content.model.php");
	include_once("../../models/contentMedia.model.php");
	include_once("../../models/media.model.php");
	include_once("../../controllers/contentMedia.control.php");
	include_once("../../controllers/media.control.php");
	if(isset($_GET['idContent'])){
		$idContent = $_GET['idContent'];
	}
	$controllerContent = new ControllerContent();
	$controllerContentMedia = new ControllerContentMedia();
	$controllerMedia = new ControllerMedia();
	$c = new Content();
	$c->setIdContent($idContent);
	$content = $controllerContent->actionControl('selectOne', $c);
?>
<meta charset="utf-8">
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        
						<div class="well">	
							<div class="row">
				
                        <h3><b>Notícia</b></h3>
						
						<div class="media">
                            <a class="pull-left" href="#">
								<?php
									$contentMedia = $controllerContentMedia->actionControl('selectIdMedia',$content);
									$medias = $controllerContentMedia->actionControl('selectMedias',$content);
									if(isset($contentMedia)){
										$m = new contentMedia();
										$m->setIdMedia($contentMedia->getIdMedia());
										$media = $controllerMedia->actionControl('selectOne',$m);
										$path = $media->getPath();
									}
									else{
										$path = "publics/imgs/noticia.jpg";
									}
								?>
                                <img class="img-circle" data-src="holder.publics/js/140x140" alt="..." src="../../<?php echo $path; ?>" style="width: 200px; height: 200px;">
								
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $content->getTitle(); ?></h4>
                                <p><?php echo $content->getText();?></p> 
								<?php
									if(isset($medias)){
										echo "<h4 style='margin-top:100px;'>Arquivos</h4>";
										foreach($medias as $med){
											$m = new contentMedia();
											$m->setIdMedia($med->getIdMedia());
											$media = $controllerMedia->actionControl('selectOne',$m);
											echo "<a href='../../".$media->getPath()."'>".$media->getPath()."</a><br>";
										}
									}
								?>
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
