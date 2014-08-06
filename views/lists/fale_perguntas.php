<?php
	include_once("../parts/header.php");
?>
<script type="text/javascript"> 
function toggle(obj) {
	var el = document.getElementById(obj);
	if ( el.style.display != 'none' ) {
		el.style.display = 'none';
	}else {
		el.style.display = '';
	}
}
</script>
<meta charset="utf-8">
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right">
                    <div class="row">
                        <div id="menuL" class="col-sm-3 col-md-2 sidebar" role="navigation">
							<ul class="nav nav-sidebar">
								<li> <a href="fale_apresentacao.php">Apresentação</a></li>
								<li><a href="#">Departamentos</a></li>
								<li class="active"><a href="fale_perguntas.php">Perguntas Frequentes</a></li>
							</ul>
						</div>
						
						<div id="conteudo" class="well">	
							<h3><b>Perguntas Frequentes</b></h3><br>
							<ul class="escondido"> 
								<li id="clikk" onclick="toggle('div1');" style="text-align: justify;cursor:pointer;color:#428bca;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis egestas accumsan scelerisque. Vivamus et felis sem? </li>
								<div id="div1" style="display: none;">
									<p style="text-align: justify;margin-left:20px;margin-top:10px;"><b>REPOSTA</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis egestas accumsan scelerisque. </p><br>
								</div>
							</ul>
						
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