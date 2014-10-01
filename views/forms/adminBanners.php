<?php
	require_once('../../models/banners.model.php');
	require_once('../../controllers/banners.control.php');

	$banner = new banners();
	$cb = new ControllerBanners();
        
        if(isset($_POST['create'])){
            echo "opa3";
                $erro = null;
                if (isset($_FILES['src']))
                {
                        $extensoes = array(".jpg");
                        $caminho = "../../publics/imgs/slider/";
                        $nome = $_FILES['src']['name'];
                        $temp = $_FILES['src']['tmp_name'];
                        if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
                                $erro = "Extensão inválida";
                        }
                        if (!isset($erro)) {
                                $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
                                if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                                        $erro = "Não foi possível anexar o arquivo";
                        }
                        
                        $banner->setTitle($_POST['title']);
                        $banner->setDescription($_POST['description']);
                        $banner->setHref($_POST['href']);
                        $banner->setSrc($nomeAleatorio);
                        $banner->setAlt($_POST['alt']);
                        $banner->setType($_POST['type']);
                        $cb->actionControl('insert', $banner);

                        header('location:adminBanners.form.php');
                }


        }
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$href = $_POST['href'];
	$src = $_POST['src'];
	$alt = $_POST['alt'];
	$type = $_POST['type'];

	$banner = new banners();
	$banner->setId($id);
	$banner->setTitle($title);
	$banner->setDescription($description);
	$banner->setHref($href);
	$banner->setSrc($src);
	$banner->setAlt($alt);
	$banner->setType($type);
        
        $cb->actionControl('update', $banner);

	header('location:adminBanners.form.php');
}
if(isset($_POST['delete'])){
	$id = $_POST['id'];

	$banner->setId($id);

	$cb->actionControl('delete', $banner);

	header('location:adminBanners.form.php');
}
?>
<html lang="en">
    <head>
	
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
		<link rel="shortcut icon" href="../../publics/imgs/logo.png" alt="logo do instituto">

        <title>Admin Banner</title>

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
<body><div id="content">
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
						  <button type="button" class="btn" onclick="location.href='../../views/forms/login.php'">Login</button>
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
                                <div class="form-group">
                                  								<label for="pesquisar"> 
								  <input name="pesquisa" type="text" id="pesquisar" class="form-control col-lg-3 col-md-3 col-sm-3 col-xs-3" placeholder="Pesquisar">
								</label> 
                                </div>
                                <button type="submit" class="btn btn-default" style="margin-top: -11px;" name="submit"><span class="glyphicon glyphicon-search"></span></button>
								<a href="advanced_search.php"><i>Pesquisa Avançada</i></a>
							  </form>
							</div>
						  </div>
						</nav>
												<div id="path">
						Caminho > Página
						</div>

					</div>
					</div>
					</div>
	
	
	
        <div class="row">
            <div class="col-md-4">
               <h3>Criar Banner</h3>
	<form enctype="multipart/form-data" action="adminBanners.form.php" method="POST">
		<table>
			<tr>
				<td>Título</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr>
				<td>Direção</td>
				<td><input type="text" name="href"></td>
			</tr>
			<tr>
				<td>Arquivo</td>
				<td><input type="file" name="src"></td>
			</tr>
			<tr>
				<td>Texto Alternativo</td>
				<td><input type="text" name="alt"></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td><input type="text" name="type"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Criar" name="create">
				</td>
			</tr>
		</table>
	</form>
            </div>
            <div class="col-md-4" style="position: relative; left: 150px;">
                <h3>Selecionar Banner</h3>
	<form action="adminBanners.form.php" method="POST">
		<select name="id">
			<?php
				$banners = $cb->actionControl('selectAll');
				foreach($banners as $banner){
					echo '<option value="'.$banner->getId().'">'.$banner->getTitle().'</option>';
				}
			?>
		</select>
		<input type="submit" value="Selecionar" name="read">
	</form>
	<?php
		if(isset($_POST['read'])){
			$id = $_POST['id'];
			$banner->setId($id);
			$escolhido = $cb->actionControl('selectOne', $banner);
			$escolhido = $escolhido[0];
	?>
	<h3>Editar</h3>
	<form action="adminBanners.form.php" method="POST">
		<table>
			<tr>
				<td>Título</td>
				<td><input type="text" name="title" value="<?php echo $escolhido['title'] ?>"></td>
			</tr>
			<tr>
				<td>Descrição</td>
				<td><input type="text" name="description" value="<?php echo $escolhido['description'] ?>"></td>
			</tr>
			<tr>
				<td>Direção</td>
				<td><input type="text" name="href" value="<?php echo $escolhido['href'] ?>"></td>
			</tr>
			<tr>
				<td>Arquivo</td>
				<td><input type="text" name="src" value="<?php echo $escolhido['src'] ?>"></td>
			</tr>
			<tr>
				<td>Texto Alternativo</td>
				<td><input type="text" name="alt" value="<?php echo $escolhido['alt'] ?>"></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td><input type="text" name="type" value="<?php echo $escolhido['type'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Enviar" name="update">
				</td>
			</tr>
		</table>
            <input type="hidden" name="id" value="<?php echo $escolhido['id'] ?>">
	</form>
	<?php
		}
	?>
            </div>
            <div class="col-md-4" style="position: relative; left: 100px;">
               <h3>Deletar Banner</h3>
	<form action="adminBanners.form.php" method="POST">
		<select name="id">
			<?php
				include_once("../../controllers/banners.control.php");
				$cb = new ControllerBanners();
				$banners = $cb->actionControl('selectAll');
				foreach($banners as $banner){
					echo '<option value="'.$banner->getId().'">'.$banner->getTitle().'</option>';
				}
			?>
		</select>
		<input type="submit" value="Deletar" name="delete">
	</form>
            </div>
        </div>
        </div>
</body>
</html>