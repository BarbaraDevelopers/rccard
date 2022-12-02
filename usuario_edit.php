<?php

//ALTERAÇÃO DE USUARIO 2° TELA

include_once('general_functions.php');
session_start();

 if (isset($_POST['id']))
 {

 	$id = $_POST['id'];
 	echo " . ". $id;
	     $_SESSION['retorno_altera'] = updateUsuario($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['dataNasc'],$_POST['cpf'],$_POST['senha']);
 }

?>