<?php 

//ALTERAÇÃO DE USUARIO 1° TELA

	session_start();
	include("topo.php");
	include("general_functions.php");

	$id = $_GET['id'];

	echo $id;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"> 

<head>
	<link rel="icon" type="image/x-icon" href="img/favicon.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>.: VR Mobile :.</title>
	<link href="css/bootstrap-cabiimp.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<div class="content well pull-left span12">

	<h3 class="span4 no-margin-left">Alterar Usuário</h3><br>

	<div class="row">
		<div class="span12">

			<form id="usuario_register" class="form-horizontal" method="get" action="usuario_edit.php">
				<input type="hidden" name="id" value="<?=$usuario['id']?>" id="id">

				<div class="control-group">
					<label class="control-label" for="inputNome"><b>*Código</b><p></p></label>
					<div class="controls">
						<input type="text" id="inputNome" class="span4" class="inputNome" value="<?=$usuario['id']?>" required="required" name="id">
					</div>
				</div>
		
				<div class="control-group">
					<label class="control-label" for="inputNome"><b>*Nome Completo:</b><p></p></label>
					<div class="controls">
						<input type="text" id="inputNome" class="span4" class="inputNome" required="required" name="nome" placeholder="Insira o nome completo do usuario">
					</div>
				</div>	

				<div class="control-group">
					<label class="control-label" for="inputDataNasc"><b>*Data de Nascimento</b><p></p></label>
					<div class="controls">
						<input type="date" id="inputDataNasc" class="inputDataNasc" required="required" name="dataNasc" class="pull-left span2" class="pull-left span2 date-picker">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputCPF"><b>*CPF</b><p></p></label>
					<div class="controls">
						<input type="text" id="inputCPF" class="inputCPF" class="span2" required="required" name="cpf" placeholder="   .   .   -  ">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputEmail"><b>*E-mail:</b><p></p></label>
					<div class="controls">
						<input type="text" id="inputEmail" class="inputEmail" required="required" name="email" class="span4" placeholder="email">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputSenha"><b>*Senha:</b><p></p></label>
					<div class="controls">
						<input type="password" id="inputSenha" class="inputSenha" required="required" class="span3" name="senha" placeholder="Digite a sua senha">
					</div>
				</div>
				
				<div class="controls">
					<input type="submit" name="usuario_altera" class="btn btn-primary" value="Salvar">	
					<input type="button" class="btn btn-primary" value="Retornar" onclick="document.location.href='usuario.php'"></br>					
				</div>	
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {

		function editarUsuario(id) {
			var id = response[i]['id'];

			$.ajax({
				url: "http://127.0.0.1:3000/clientes/" + id + " ",
				dataType: "json",
				async: true,
				type: "PUT",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},

			});
		}
	}
	
</script>

