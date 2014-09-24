<?php

$requires = array(
    'controllers/banners.control.php',
    'models/banners.model.php'
);

foreach($requires as $require){
    require_once '../../'.$require;
}

$bc = new ControllerBanners();
$banners = $bc->actionControl('selectAll');

?>
<html>
    <head>
        <title> Lista de Links e Banners </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <table cellspacing="5px">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Link</th>
            <th>Imagem</th>
            <th>Legenda</th>
            <th>Ação</th>
        </tr>
        <?php
        
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        
        foreach($banners as $banner):
        
        ?>
        <tr>
            <td><?php echo $banner->getId();?></td>
            <td><?php echo $banner->getTitle();?></td>
            <td><?php echo $banner->getDescription();?></td>
            <td><?php echo $banner->getHref();?></td>
            <td><?php echo $banner->getSrc();?></td>
            <td><?php echo $banner->getAlt();?></td>
        </tr>
        <?php endforeach; ?>
        </table>
        Paginação:
        <?php
            for($i = 1; $i <= 10; $i++){
                if($i == $page){
                    echo $i.', ';
                }
                else{
                    echo '<a href="?page='.$i.'">'.$i.'</a>';
                    if($i < 10){
                        echo ', ';
                    }
                }
            }
        ?>
    </body>
</html>