<?php
include_once("../parts/header.php");
include_once('../../controllers/user.control.php');
$mensagem = '';
if (isset($_POST['submit'])) {

    $user = new user();
    $user->setHash($_POST['hash']);
    $user->setEmail($_POST['email']);
    $cu = new ControllerUser();
    if (!$cu->checkLogin($user)) {
        $mensagem = 'O seu login e senha são inválidos';
    }
}
?>
<meta charset="utf-8">

<!--	<div style="margin-left: 11.5%">-->
<div id="body" class="col-lg-12 col-md-12 col-sm-12 col-xs-15 pull-right" >

    <div id="conteudo" class="well" align="center" style="margin:0px 0px;">	


        <h4 align="center">Faça seu login:</h4>						
        <fieldset style="width:50%;" >

            <form method="post"  class="form-horizontal" style="margin-top:25px" role="form">


                <div class="form-group" style="width:auto;">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputEmail3"  name="email" placeholder="Email" style="width: 280px; height: 40px;">
                    </div>
                </div>
                <div class="form-group" style="width:auto;">
                    <label for="inputPassword3" class="col-sm-3 control-label">Senha</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword3" name="hash" placeholder="Password" style="width: 280px; height: 40px;">
                    </div>
                </div>
                <div class="form-group" style="width:auto;">
                    <div class="col-sm-offset-3 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><span style="float: left;">Mantenha-me conectado</span>
                                <a style="float: left; margin-left: -20px;" href="recuperar.php">Esqueci minha senha</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" style="margin-left:-210px;" class="btn btn-default" name="submit">Entrar</button>

                    </div>
                </div>
            </form>
        </fieldset>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <footer>
            <hr class="BVerde" >
            <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="align:center;">
                    <p><b>IFRS - Curso Têcnino de Informática para Internet - Câmpus Bento Gonçalves</b></p>
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
<!-- /.container -->
</div>
<!-- /#content -->


<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/craftyslide.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/rhinoslider-1.05.js"></script>
<script type="text/javascript" src="js/mousewheel.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

</body>

</html>
