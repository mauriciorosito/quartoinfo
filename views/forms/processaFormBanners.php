<?php
require_once('../../models/banners.model.php');
require_once('../../controllers/banners.control.php');

$banner = new banners();
$bc = new ControllerBanners();

if(isset($_POST['create'])){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$href = $_POST['href'];
	$file = $_FILES['src'];
	$alt = $_POST['alt'];
	$type = $_POST['type'];

	$banner->setTitle($title);
	$banner->setDescription($description);
	$banner->setHref($href);
	$banner->setSrc($src);
	$banner->setAlt($alt);
	$banner->setType($type);

	$_UP['pasta'] = '../../publics/imgs/slider/';
	$_UP['tamanho'] = 1024 * 1024 * 12;
	$_UP['extensoes'] = array('jpg', 'png', 'gif');
	$_UP['renomeia'] = true;
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	if($_FILES['arquivo']['error'] != 0){
		die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
		exit;
	}

	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if(array_search($extensao, $_UP['extensoes']) === false){
		echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
	}

	elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){
		echo "O arquivo enviado é muito grande, envie arquivos de até 12Mb.";
	}
	else{
		if ($_UP['renomeia'] == true) {
		// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			$nome_final = time().'.jpg';
		}
		else{
		// Mantém o nome original do arquivo
			$nome_final = $_FILES['arquivo']['name'];
		}
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			echo "Upload efetuado com sucesso!";
			echo '<br><a href="'.$_UP['pasta'].$nome_final.'">Clique aqui para acessar o arquivo</a>';
		}
		else{
			echo "Não foi possível enviar o arquivo, tente novamente.";
		}

	}
		#############################################
	$uploaddir = '../../publics/imgs/slider';
	$uploadfile = $uploaddir.$_FILES['userfile']['name'];
		#############################################
	move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir.$_FILES['userfile']['name']);

	$bc->actionControl('insert', $banner);

	header('location:adminBanners.form.php');
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$href = $_POST['href'];
	$src = $_POST['src'];
	$alt = $_POST['alt'];
	$type = $_POST['type'];

	$banner = new Banner();
	$banner->setId($id);
	$banner->setTitle($title);
	$banner->setDescription($description);
	$banner->setHref($href);
	$banner->setSrc($src);
	$banner->setAlt($alt);
	$banner->setType($type);

	header('location:adminBanners.form.php');
}
if(isset($_POST['delete'])){
	$id = $_POST['id'];

	$banner->setId($id);

	$bc->actionControl('delete', $banner);

	header('location:adminBanners.form.php');
}
?>