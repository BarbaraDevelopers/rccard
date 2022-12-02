
<?php 

// CADASTRO NOVO USUARIO

 	session_start();
	include("topo.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"> 

<head>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico" />
	<meta http-equiv="Access-Control-Allow-Origin" content="www.google.com" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>.: VR Mobile :.</title>

	<link href="css/bootstrap-cabiimp.css"                                    						rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-select.css"                                     						rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.css"                                 						rel="stylesheet" type="text/css" />
	<link href="css/jquery.ui.timepicker.css"                                 						rel="stylesheet" type="text/css" />
	<link href="css/style.css"                                                						rel="stylesheet" type="text/css" />
	<link href="estilo.css"                                                   						rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.css"                                         						rel="stylesheet" type="text/css" />
	<link href="css/datepicker.css"                                           						rel="stylesheet" type="text/css" />
	<link href="css/fullcalendar.css"                                         						rel="stylesheet" type="text/css" />
	<link href="font/stylesheet.css"                                          						rel="stylesheet" type="text/css" />
	<link href="fancybox/jquery.fancybox-1.3.4.css"                           						rel="stylesheet" type="text/css" media="screen" />
	<link href="css/smoothness/jquery-ui-1.10.3.custom.css"                   						rel="stylesheet" type="text/css" />
	<script src="js/jquery.js"                           											type="text/javascript"></script>
	<script src="js/bootstrap.js"                        											type="text/javascript"></script>
	<script src="js/bootstrap-select.js"                 											type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js"             											type="text/javascript"></script>
	<script src="js/bootbox.js"                          											type="text/javascript"></script>
	<script src="js/jquery-ui.js"                       											type="text/javascript"></script>
	<script src="js/jquery.ui.timepicker.js"             											type="text/javascript"></script>
	<script src="js/jquery.qtip.js"                      											type="text/javascript"></script>
	<script src="js/meio.mask.js"                        											type="text/javascript"></script>
	<script src="js/fullcalendar.js"                     											type="text/javascript"></script>
	<script src="js/functions.js"                        											type="text/javascript"></script>
	<script src="fancybox/jquery.fancybox-1.3.4.pack.js" 											type="text/javascript"></script>
	<script src="fancybox/jquery.easing-1.3.pack.js"    											type="text/javascript"></script>
  	<script src="js/bootstrap-datepicker.min.js"         											type="text/javascript"></script>
  	<script src="js/bootstrap-datepicker.pt-BR.min.js"   											type="text/javascript"></script>
  	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
</head>
<div class="content well pull-left span12">
	<h3 class="span8 no-margin-left">Cadastrar Usuário</h3><br>
	<ul class="dropdown-menu">
		<li>
			<a href="./login/logout.php"><i class="icon-signout"></i>&nbsp;Sair</a>
			<a href="login/index.php" class="link servicos-login-link"><div >Login</div></a>
		</li>
	</ul>
	<div class="span12">

		<?php if(isset($errorString)):?>
			<div class="alert alert-error text-center">
				<?=$errorString?>
			</div>
		<?php endif;?>

		<form method="POST" action="usuario_add.php">
			<div class="row">
				<div class="span6" >	
					<?php
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>
					<div class="control-group <?=isset($error['nome'])?'error':null?>">
						<label class="control-label" for="inputNome"><b>*Nome Completo:</b><p></p></label>
						<div class="controls">
							<input type="text" id="inputNome" required="required" class="span3" name="nome" placeholder="Digite o nome completo">
							<span class="help-inline"><?=isset($error['nome'])?$error['nome']:null?></span>
						</div>
					</div>

					<div class="control-group <?=isset($error['dataNasc'])?'error':null?>">
						<label class="control-label" for="inputDataNasc"><b>*Data de Nascimento</b><p></p></label>
						<div class="controls">
							<input type="date" id="inputDataNasc" required="required" name="dataNasc" class="pull-left span2 date-picker">
							<span class="help-inline"><?=isset($error['dataNasc'])?$error['dataNasc']:null?></span>
						</div>
					</div>

					<div class="control-group <?=isset($error['cpf'])?'error':null?>">
						<label class="control-label" for="inputCPF"><b>*CPF</b><p></p></label>
						<div class="controls">
							<input type="text" id="inputCPF" required="required" class="span2" name="cpf" placeholder="Digite o seu CPF">
							<span class="help-inline"><?=isset($error['cpf'])?$error['cpf']:null?></span>
						</div>
					</div>

					<div class="control-group <?=isset($error['email'])?'error':null?>">
						<label class="control-label" for="inputEmail"><b>*E-mail:</b><p></p></label>
						<div class="controls">
							<input type="email" id="inputEmail" required="required" class="span3" name="email" placeholder="Digite o seu melhor e-mail">
							<span class="help-inline"><?=isset($error['email'])?$error['email']:null?></span>
						</div>
					</div>

					<div class="control-group <?=isset($error['senha'])?'error':null?>">
						<label class="control-label" for="inputSenha"><b>*Senha:</b><p></p></label>
						<div class="controls">
							<input type="password" id="inputSenha" required="required" class="span3" name="senha" placeholder="Digite a sua senha">
							<span class="help-inline"><?=isset($error['senha'])?$error['senha']:null?></span>
						</div>
					</div>
					
					<input class="buttons" name="btn_cadastro" type="submit" value="Cadastrar">				
				</div>
			</div>
		</form>
	</div>
</div>

<?php include("base.php"); ?>
