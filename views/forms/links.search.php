<?php
require_once '../../controllers/links.control.php';
$lc = new ControllerLinks();
$linkss = $lc->search($_GET['pesquisa']);
?>
<table>
<tr>
    <th>Id</th>
    <th>Título</th>
    <th>Descrição</th>
    <th>Link</th>
</tr>
<?php foreach($links as $link): ?>
<tr>
    <td><?php echo $link->getId();?></td>
    <td><?php echo $link->getTitle();?></td>
    <td><?php echo $link->getDescription();?></td>
    <td><?php echo $link->getUrl();?></td>
    <td>
        <a href="../forms/links.form.php?action=update&id=<?php echo $link->getId(); ?>"> Alterar </a>
        <a href="../forms/links.form.php?action=delete&id=<?php echo $link->getId(); ?>"> Deletar </a>
    </td> 
</tr>
<?php endforeach; ?>
</table>