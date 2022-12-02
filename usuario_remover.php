<?php

//REMOVE USUARIO

	include_once('general_functions.php');
	deletarUsuario($_POST['id']);
	addMessage('info','usuario removido com sucesso');
	$page = '';

	if (isset($_POST['page'])){
		$page = '?page='.$_POST['page'];
	}
	header('Location: usuario.php'.$page);

?>