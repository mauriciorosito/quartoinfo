<?php
include_once("../parts/header.php");
include ("../../packages/database/config.php");
include ("../../packages/database/database.class.php");
include ("../../controllers/user.control.php");
require ("../../packages/PHPMailer/PHPMailerAutoload.php");

/* checar usuario no bd COM PDO
  caso for cadastrado,  gerar senha aleatoria
  enviar no email(selecionar um)
  subsituitr senha no banco */

if (isset($_POST['botao'])) {
    $controllerUser = new ControllerUser();

    $user = new User();

    $user = $controllerUser->actionControl('checkEmail', $_POST['email']);

    if ($user->getIdUser()) {
        $new_password = $controllerUser->actionControl('generatePassword');
        $u = new User();
        $u->setIdUser($user->getIdUser());
        $u->setHash($new_password);
        $controllerUser->actionControl('updatePassword', $u);
       

        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'quartoinfosuporte@gmail.com';                 // SMTP username
        $mail->Password = '4infosuporte';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = 587;

        $mail->From = $_POST['email'];
        $mail->addAddress('quartoinfosuporte@gmail.com');     // Add a recipient
        $mail->addBCC('quartoinfosuporte@gmail.com');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Email de recuperação de senha';
        $mail->Body = 'A sua senha é:' . $new_password;

        if (!$mail->send()) {
            echo 'A mensagem não pôde ser enviada, tente novamente mais tarde.';
        } else {
            echo 'A recuperacao de senha foi enviada com sucesso!';
        }
    } else {
        echo "Este e-mail não existe!";
    }
}
?>

<meta charset="utf-8">

<!--	<div style="margin-left: 11.5%">-->
<div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >

    <div id="conteudo" class="well" align="center" style="margin:0px 0px;">	


        <h4 align="center">Trocar a senha</h4>	
        <p>Identifique-se para receber um e-mail com uma nova senha.</p>
        <fieldset style="width:50%;" >

            <form class="form-horizontal" action="recuperar.php" method="post" style="margin-top:25px" role="form">


                <div class="form-group" style="width:auto;">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" style="width: 280px; height: 40px;">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" name="botao" style="margin-left:-150px;" class="btn btn-default">Recuperar senha</button>

                    </div>
                </div>
            </form>
        </fieldset>
    </div>


    <?php
    include_once("../parts/footer.php");
    ?>