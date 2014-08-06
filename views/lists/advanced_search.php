<?php
require_once("../../packages/system/functions.model.php");
require_once("../../controllers/content.control.php");
$controllerContent = new ControllerContent();
?>

<!DOCTYPE html>
<!-- Login http://www.html5dev.com.br/category/bootstrap/-->

<?php
include_once("../parts/header.php");
?>

					<!--	<div style="margin-left: 11.5%">-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right" style="margin-top: 7%" >
                     <form action="advanced_search.php" method="post">
					 <h3>Localizar por:</h3><br><br>
					<fieldset id="pesquisa">
					 
					 <div id="palavra">
					 Palavras-chave:<input type="text" class="form-control" name="pesquisa">
					 
					 </div>
					 <div id="data">
					  Data de publicação:
						<select class="form-control" name="intervalo">
						  <option value="-1 week">Última semana</option>
						  <option value="-1 month">Último mês</option>
						  <option value="-1 year">Último ano</option>
						</select><br>
					  
						</div>
						
						<div id="tipomaterial">
					 Tipo de material:
						<select class="form-control" name="tipo">
						  <option value="A">Todos tipos</option>
						  <option value="N">Notícia</option>
						  <option value="E">Evento</option>
						  <option value="O">Estágio</option>
						</select><br>
						<input id="botaopesquisar"type="submit" name="submit" class="btn btn-default" value="Pesquisar">
						
					
						
						</form>
						</div>
						
						
						</div>
				
                   
					
					
					
					</fieldset>
					<div class="row"></div>
					<hr class="BVerde">	
				
				<div class="media">
				<div id='page'>					
						<?php
							if(isset($_POST['page'])) $page = $_POST['page'];
							else $page = 1;
							if(isset($_POST["submit"])) {
								if($_POST["submit"] == "Pesquisar") {
									if(isset($_POST["pesquisa"])) {
										$pesquisa = new functions();
										if(isset($_POST['intervalo'])) {
											$data = date('Y-m-d', strtotime($_POST['intervalo']));
											$data2 = date('Y-m-d');
										}
										
										$resultados = ($pesquisa->search($_POST["tipo"], $_POST["pesquisa"], $page, null, $data, $data2));
									}
								}
								else {
									if(isset($_POST["pesquisa"])) {
										$pesquisa = new functions();
										
										$resultados = ($pesquisa->searchAll($_POST["pesquisa"], $page));
									}
								}
							}
						?>					
					</div>
                   <h3>Resultados:</h3> 
				    <input class="botaopesquisar"type="radio" name="submit" class="btn btn-default" value="titulo">Ordenar por título
					<input class="radiopesquisa"type="radio" name="submit" class="btn btn-default" value="data">Ordenar por data<br><br>
				<table class="table table-striped table-condensed table-bordered table-hover corTabela" id="corTabela">
					  <thead>
						<tr>
                          <th>Data de publicação</th>
                          <th>Tipo</th>
                          <th>Título</th>
                          <th>Descrição</th>
                        </tr>
					  </thead>
					  <tbody data-link="row" class="rowlink">				
						<?php
							if(isset($resultados)){
								foreach($resultados as $resultado){
						?>
						<tr>
							<td><?php echo $resultado["postDate"]; ?></td>
							<td><?php echo $resultado["type"]; ?></td>
							<td><?php echo $resultado["title"]; ?></td>
							<td><?php echo $resultado["description"]; ?></td>
						</tr>
						<?php
								}
							}
						?>
					  </tbody>
					</table>
						<?php
							if(isset($pesquisa)){
								$pesquisa->pagination($pesquisa->total, $page);
							}
						?>
				</div>
				</div>
				<?php
					include_once("../parts/footer.php");
				?>
					 
       

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
