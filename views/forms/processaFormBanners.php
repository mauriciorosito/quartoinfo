<?php
	require_once('../../models/banners.model.php');
	require_once('../../controllers/banners.control.php');

	$banner = new banners();
	$bc = new ControllerBanners();

	if(isset($_POST['create'])){
		$title = $_POST['title'];
		$description = $_POST['description'];
		$href = $_POST['href'];
		$src = $_POST['src'];
		$alt = $_POST['alt'];
		$type = $_POST['type'];

		$banner->setTitle($title);
		$banner->setDescription($description);
		$banner->setHref($href);
		$banner->setSrc($src);
		$banner->setAlt($alt);
		$banner->setType($type);

		$bc->actionControl('insert', $banner);

		header('location:adminBanners.php');
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

		header('location:adminBanners.php');
	}
	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$banner->setId($id);

		$bc->actionControl('delete', $banner);

		header('location:adminBanners.php');
	}
?>