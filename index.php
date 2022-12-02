
<?php 

//TELA PRINCIPAL
include("general_functions.php");
//insereLog ( $id_user, '$nome', 'Pesquisa de usuarios', 'consultando', 'algo' );

?>

<div class="content well pull-left span12">
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: VR Mobile ::.</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800" rel="stylesheet">
    <style>
        
/*        body, html {margin: 0px;min-height: 100%;background: url(img/background.jpg) no-repeat; background-size: 100%;background-position: center center;}*/
        
        body {
            margin: 0px;
            font-family: 'Montserrat', sans-serif;
              background: url(img/background.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
        .box-topo {
            width: 1000px;
            margin: 20px auto;
        }
        
        .box-content {
            width: 1000px;
            height: 550px;
            background: url(img/card.png) no-repeat right top;
            margin: auto;
        }
        
        .box-text {
            width: 340px;
            color: #FFF;
/*            text-align: justify;*/
/*            display: inline-block;*/
        }
        
        h1 {font-size: 36px; font-weight: 600;color: #FFF;line-height: 38px}
        
        h1::after {
            content: "NÃO É PLANO DE SAÚDE";
            width: 320px;
            font-size: 24px;
            font-weight: 800;
            color: #d87345;
            padding: 10px;
            margin: 10px 0px;
            display: block;
            background: #e3d14c;
        }
        
        p {font-size: 14px;}
        
        .button {
            width: 210px;
            margin: 20px;
            font-size: 26px;
            color: #FFF;
            background: #82b441;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 3px 3px rgba(0,0,0,0.2);
        }
        
        .button:hover {
            background: #77a738;
            -webkit-transition: all .35s ease;
            -moz-transition: all .35s ease;
            -ms-transition: all .35s ease;
            transition: all .35s ease;
        }
        
        a {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="box-topo">
        <img src="img/logo1.png">
    </div>
    <div class="box-content">
        <div class="box-text">
            <h1>O CARTÃO DE <br>DESCONTO<br> DA SAÚDE DE <br> LIMEIRA</h1>
        </div>
        <br><a href="login/index.php"><div class="button">Faça seu login</div></a>        
    </div>
</body>
</html>
</div>

<?php include("base.php"); ?>
