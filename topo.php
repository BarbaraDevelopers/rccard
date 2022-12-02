
<!--TELA QUE CONTEM OS LAYOUTS E MENUS FIXOS-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>.:: VR MOBILE ::.</title>
  <link href="estilo.css" rel="stylesheet" type="text/css" />
  <link href="font/stylesheet.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="favicon.ico" />
  <script src="js/jquery.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="span12 top">
        <div class="logo pull-left">
          <!--a href="usuario.php?ipp=10&page=&isbsc=1&bsc="><img width='220' src="img/card.png"></a-->
          <a href="http://127.0.0.1/projeto"><img width='220' src="img/card.png"></a>
        </div>
        <div class="user pull-right">
          <div class="btn-group pull-right">
              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user"></i> <?//=$_SESSION['nome']?>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="login/logout.php"><i class="icon-signout"></i>&nbsp;Sair</a>
                  <a href="login/index.php" class="link servicos-login-link"><div>&nbsp;Login</div></a>
                  <?//php if($_SESSION['papel_usuario'] === 'administrador'):?>
                    <a href="usuario_novo.php" class="link servicos-login-link"><div>&nbsp;Novo Usuário</div></a>
                  <?//php endif;?>
                </li>
              </ul>
          </div>          
        </div>
      </div>
<div class="fix">
<div class="main">
<div class="teste">
  </div>
</div>
<script>
  $(function(){

  $(".servicos-login-link").on('click',function(){
      window.open('./login','_self');
    });
  
    $(".servicos-login-submit").on('click',function(){
      console.log("teste");

      var form = $("#servicos-login-form");
      form.attr('action',$(".servicos-unidade-select").val()+'/login.php');
      form.submit();

    })
  });
</script>