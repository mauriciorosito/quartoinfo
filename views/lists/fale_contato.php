<?php
	include_once("../parts/header.php");
?>
<meta charset="utf-8">
                <div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >
                    <div class="row">
                        <div id="menuL" class="col-sm-3 col-md-2 sidebar" role="navigation">
							<ul class="nav nav-sidebar">
								<li class="active"><a href="fale_apresentacao.php">Apresentação</a></li>
								<ul class="escondido"> 
							
										<li><a href="fale_contato.php">Contatos</a></li>
										<li><a href="fale_endereco.php">Endereço</a></li>
										</ul>
										
								<li><a href="#">Departamentos</a></li>
								<li><a href="fale_perguntas.php">Perguntas Frequentes</a></li>
							</ul>
						</div>
						<div id="conteudo"  class="col-sm-6 class="well">	
						<form action='sendEmail' role='form'>
							<label>Nome </label>
							<input type='text' name='nome' class='form-control' placeholder='Informe seu nome'>
							<label>Email </label>
							<input type='email' name='email' class='form-control' placeholder='Informe seu e-mail'>
							<label>Comentario</label>
							<textarea class='form-control' name='comentario'></textarea>
						<label>Contato</label>
						<select name='contatos'class='form-control'>
							<option disabled>Selecione o destinatário</option>
							<option value='biblioteca@bento.ifrs.edu.br'>Biblioteca: biblioteca@bento.ifrs.edu.br</option>
							<option value='cee@bento.ifrs.edu.br'>Coordenadoria de Estágios e Egressos: cee@bento.ifrs.edu.br</option>
							<option value='cre@bento.ifrs.edu.br'>Coordenadoria de Registros Escolares: cre@bento.ifrs.edu.br</option>
							<option value='coopebg@bento.ifrs.edu.br'>Cooperativa de Alunos: coopebg@bento.ifrs.edu.br</option>
						</select><br>
							<button type="submit" name='enviarEmail' class="btn btn-default">Enviar</button>
						</form>
						</div>
						
                 <?php
							include_once("../parts/footer.php");
				?>
            </div>
		</div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       
</html>
