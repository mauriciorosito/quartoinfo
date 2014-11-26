<?php
include_once("../parts/header.php");
?>

<hr class="BVerde">
<!-- contentE -->

<?php
include_once("../../models/course.model.php");
//include_once("../../models/user.model.php");
include_once("../../controllers/course.control.php");
//include_once("../../controllers/user.control.php");

/* echo "<pre>";
  print_r($_SESSION);
  die; */

require_once('../../system/limited.php');

$cc = new ControllerCourse();
$arrayCursos = $cc->actionControl("selectAll");



if (isset($_GET["action"], $_GET["idCourse"])) {
    if ($_GET["action"] == "delete") {
        $course = new Course();
        $course->setIdCourse($_GET["idCourse"]);
        $cc = new ControllerCourse();
        $cc->actionControl($_GET["action"], $course);
        header("location: ../lists/course.list.php");
    } else {
        $course = new Course();
        $course->setIdCourse($_GET["idCourse"]);
        $cc = new ControllerCourse();
        $course = $cc->actionControl("selectOne", $course);
    }
}

if (isset($_POST["action"])) {
    $course = new Course();
    $course->setIdCourse($_POST["idCourse"]);
    $course->setName($_POST["name"]);
    $course->setDescription($_POST["description"]);
    $course->setType($_POST["type"]);
    $course->setAlias($_POST["alias"]);
    
    $cc = new ControllerCourse();
   
        
    try {
        $cc->actionControl($_POST["action"], $course);
        header("location: ../lists/course.list.php?msg=Cadastro realizado com sucesso!");
    } catch (PDOException $course) {
        header("location: ../lists/course.list.php?msg=Curso já existe!");
    } 
}
?>
<form action="course.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php
    if (isset($_GET["action"])) {
        echo $_GET["action"];
    }
    ?>">
    <input type="hidden" name="idCourse" value="<?php
    if (isset($_GET["idCourse"])) {
        echo $_GET["idCourse"];
    }
    ?>">
    <input type="hidden" name="canReceiveContent" value="0">
    <table style="width:100%;padding:10px;">
        <tr>
            <td>Nome*: <input type="text" name="name" class="form-control" value="<?php
                if (isset($course) && $course->getName() != "") {
                    echo $course->getName();
                }
                ?>" required><br></td>
            <td>Alias*: <input type="text" name="alias" class="form-control" value="<?php
                if (isset($course) && $course->getAlias() != "") {
                    echo $course->getAlias();
                }
                ?>" required><br></td>
        </tr>
        <tr>
            <td>Tipo*: 
                <select class="form-control" name="type" required>
                    <option value=''></option>
                    <option value='E' <?php if (isset($course) && $course->getType() == "E") {
                    echo 'selected';
                } ?>>EAD</option>
                    <option value='S' <?php if (isset($course) && $course->getType() == "S") {
                    echo 'selected';
                } ?>>Superior</option>
                    <option value='T' <?php if (isset($course) && $course->getType() == "T") {
                    echo 'selected';
                } ?>>Técnico</option>
                </select><br>
            </td>
            

        </tr>
        
            <td colspan=2>Descrição: <textarea name="description"  class="textarea form-control"  style="width: 810px; height: 200px" > <?php
                    if (isset($course) && $course->getDescription() != "") {
                        echo $course->getDescription();
                    }
                    ?> </textarea><br></td>
          
        </tr>
        <tr> <td> <h6>* Campos Obrigatórios<h6> <br></td></tr>
    </table>
    <?php
    if (isset($_GET["action"])) {
        if (ucwords($_GET["action"]) == "Insert") {
            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-ok-circle'></i>&nbsp;Cadastrar</button>";
        } elseif (ucwords($_GET["action"]) == "update") {
            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-trash'></i>&nbsp;Excluir</button>";
        } else {
            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-ok-circle'></i>&nbsp;Salvar</button>";
            
        }
    }
    ?>
    <button class="btn btn-default" type="reset" name="reset"><i class="glyphicon glyphicon-repeat"></i>&nbsp;Limpar Campos</button>
    <br>

</form>

<script type="text/javascript">
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>



<!-- FIM DO contentE-->
<hr  class="BVerde">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
        <a href="../../system/logout.php" class="btn"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Sair</a>
        <p><b>IFRS - Curso Técnico de Informática para Internet - Câmpus Bento Gonçalves</b></p>
        <p>Avenida Osvaldo Aranha, 540 | Bairro Juventude da Enologia | CEP: 95700-000 | Bento Gonçalves/RS</p>
        <p>E-mail: mauricio.rosito@bento.ifrs.edu.br | Telefone: (54) 3455-3200: Ramal 207 | Fax: (54) 3455-3246</p>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pull-right">
        <a href="#content"><span class="glyphicon glyphicon-arrow-up"></span>Topo</a>
    </div>
</div>
</footer>

</div>
</div>
</div>
</div>
</div>
<!-- /.container -->
</div>
<!-- /#content -->
<!-- JavaScript -->


<script src="../../publics/js/jquery-1.10.2.js"></script>
<!--script src="../../publics/js/bootstrap.js"></script-->
<script src="../../publics/js/craftyslide.js"></script>
<script src="../../publics/js/script.js"></script>
<script type="text/javascript" src="../../publics/js/rhinoslider-1.05.js"></script>
<script type="text/javascript" src="../../publics/js/mousewheel.js"></script>
<script type="text/javascript" src="../../publics/js/easing.js"></script>
</body>

</html>