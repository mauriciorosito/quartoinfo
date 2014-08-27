<?php
	require_once('../../models/banners.model.php');
	require_once('../../controllers/banners.control.php');

	$banner = new banners();
	$cb = new ControllerBanners();
?>
<html>
<head>
	<title>Admin Banners</title>
	<meta charset="UTF-8">
</head>
<body>
	<h3>Create</h3>
	<form action="processaFormBanners.php" method="POST">
		<table>
			<tr>
				<td>title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>description</td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr>
				<td>href</td>
				<td><input type="text" name="href"></td>
			</tr>
			<tr>
				<td>src</td>
				<td><input type="text" name="src"></td>
			</tr>
			<tr>
				<td>alt</td>
				<td><input type="text" name="alt"></td>
			</tr>
			<tr>
				<td>type</td>
				<td><input type="text" name="type"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Create" name="create">
				</td>
			</tr>
		</table>
	</form>
	<h3>Read</h3>
	<form action="adminBanners.php" method="POST">
		<select name="id">
			<?php
				$banners = $cb->actionControl('selectAll');
				foreach($banners as $banner){
					echo '<option value="'.$banner->getId().'">'.$banner->getTitle().'</option>';
				}
			?>
		</select>
		<input type="submit" value="Read" name="read">
	</form>
	<?php
		if(isset($_POST['read'])){
			$id = $_POST['id'];
			$banner->setId($id);
			$escolhido = $cb->actionControl('selectOne', $banner);
			$escolhido = $escolhido[0];
	?>
	<h3>Update</h3>
	<form action="processaFormBanners.php" method="POST">
		<table>
			<tr>
				<td>title</td>
				<td><input type="text" name="" value="<?php echo $escolhido['title'] ?>"></td>
			</tr>
			<tr>
				<td>description</td>
				<td><input type="text" name="" value="<?php echo $escolhido['description'] ?>"></td>
			</tr>
			<tr>
				<td>href</td>
				<td><input type="text" name="" value="<?php echo $escolhido['href'] ?>"></td>
			</tr>
			<tr>
				<td>src</td>
				<td><input type="text" name="" value="<?php echo $escolhido['src'] ?>"></td>
			</tr>
			<tr>
				<td>alt</td>
				<td><input type="text" name="" value="<?php echo $escolhido['alt'] ?>"></td>
			</tr>
			<tr>
				<td>type</td>
				<td><input type="text" name="" value="<?php echo $escolhido['type'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Update" name="update">
				</td>
			</tr>
		</table>
	</form>
	<?php
		}
	?>
	<h3>Delete</h3>
	<form action="processaFormBanners.php" method="POST">
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
		<input type="submit" value="Delete" name="delete">
	</form>
</body>
</html>