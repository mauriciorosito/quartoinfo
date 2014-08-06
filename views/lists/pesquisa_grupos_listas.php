<?php
include_once("../parts/header.php");
?>
<meta charset="utf-8">
		<!--	<div style="margin-left: 11.5%">-->
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        <div id="menuL" class="col-sm-3 col-md-2 sidebar" role="navigation">
							<ul class="nav nav-sidebar">
								<li><a href="pesquisa_apresentacao.php">Apresentação</a></li>
								<li><a href="pesquisa_comissoes.php">Comissões</a></li>
								<li class="active"><a href="pesquisa_grupos.php">Grupos de Pesquisa</a></li>
								
									<ul class="escondido"> 
									
										<li><a href="pesquisa_grupos_diretorio.php">Diretório</a></li>
										<li><a href="pesquisa_grupos_listas.php">Lista</a></li>										
									</ul>
								
								<li><a href="pesquisa_docencia.php">Iniciação à Docência</a></li>
								<li><a href="pesquisa_cientifica.php">Iniciação Científica</a></li>
								<li><a href="pesquisa_projetos.php">Projetos de Pesquisa</a></li>
								<li><a href="pesquisa_nit.php">NIT</a></li>
								
								<li><a href="pesquisa_links.php">Links Úteis</a></li>
							</ul>
						</div>
						<div id="conteudo" class="well conteudoPesquisa">
						<h3><b>Lista dos Grupos de Pesquisa</b></h3> <br>						
							Conheça os Grupos de Pesquisa da área de Informática do IFRS-Câmpus Bento Gonçalves:<br><br>
							<table name="grupos" border="1">
                            <caption>Lista dos Grupos de Pesquisa</caption>  <br/>                             
                            <thead>
                             <tr>
								<th><b>Líder do Grupo</b></th>
								<th><b>Grupo de Pesquisa</b></th>
							</tr>
                                                            </thead>
                                                            <tbody>
							<tr>
								<td>Profa. Dra. Andréa Poletto Sonza</td>
								<td>Acessibilidade Virtual e Tecnologia Assistiva</td>
							</tr>
                                                            </tbody>
                                                            <tfoot>
							<tr>
								<td>Profa. Dra. Júlia Marques Carvalho da Silva</td> 
								<td>Projeto e Desenvolvimento de Sistemas</td>
							</tr>
                                                        </tfoot>
							</table>
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

