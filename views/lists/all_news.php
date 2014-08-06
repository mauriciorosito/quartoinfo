<?php
	include_once("../parts/header.php");
	include_once("../../controllers/content.control.php");
	include_once("../../controllers/media.control.php");
	include_once("../../controllers/contentMedia.control.php");
	include_once("../../models/media.model.php");
	$controllerContent = new ControllerContent();
	$controllerMedia = new ControllerMedia();
	$controllerContentMedia = new ControllerContentMedia();
	$contents = $controllerContent->actionControl('selectAllNews');

?>
<meta charset="utf-8">
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        
						<div class="well">	
							<div class="row">
				<h3><b>Notícias</b></h3>
				
				<?php foreach($contents as $content) { ?>
                       <div class="media">
                            <a class="pull-left" href="#">
								<?php 
									$contentMedia = $controllerContentMedia->actionControl('selectIdMedia',$content);
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
                                <img class="img-circle" data-src="holder.publics/js/140x140" alt="140x140" src="../../<?php echo $path; ?>" style="width: 70px; height: 70px;">
							</a>
							<div class="media-body">
                                <h4 class="media-heading"><?php echo $content->getTitle(); ?></h4> 
                                <p><?php echo $content->getDescription();?></p>
                                <button type="button" class="btn btn-default " onclick="location.href='news_details.php?idContent=<?php echo $content->getIdContent(); ?>'"> Continuar lendo<span class="glyphicon glyphicon-arrow-right"></span></button>
								
								<hr class="BordasExtras">
                            </div>
							
                        </div>
						<?php } ?>
							
                        
                            
                               
        
					</div> 
						</div>
					<div class="btn-toolbar">
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

