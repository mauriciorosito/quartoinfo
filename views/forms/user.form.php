<?php
include_once("../parts/header.php");
?>

<hr class="BVerde">
<!-- contentE -->

<?php
include_once("../../models/course.model.php");
include_once("../../models/user.model.php");
include_once("../../controllers/course.control.php");
include_once("../../controllers/user.control.php");

/* echo "<pre>";
  print_r($_SESSION);
  die; */

$cc = new ControllerCourse();
$arrayCursos = $cc->actionControl("selectAll");

if (isset($_GET["action"], $_GET["idUser"])) {
    if ($_GET["action"] == "delete") {
        $user = new User();
        $user->setIdUser($_GET["idUser"]);
        $cu = new ControllerUser();
        $cu->actionControl($_GET["action"], $user);
        header("location: ../lists/login.php");
    } else {
        $user = new User();
        $user->setIdUser($_GET["idUser"]);
        $cu = new ControllerUser();
        $user = $cu->actionControl("selectOne", $user);
    }

    if ($_GET["action"] == "update") {
        $user = new User();
        $user->setIdUser($_GET["idUser"]);
        $cu = new ControllerUser();
        $user = $cu->actionControl("selectOne", $user);
        $user->setIdProfile($user->getIdProfile());
        $user->setIdCourse($user->getIdCourse());
        $user->setEmail($user->getEmail());
        $user->setLogin($user->getLogin());
        $user->setHash($user->getHash());
        $user->setReminder($user->getReminder());
        $user->setReminderResponse($user->getReminderResponse());
        $user->setCanReceiveContent($user->getCanReceiveContent());
        $user->setName($user->getName());
        $user->setRegistration($user->getRagistration());
        $user->setAbout($user->getAbout());
    }
}

if (isset($_POST["action"])) {
    $user = new User();
    $user->setIdProfile(2);
    $user->setIdCourse($_POST["idCourse"]);
    $user->setEmail($_POST["email"]);
    $user->setLogin($_POST["login"]);
    $user->setHash($_POST["hash"]);
    $user->setReminder($_POST["reminder"]);
    $user->setReminderResponse($_POST["reminderResponse"]);
    $user->setCanReceiveContent($_POST["canReceiveContent"]);
    $user->setName($_POST["name"]);
    $user->setRegistration($_POST["registration"]);
    $user->setAbout($_POST["about"]);
    $cu = new ControllerUser();
    $cu->actionControl($_POST["action"], $user);

    header("location: ../lists/student.list.php");
}
?>
<form action="user.form.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php
    if (isset($_GET["action"])) {
        echo $_GET["action"];
    }
    ?>">
    <input type="hidden" name="idContent" value="<?php
    if (isset($_GET["idContent"])) {
        echo $_GET["idContent"];
    }
    ?>">
    <input type="hidden" name="canReceiveContent" value="0">
    <table style="width:100%;padding:10px;">
        <tr>
            <td>Nome: <input type="text" name="name" class="form-control" value="<?php
                if (isset($user) && $user->getName() != "") {
                    echo $user->getName();
                }
                ?>"><br></td>
            <td>Login: <input type="text" name="login" class="form-control" value="<?php
                if (isset($user) && $user->getLogin() != "") {
                    echo $user->getLogin();
                }
                ?>"><br></td>
        </tr>
        <tr>
            <td>Email: <input type="text" name="email" class="form-control" value="<?php
                if (isset($user) && $user->getEmail() != "") {
                    echo $user->getEmail();
                }
                ?>"><br></td>
            <td>Curso: 
                <select class="form-control" name="idCourse">
                    <?php
                    foreach ($arrayCursos as $curso) {
                        echo "<option value='" . $curso->getIdCourse() . "'>" . $curso->getName() . "</option>";
                    }
                    ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>Senha:<input type="password" name="hash" class="form-control"  value=""><br></td>
            <td>Número da matrícula: <input type="text" name="registration" class="form-control" value="<?php
                if (isset($user) && $user->getRegistration() != "") {
                    echo $user->getRegistration();
                }
                ?>"><br></td>			
        </tr>
        <tr>
            <td>Pergunta para a Recuperação de Senha:<input type="etxt" name="reminder" class="form-control"  value="<?php
                if (isset($user) && $user->getReminder() != "") {
                    echo $user->getReminder();
                }
                ?>"><br></td>
            <td>Resposta para a Recuperação de Senha:<input type="etxt" name="reminderResponse" class="form-control"  value="<?php
                if (isset($user) && $user->getReminderResponse() != "") {
                    echo $user->getReminderResponse();
                }
                ?>"><br></td>			
        </tr>
        <tr>
            <td colspan=2>Sobre: <textarea name="about" value="" class="textarea form-control" placeholder="Enter text ..." style="width: 810px; height: 200px"> <?php
                    if (isset($user) && $user->getAbout() != "") {
                        echo $user->getAbout();
                    }
                    ?> </textarea><br></td>
        </tr>

    </table>
    <input type="submit" name="button" value="<?php
    if (isset($_GET["action"])) {
        echo ucwords($_GET["action"]);
    }
    ?>"><br>
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
        <p><b>IFRS - Curso Técnino de Informática para Internet - Câmpus Bento Gonçalves</b></p>
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
