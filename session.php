<?php 

	session_start();

	if(!isset($_SESSION['id'])){
		redirect();
		addMessage('error', 'Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar este recurso');
		die();
	}

	//include('access.php');

	if ( ($_SESSION['papel'] !== 'administrador') && ($_SESSION['papel'] !== 'convidado')) {
		if (!hasAccess($_SESSION['papel'])){
			include_once('general_functions.php');
			$con = dbConnect();
			logErrorOp($con);
			addMessage('error', 'Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar este recurso, se este erro persistir contate o administrador do sistema');
			redirectHome();
			die();
		}
	}

	function denyAndDestroy(){
		session_destroy();
		redirect();
	}

	function redirect(){
		header("Location: login/index.php");
		echo "<script> window.location.replace('login/index.php') </script>";
	}

	function redirectHome(){
		if(!isset($_SESSION['papel'])){
			session_destroy();
		}
	
		header("Location: index.php");
		echo "<script> window.location.replace('index.php') </script>";
	}

	function addMessage($class,$text){
		$_SESSION['flashMessage'][]=array("text" => $text, "class" => $class);
	}
	
?>