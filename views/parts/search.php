<?php
require_once("../../packages/system/functions.model.php");
require_once("../../controllers/content.control.php");
$controllerContent = new ControllerContent();

if (isset($_POST['page']))
    $page = $_POST['page'];
else
    $page = 1;
if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "Pesquisar") {
        if (isset($_POST["pesquisa"])) {
            $pesquisa = new functions();
            if (isset($_POST['intervalo'])) {
                $data = date('Y-m-d', strtotime($_POST['intervalo']));
                $data2 = date('Y-m-d');
            }

            $resultados = ($pesquisa->search($_POST["tipo"], $_POST["pesquisa"], $page, null, $data, $data2));
        }
    } else {
        if (isset($_POST["pesquisa"])) {
            $pesquisa = new functions();

            $resultados = ($pesquisa->searchAll($_POST["pesquisa"], $page));
        }
    }
}
?>
<thead>
    <tr>
        <th>Data de publicação</th>
        <th>Tipo</th>
        <th>Título</th>
        <th>Descrição</th>
    </tr>
</thead>
<tbody data-link="row" class="rowlink">				
    <?php
    if (isset($resultados)) {
        foreach ($resultados as $resultado) {
            ?>
            <tr>
                <td><?php echo $resultado["postDate"]; ?></td>
                <td><?php echo $resultado["type"]; ?></td>
                <td><?php echo $resultado["title"]; ?></td>
                <td><?php echo $resultado["description"]; ?></td>
            </tr>
            <?php
        }
    }
    ?>
</tbody>
