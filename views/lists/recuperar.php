<?php
	include_once("../parts/header.php");
    include ("../../packages/database/config.php");
	include ("../../packages/database/database.class.php");


   if(isset($_POST['botao'])){

  	   $db = new Includes\Db();
	    $lines = $db->row('SELECT * FROM user WHERE email = :email', array(
			'email' => $_POST['email'],
		));
	
if($lines['email'] <> '' ){
	$senhaRecuperada = $lines['hash'];

	$email = $lines['email'];
  $msg = "
              <h2 style='font-family:Verdana;'>Recuperação de Senha</h2><br/>
              <div style='Verdana; font-size:10pt;'>
                       Sua senha é: <span style='font-weight: bold;' $senhaRecuperada</span>
              </div>";

$mensagem = $msg;
$destinatario = $email;
$assunto = "Recuperação de senha IFRS BG";
$headers = "Bcc: [email]pa.guido@hotmail.com[/email]";

ini_set('sendmail_from', 'pa.guido@hotmail.com');
mail($destinatario, $assunto, $mensagem, $headers);

}else{
  echo "Não Consta na base de dados";

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