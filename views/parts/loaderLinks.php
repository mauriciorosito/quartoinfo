<?php
    require_once '../../controllers/links.control.php';
    $cl = new ControllerLinks();
    if(!isset($_POST['page'])){
        $page = 1;
    }
    else{
        $page = $_POST['page'];
    }
    $links = $cl->actionControl('selectAll', $page);
    if(isset($_GET['ordem'])){
        if($_GET['ordem'] == 'c'){
            asort($links);
        }
        elseif($_GET['ordem'] == 'd'){
            arsort($links);
        }
    }
?>
<tr>
    <th>Id</th>
    <th>Título</th>
    <th>Descrição</th>
    <th>Link</th>
    <th>Ação</th>
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

