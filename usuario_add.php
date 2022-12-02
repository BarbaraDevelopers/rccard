<?php 

//FUNÇÃO DO USUARIO_NOVO.PHP 

      session_start();
      include("general_functions.php");

      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
      $dataNasc = ConverteDatas ($_POST['dataNasc']);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
      $senha = md5($senha);
      $troca_senha = filter_input(INPUT_POST, 'troca_senha', FILTER_SANITIZE_STRING);
      $papel = filter_input(INPUT_POST, 'papel', FILTER_SANITIZE_STRING);
      $ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING);
      $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

      $result_usuario = insertUser ($nome,$dataNasc,$email,$senha,$cpf);

      if($result_usuario == true) {

        header("Location: usuario.php");

        $_SESSION['foiInserido'] = true;
      }
        else
      {
          header("Location: usuario_novo.php");
          $_SESSION['foiInserido'] = false;

      }

?>

<script type="text/javascript">

  $(document).ready(function() {
  
    function incluiCliente(busca){
    $('#darthvader').val('');
      $.ajax( {
        url: "http://127.0.0.1:3000/clientes/$_id=?&_sort=nome&_order=cresc",
        dataType: "json",
        async: true,
        type: "POST",
        crossDomain: true,
        headers: {
          "Accept": "application/json",
          "Content-Type": "application/json"
        },
        success: function(response) {
        var msg = JSON.stringify(response);
        var tableCliente = '';
        for (i = 0; i <= 100; i++) {
          tableCliente += '<tr ><th id="tbd" class="">' + response[i]['id'] + '</th>';
            tableCliente += '<td class="">' + response[i]['nome'] + '</td>';
            tableCliente += '<td class="">' + response[i]['cpf'] + '</td>';
            tableCliente += '<td class="">' + response[i]['dataNasc'] + '</td>';
            tableCliente += '<td class="">' + response[i]['email'] + '</td>';
            tableCliente += '</tr>';

          $('#tbd').html(tableCliente);
        }
        Paginar(true);
      },
        timeout: 1800000
      });      
    }
    incluiCliente(1);
  }
  
</script>