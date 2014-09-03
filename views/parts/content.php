<?php
include_once("../../controllers/content.control.php");
require_once("../../packages/system/functions.model.php");
$controllerContent = new ControllerContent();
if(!isset($_POST['pesquisa'])) $contents = $controllerContent->actionControl('selectAllEvents');

if(isset($_POST['page'])) $page = $_POST['page'];
else $page = 1;
if(isset($_POST["submit"])) {
        if(isset($_POST["pesquisa"])) {
                $pesquisa = new functions();

                $resultados = ($pesquisa->searchAll($_POST["pesquisa"], $page));
        }
}
?>
<table class="table table-striped table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Autor</th>
                            <th>Fonte</th>
                            <th>Título</th>
                            <th>Texto</th>
                            <th>Descrição</th>
                            <th>Data de publicação</th>
                            <th>Data de expiração</th>
                            <th>Tipo</th>
                            <th>Categorias</th>
                            <th>Mídias</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody data-link="row" class="rowlink">
                        <?php
                        if(!isset($_POST['pesquisa'])) {
                        foreach ($contents as $content) {
                            ?>
                            <tr>
                                <td><a href="#"><?php echo $content->getIdContent(); ?></a></td>
                                <td><?php echo $content->getPublisher(); ?></td>
                                <td><?php echo $content->getSource(); ?></td>
                                <td><?php echo $content->getTitle(); ?></td>
                                <td><?php echo $content->getText(); ?></td>
                                <td><?php echo $content->getDescription(); ?></td>
                                <td><?php echo $content->getPostDate(); ?></th>
                                <td><?php echo $content->getExpirationDate(); ?></td>
                                <td><?php echo $content->getType(); ?></td>
                                <td><?php
                        foreach ($content->get_Category() as $category) {
                            echo $category->getIdCategory() . '<br>';
                        }
                            ?></td>
                                <td><?php
                                    foreach ($content->get_Medias() as $media) {
                                        if ($media->getIsMain())
                                            echo "<b><em>" . $media->getIdMedia() . '</em></b><br>';
                                        else
                                            echo $media->getIdMedia() . '<br>';
                                    }
                                    ?></td>
                                <td><a href="../forms/content.form.php?action=update&idContent=<?php echo $content->getIdContent(); ?> " class="btn btn-default">Editar</a> <a href="../forms/content.form.php?action=delete&idContent=<?php echo $content->getIdContent(); ?>" class="btn btn-default">Excluir</a></td>	
                                <?php
                            }} else {
                                if(isset($resultados)){
								foreach($resultados as $resultado){
						?>
						<tr>
							<td><?php echo $resultado["publisher"]; ?></td>
							<td><?php echo $resultado["source"]; ?></td>
							<td><?php echo $resultado["title"]; ?></td>
							<td><?php echo $resultado["text"]; ?></td>
                                                        <td><?php echo $resultado["description"]; ?></td>
                                                        <td><?php echo $resultado["postDate"]; ?></td>
                                                        <td><?php echo $resultado["expirationDate"]; ?></td>
                                                        <td><?php echo $resultado["type"]; ?></td>
						</tr>
						<?php
								}
                            }}
						?>		
                        </tr>
                    </tbody>
</table>
                
