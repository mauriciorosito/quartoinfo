<?php
include_once("../../models/course.model.php");
include_once("../../models/user.model.php");
include_once("../../controllers/course.control.php");
include_once("../../controllers/user.control.php");

require_once('../../system/limited.php');

$cc = new ControllerCourse();
$arrayCursos = $cc->actionControl("selectAll");

if (isset($_GET["action"], $_GET["idUser"])) {
    if ($_GET["action"] == "delete") {
        $user = new User();
        $user->setIdUser($_GET["idUser"]);
        $cu = new ControllerUser();
        $cu->actionControl($_GET["action"], $user);
        header("location: ../lists/user.list.php?msg=Ação realizada com sucesso!");
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
        $user->setRegistration($user->getRegistration());
        $user->setAbout($user->getAbout());
    }
}

if (isset($_POST["action"])) {
    $user = new User();
    $user->setIdUser($_POST["idUser"]);
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
    $result = $cu->actionControl($_POST["action"], $user);

    if ($_POST["action"] == "insert" && ($result == false)) {
        header("location: ../lists/user.list.php?msg=O login ou o e-mail já existem cadastrados.");
    } else {
        header("location: ../lists/user.list.php?msg=Ação realizada com sucesso!");
    }


    //echo "<script>$('#ol-caminho').html('Cadastro Realizado com Sucesso !!!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="publics/imgs/logo.png">

        <title>Informática</title>

        <!-- Bootstrap core CSS -->
        <link href="../../publics/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../../publics/css/small-business.css" rel="stylesheet">
        <link rel="stylesheet" href="../../publics/css/craftyslide.css" />
        <link type="text/css" rel="stylesheet" href="../../publics/css/rhinoslider-1.05.css" />
        <link rel="stylesheet" type="text/css" href="../../packages/wysiwyg/src/bootstrap-wysihtml5.css" />
        <link type="text/css" rel="stylesheet" href="../../packages/wysiwyg/lib/css/jasny-bootstrap.min.css" />	


        <script src="../../packages/wysiwyg/lib/js/wysihtml5-0.3.0.js"></script>
        <script src="../../packages/wysiwyg/lib/js/jquery-1.7.2.min.js"></script>
        <script src="../../packages/wysiwyg/lib/js/bootstrap.min.js"></script>
        <script src="../../packages/wysiwyg/lib/js/jasny-bootstrap.min.js"></script>
        <script src="../../packages/wysiwyg/src/bootstrap3-wysihtml5.js"></script>

    </head>

    <body>

        <?php include_once '../parts/navigation_admin.php'; ?>

        <div id="content">
            <div class="container img-rounded BVerde">
                <br/>
                <form action="user.form.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php
                    if (isset($_GET["action"])) {
                        echo $_GET["action"];
                    }
                    ?>">
                    <input type="hidden" name="idUser" value="<?php
                    if (isset($_GET["idUser"])) {
                        echo $_GET["idUser"];
                    }
                    ?>">
                    <input type="hidden" name="canReceiveContent" value="0">

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Nome: </p>
                            <input type="text" name="name" class="form-control" value="<?php
                            if (isset($user) && $user->getName() != "") {
                                echo $user->getName();
                            }
                            ?>" required><br/>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Login: </p>
                            <input type="text" name="login" class="form-control" value="<?php
                            if (isset($user) && $user->getLogin() != "") {
                                echo $user->getLogin();
                            }
                            ?>" required  <?php
                                   if ($_GET["action"] == "update") {
                                       echo "readonly";
                                   }
                                   ?>><br/>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Email: </p>
                            <input type="email" name="email" class="form-control" value="<?php
                            if (isset($user) && $user->getEmail() != "") {
                                echo $user->getEmail();
                            }
                            ?>" required  <?php
                                   if ($_GET["action"] == "update") {
                                       echo "readonly";
                                   }
                            ?>><br/>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Curso: </p>
                            <select class="form-control" name="idCourse">
                                <?php
                                foreach ($arrayCursos as $curso) {
                                    echo "<option value='" . $curso->getIdCourse() . "'>" . $curso->getName() . "</option>";
                                }
                                ?>
                            </select><br/>
                        </div>

                        <?php if ($_GET["action"] != "update") { ?>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <p>Senha: </p>
                                <input type="password" name="hash" class="form-control"  value="" required /><br/>
                            </div>
                            <?php } ?>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Número da matrícula: </p>
                            <input type="text" name="registration" class="form-control" value="<?php
                            if (isset($user) && $user->getRegistration() != "") {
                                echo $user->getRegistration();
                            }
                            ?>" required><br/>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Pergunta para a Recuperação de Senha: </p>
                            <input type="text" name="reminder" class="form-control"  value="<?php
                            if (isset($user) && $user->getReminder() != "") {
                                echo $user->getReminder();
                            }
                            ?>" required><br/>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p>Resposta para a Recuperação de Senha: </p>
                            <input type="text" name="reminderResponse" class="form-control"  value="<?php
                            if (isset($user) && $user->getReminderResponse() != "") {
                                echo $user->getReminderResponse();
                            }
                            ?>" required><br/>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p>Sobre: </p>
                            <textarea name="about" value="" class="textarea form-control" placeholder="Enter text ..." rows="5"> <?php
                            if (isset($user) && $user->getAbout() != "") {
                                echo $user->getAbout();
                            }
                            ?> </textarea>
                        </div>
                    </div>
                    <br/>
                    <?php
                    if (isset($_GET["action"])) {
                        if (ucwords($_GET["action"]) == "Insert") {
                            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-ok-circle'></i>&nbsp;Cadastrar</button>";
                        } elseif (ucwords($_GET["action"]) == "Update") {
                            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-ok-circle'></i>&nbsp;Salvar</button>";
                        } else {
                            echo "<button class='btn btn-default' type='submit' name='button'><i class='glyphicon glyphicon-trash'></i>&nbsp;Excluir</button>";
                        }
                    }
                    ?>
                    <button class="btn btn-default" type="reset" name="reset"><i class="glyphicon glyphicon-repeat"></i>&nbsp;Limpar Campos</button>
                    <br>
                    <br>
                </form>

                <script type="text/javascript">
                    $('.textarea').wysihtml5();
                </script>

                <script type="text/javascript" charset="utf-8">
                    $(prettyPrint);
                </script>
            </div>
        </div>


        <!-- JavaScript -->
        <script src="publics/js/jquery-1.10.2.js"></script>
        <script src="publics/js/bootstrap.js"></script>
        <script src="publics/js/craftyslide.js"></script>
        <script src="publics/js/script.js"></script>
        <script type="text/javascript" src="publics/js/rhinoslider-1.05.js"></script>
        <script type="text/javascript" src="publics/js/mousewheel.js"></script>
        <script type="text/javascript" src="publics/js/easing.js"></script>

    </body>

</html>