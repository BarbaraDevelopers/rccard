<?php

function Conectar(){

$ondeEstou = 2;

//echo $ondeEstou;

switch($ondeEstou){

    case 1: 
//ADIB 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "barbie";
$_SESSION['path_projeto'] = 'barbie/';
//Cria a conexao


break;
case 2:
    //BARBARA

    $servidor = "localhost";
    $usuario = "root";
    $senha = "root";
    $dbname = "vrmobile";
    $_SESSION['path_projeto'] = 'projeto/';


    break;
}

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
return $conn;


}

?>