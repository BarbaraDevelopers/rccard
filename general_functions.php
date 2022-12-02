<?php

//ARQUIVO QUE CONTEM AS FUNÇÕES

include('db_functions.php');
$criaConexao = Conectar();

   //CONVERSOR DE DATA
   function ConverteDatas($data_errada){

      //$data_corrigida = date('d-m-Y', $data_errada);
       $data_corrigida = new DateTime($data_errada);
       return $data_corrigida->format('Y-m-d');
     //return $data_corrigida ;

   }    

   //CONVERSOR DE DATA
   function getAge($birthDate){ 

      $data_nasc = explode('-',$birthDate);
      $ano = $data_nasc[0];
      $mes = $data_nasc[1];
      $dia = $data_nasc[2];
      $hoje = getdate();
      $idade = $hoje['year'] - $ano;

      if ($hoje['mon'] < $mes || ($hoje['mon'] == $mes && $hoje['mday'] < $dia)) {
           $idade -= 1;
      }
       
      if($idade>0){

         return $idade." anos"; 

       }
         else {

         $idadeM = $hoje['mon']-$mes;

         if($hoje['mday'] <$dia){
            $idadeM -=1;
         }

         if($idadeM>0){
            return $idadeM." mes(es)";

         }
            else{

               $nasc = mktime(0, 0, 0, $mes, $dia, $ano);
               $hoje = mktime(0, 0, 0, $hoje['mon'],$hoje['mday'],$hoje['year']);
               $diferenca = $hoje-$nasc;
               $idadeD = (int)floor( $diferenca / (60 * 60 * 24));
               return $idadeD." dia(s)";
            }
       }
   }

   //ATIVA USUÁRIO
   function ativarUsuario($user_id){
      global $criaConexao;
      $query = "UPDATE usuarios SET ativo='1' where id='$user_id'";
      $result = mysqli_query($criaConexao,$query);
      if(!$result){
         sqlError($criaConexao,$query,array('User Id' => $user_id));
      }else{
         sqlLog($criaConexao,$query,array('User Id' => $user_id));
      }
      return $result;
   }

   //DESATIVA USUÁRIO
   function desativarUsuario($user_id){

      global $criaConexao;
      $query = "UPDATE usuarios SET ativo='0' where id='$user_id'";
      $result = mysqli_query($criaConexao,$query);
      if(!$result){

         sqlError($criaConexao,$query,array('User Id' => $user_id));
      }else{
         sqlLog($criaConexao,$query,array('User Id' => $user_id));
      }
      return $result;
   }

   //DELETA USUÁRIO
   function deletarUsuario($user_id){

      global $criaConexao;
      $query = "DELETE from usuarios where id='$user_id'";
      $result = mysqli_query($criaConexao,$query);
      if(!$result){
         sqlError($criaConexao,$query,array('User Id' => $user_id));
      }else{
         sqlLog($criaConexao,$query,array('User Id' => $user_id));
      }
      return $result;
   }

   //EXIBE A LISTA DE USUARIOS (USUARIO.PHP)
   function findUsuarioConsulta(){

      global $criaConexao;

      $query = "SELECT * FROM usuarios ORDER BY nome ASC, ativo DESC";
      $data=array();
      if ($result = mysqli_query($criaConexao,$query)) {
         while($row = mysqli_fetch_assoc($result)){
            $data[]= $row;
         }
      }
      return $data;
      echo $data;
   }

   //BUSCA OS USUARIOS DA BUSCA (LISTAR.PHP)
   function busca($param){

      global $criaConexao;
      $query = "SELECT * FROM usuarios WHERE nome like '$param%' ORDER BY nome ASC, ativo DESC";
      //$query = "SELECT * FROM usuarios WHERE nome like '$param%' OR cpf like '$param%' ORDER BY ativo DESC, nome ASC";
      $result = mysqli_query($criaConexao,$query);
      return $result;
   
   }

   //VERIFICA EMAIL E SENHA NO INDEX.PHP
  function getUsuarioByEmail($email,$minha_senha){ 

      global $criaConexao;
      $query = "SELECT id, papel from usuarios where email = '$email' AND senha= '$minha_senha'";
      $result = mysqli_query($criaConexao,$query);

      $codigo_usuario= mysqli_fetch_row($result); 

      //$_SESSION['papel_usuario'] = $papel;

      $_SESSION['papel_usuario'] = $codigo_usuario[1];

      $identifica_usuario = $codigo_usuario[0];
      return $identifica_usuario;
   }

   //EXIBE USUARIO DA TELA (USUARIO_ALTERA.PHP)
   function getUsuario($id){

      global $criaConexao;

      $query = "SELECT * from usuarios where id = '$id'";
      $result = mysqli_query($criaConexao,$query);
      return mysqli_fetch_assoc($result);
   }

   //EXIBE USUARIO (LOGIN/LOGIN.PHP)
   function getUsuarioGeral($id){

      global $criaConexao;

      $query = "SELECT * from usuarios where id = '$id'";
      $result = mysqli_query($criaConexao,$query);
      return mysqli_fetch_assoc($result);
   }

    //INSERE NOVOS USUARIOS
   function insertUser($nome,$dataNasc,$email,$senha,$cpf){

      global $criaConexao;

      $result_usuario = "INSERT INTO usuarios (nome,dataNasc,email,senha,troca_senha,papel,ativo,cpf)VALUES('$nome','$dataNasc','$email','$senha','0','funcionario','1','$cpf')";

      $resultado_usuario = mysqli_query($criaConexao, $result_usuario);

      if($result_usuario){
           header("Location: usuario_novo.php");
           return true;
      }
        else
        {
           header("Location: usuario_novo.php");
           return false;
        }
   }

   //GRAVA AÇÃO DO USUARIO
   function insereLog($iduser, $nome, $tela, $acao, $resumo){

      global $criaConexao;

      $query_inserir_log = "INSERT INTO projeto_logs (id_user, nome, tela, acao, resumo, dt, hora) VALUES( $iduser, '$nome','$tela','$acao','$resumo', Date(),Now())";

      $registra_log = mysqli_query($criaConexao, $query_inserir_log);

   }

   //Função para salvar mensagens de LOG no MySQL. Se a mensagem foi salva ou não (true/false)
   function acaoResumo($id_user,$nome,$tela,$acao,$resumo,$data,$hora,$redirect=true){

      global $criaConexao;

      $query = "INSERT INTO acao_resumo (id_user,nome,tela,acao,resumo,data,hora) VALUES ('$id_user','$nome','$tela','$acao','$resumo', Date('Y-m-d') ,NOW())";

      $result = mysqli_query($criaConexao,$query);      

      if($redirect){
         //header("Location:index.php");
      }
   }

   //ALTERA DADOS DO USUARIO (USUARIO_EDIT.PHP / USUARIO_ALTERA.PHP)
   function updateUsuario($id,$nome,$email,$dataNasc,$cpf,$senha){

      global $criaConexao;

      $query = "UPDATE usuarios SET nome='$nome', email='$email', dataNasc='$dataNasc', cpf='$cpf',senha = MD5('$senha') where id='$id'";

      $result = mysqli_query($criaConexao,$query);

      if($result){

      header("Location: usuario.php");
         return true;
      }
      else
      {
        header("Location: usuario_altera.php");
         return false;
      }
   }

   //ALTERA SENHA DO USUARIO (TROCA_SENHA.PHP)
   function updateUsuarioPassword($email,$nova_senha,$cpf){ //TROCA SENHA

      global $criaConexao;

      $query = "UPDATE usuarios SET senha=MD5('$nova_senha') where email='$email' and cpf='$cpf'";
      $result = mysqli_query($criaConexao,$query);
      if($result){

         header("Location: index.php");
         return true;
      }
      else
      {
         header("Location: troca_senha.php");
         return false;
      }
   }

   //LOGS
   function sqlLog ($ts1, $ts2, $ts3){
      echo "oi";
   }

   function sqlError ($ts1, $ts2, $ts3){
      echo "oi";
   }

   function addMessage ($ts1, $ts2){
      echo "oi";
   }


?>