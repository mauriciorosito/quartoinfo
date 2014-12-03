<?php
require_once '../../controllers/banners.control.php';
$bc = new ControllerBanners();
$banners = $bc->search($_GET['pesquisa']);
?>
<table>
<tr>
    <th>Id</th>
    <th>Título</th>
    <th>Descrição</th>
    <th>Link</th>
    <th>Imagem</th>
    <th>Legenda</th>
    <th>Ação</th>
</tr>
<?php foreach($banners as $banner): ?>
<tr>
    <td><?php echo $banner->getId();?></td>
    <td><?php echo $banner->getTitle();?></td>
    <td><?php echo $banner->getDescription();?></td>
    <td><?php echo $banner->getHref();?></td>
    <td><?php echo $banner->getSrc();?></td>
    <td><?php echo $banner->getAlt();?></td>
    <td>
        <a href="../forms/banners.form.php?action=update&id=<?php echo $banner->getId(); ?>"> Alterar </a>
        <a href="../forms/banners.form.php?action=delete&id=<?php echo $banner->getId(); ?>"> Deletar </a>
    </td> 
</tr>
<?php endforeach; ?>
</table>