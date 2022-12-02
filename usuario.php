<?php
//TELA DE EXIBIÇÃO DOS USUARIOS
session_start();
include("topo.php");
include("general_functions.php");
if (isset($_GET['isbsc'])) {
	include('paginator_busca.php');
} else {
	include('paginator.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">

<head>
	<link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
	<meta http-equiv="Access-Control-Allow-Origin" content="www.google.com" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>.: VR Mobile :.</title>
	<link href="css/bootstrap-cabiimp.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-select.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/jquery.ui.timepicker.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
	<link href="css/fullcalendar.css" rel="stylesheet" type="text/css" />
	<link href="font/stylesheet.css" rel="stylesheet" type="text/css" />
	<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap-select.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="js/bootbox.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>
	<script src="js/jquery.ui.timepicker.js" type="text/javascript"></script>
	<script src="js/jquery.qtip.js" type="text/javascript"></script>
	<script src="js/meio.mask.js" type="text/javascript"></script>
	<script src="js/fullcalendar.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
	<script src="fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
	<script src="fancybox/jquery.easing-1.3.pack.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js" />
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<?php
//MENSAGEM DE RETORNO
if (isset($_SESSION['retorno_altera'])) {
	if ($_SESSION['retorno_altera'] == true) {
		echo '<div id="div_sucesso">Seus dados foram alterados.</div>';
	} else {
		echo '<div id="div_error">Seus dados não pode ser alterado.</div>';
	}
}
if (isset($_SESSION['foiInserido'])) {
	if ($_SESSION['foiInserido'] == true) {
		echo '<div id="div_sucessonovo">Usuário cadastrado com sucesso.</div>';
	} else {
		echo '<div id="div_errornovo">Usuário não foi cadastrado com sucesso.</div>';
	}
}
?>
<div class="content well pull-left">
	<div class="row">
		<div class="span3">
			<h3>Clientes</h3>
		</div>
		<div class="span9">
			<form class="form-search margin-top">
				<div class="input-append">
					<input autofocus type="text" class="span5" id="campo" placeholder="Nome" />
					<!--button class="btn btn-primary" type="submit"><i class="icon-search"></i> Buscar</button-->
				</div>
			</form>
		</div>
	</div>
	<div id="darthvader_api">
		<div id="novos_botoes" class="span12"></div>
	</div>
	<div class="row">
		<div class="span12" id="sp12">
			<form id="form1" name="form1" class="form-horizontal" method="post" action="">
				<input type="hidden" name="id" id="id" value="">
			</form>
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Data Nascimento</th>
					<th>E-mail</th>
					<th></th>
				</thead>
				<tbody id="tbd">
				</tbody>
			</table>
		</div>
	</div>
	<div id="darthvader_api">
		<div id="novos_botoes" class="span12"></div>
	</div>
	<!--div id="top" onclick="toTop()" class="span4"><img src="to_top.png" alt="no pic"/> Voltar ao topo </div-->
</div>

<script>
	$(document).ready(function() {
		qtsEncontrados = 0;

		// EVENTOS E ELEMENTOS RELACIONADOS AO PESQUISAR E PAGINAR DOS CLIENTES 
		$(document).on('click', '.bots', function() {
			var pagina = $(this).val();
			alteraPagina(pagina);
		})

		$('#campo').keyup('on', function() {
			$('#novos_botoes').val('');

			qtdeAchados($('#campo').val());
			procura($('#campo').val(), qtsEncontrados);
		});

		//Função do botao Toggle ON/OFF
		$(document).ready(function() {
			$('.switch').click(function() {
				$(this).toggleClass("switchOn");

				carregaPagina(pagina);
				qtdeAchados(pagina);
				alteraPagina(pagina);
				procura(pagina);
				paginar(pagina);
				totaisRegistrosCompletao(pagina);
				editarInfomacoes(pagina);
			});
		});

		// QUANDO A PÁGINA É ABERTA ELE CHAMA ESSA FUNÇÃO E COMO É JAVASCRIPT, ELE EXECUTA E PARA... ATÉ QUE SEJA DADO OUTRA ORDEM 
		function carregaPagina() {
			$.ajax({
				url: "http://127.0.0.1:3000/clientes/?_page=1&_limit=10&_sort=id&_order=asc",
				dataType: "json",
				async: false,
				type: "GET",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
				success: function(response) {
					var msg = JSON.stringify(response, 1);
					var i = 1;
					var tableCliente = '';
					for (i = 0; i <= 9; i++) {
						tableCliente += '<tr ><th id="tbd" class="">' + response[i]['id'] + '</th>';
						tableCliente += '<td class="">' + response[i]['nome'] + '</td>';
						tableCliente += '<td class="">' + response[i]['cpf'] + '</td>';
						tableCliente += '<td class="">' + response[i]['dataNasc'] + '</td>';
						tableCliente += '<td class="">' + response[i]['email'] + '</td>';

						var ativo = response[i]['ativo'];

						if (ativo == "1") {
							tableCliente += '<td class=""><div class="wrapper" value="' + response[i]['ativo'] + '"><label><div class="switch switchOn"></div></label></div></td>';
						} else if (ativo == "0") {
							tableCliente += '<td class=""><div class="wrapper" value="' + response[i]['ativo'] + '"><label><div class="switch"></div></label></div></td>';
						}

						//---------------- EDIT ----------------//

						//tableCliente += '<td class=""><a href="usuario_altera.php" value="'+ response[i]['id'] +'" class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></a></td>';

						tableCliente += '<td class=""><a href="usuario_altera.php?id="' + response[i]['id'] + '" " class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></a></td>';

						console.log(id);

						//tableCliente += '<td class=""><span value="'+ response[i]['id'] +'" class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></span></td>';

						//---------------- DELETE ----------------//

						//do jeito que disse pra mim que queria fazer 
						tableCliente += '<td class=""><span value="' + response[i]['id'] + '" class="deleteUsuario"><div class="icon-large icon-fixed-width icon-remove-circle" align="center"></div></span></td>';

						// do seu jeito que escreveu mas não foi o que  me falou, o que pensou
						//tableCliente += '<td class=""><a href="javascript:excluipessoa(" value="'+ response[i]['id'] +') " class="deleteUsuario"><div class="icon-large icon-fixed-width icon-remove-circle" align="center"></div></a></td>';

						tableCliente += '</tr>';
						$('#tbd').html(tableCliente);

					}
				},
				timeout: 1800000
			});
			var tot_itens = totaisRegistrosCompletao();
			paginar(40);
		}

		// QUANDO ABRE A PÁGINA E ELE VERIFICA QUE TERMINOU O CARREGAMENTO PELO ON READY, ELE CHAMA A FUNÇÃO PARA TRAZER OS RESULTADOS INICIAIS SEM PESQUISA ALGUMA
		carregaPagina();

		// ESSA FUNÇÃO FAZ A CONTAGEM DOS ITENS PARA PODER GERAR OS BOTÕES DA PAGINAÇÃO EM CIMA DA QUANTIDADE DE ITENS ENCONTRADOS
		function qtdeAchados(busca) {
			var qts_achous = 0;
			$.ajax({
				url: "http://127.0.0.1:3000/clientes?nome_like=" + busca + "&_sort=id&_order=asc",
				dataType: "json",
				async: true,
				type: "GET",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
				success: function(response) {

					var msg = JSON.stringify(response, 1);
					var qts_achous = response.length;
					console.log('Registros - quantos encontrou : ' + qts_achous);
					qtsEncontrados = qts_achous;
				},
				timeout: 180
			});
		}

		// FUNÇÃO PARA ALTERAR AS PÁGINAS EM CIMA DO QUE ESTÁ SENDO PROCURADO E DA QUANTIDADE DE PÁGINAS CRIADAS.
		// ELE VERIFICA A SITUAÇÃO DO CAMPO DE BUSCA PRA SABER SE ESTÁ SENDO PESQUISADO ALGO OU SÓ ABERTO A  PÁGINAS
		// OU ATÉ MESMO A SITUAÇÃO DA PESSOA APAGAR TUDO QUE ESTAVA SENDO PESQUISADO 
		function alteraPagina(page = 1) {

			var conteudo_campo_busca = $('#campo').val();
			if (conteudo_campo_busca == '') {
				url_complementar = page + "&_limit=10&_sort=id&_order=asc";
			} else {
				url_complementar = page + "&_limit=10&nome_like=" + conteudo_campo_busca + "&_sort=id&_order=asc";
			}

			$('#darthvader_api').val('');
			$.ajax({
				url: "http://127.0.0.1:3000/clientes/?_page=" + url_complementar,
				dataType: "json",
				async: true,
				type: "GET",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
				success: function(response) {
					var msg = JSON.stringify(response, 1);
					var i = 1;
					var tableCliente = '';
					for (i = 0; i <= 100; i++) {
						tableCliente += '<tr ><th id="tbd" class="">' + response[i]['id'] + '</th>';
						tableCliente += '<td class="">' + response[i]['nome'] + '</td>';
						tableCliente += '<td class="">' + response[i]['cpf'] + '</td>';
						tableCliente += '<td class="">' + response[i]['dataNasc'] + '</td>';
						tableCliente += '<td class="">' + response[i]['email'] + '</td>';

						var ativo = response[i]['ativo'];

						if (ativo == "1") {
							tableCliente += '<td class=""><div class="wrapper" value="' + response[i]['ativo'] + '"><label><div class="switch switchOn"></div></label></div></td>';
						} else if (ativo == "0") {
							tableCliente += '<td class=""><div class="wrapper" value="' + response[i]['ativo'] + '"><label><div class="switch"></div></label></div></td>';
						}

						//---------------- EDIT ----------------//

						tableCliente += '<td class=""><a href="usuario_altera.php" value="' + response[i]['id'] + '" class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></a></td>';

						//tableCliente += '<td class=""><span value="'+ response[i]['id'] +'" class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></span></td>';

						//---------------- DELETE ----------------//

						//do jeito que disse pra mim que queria fazer 
						tableCliente += '<td class=""><span value="' + response[i]['id'] + '" class="deleteUsuario"><div class="icon-large icon-fixed-width icon-remove-circle" align="center"></div></span></td>';

						// do seu jeito que escreveu mas não foi o que  me falou, o que pensou
						//tableCliente += '<td class=""><a href="javascript:excluipessoa(" value="'+ response[i]['id'] +') " class="deleteUsuario"><div class="icon-large icon-fixed-width icon-remove-circle" align="center"></div></a></td>';

						tableCliente += '</tr>';
						$('#tbd').html(tableCliente);
					}
					paginar(true, response);
				},
				timeout: 1800000
			});
		}

		// RESPONSÁVEL PELA procura DOS ITENS, CONFORME VC VAI DIGITANDO NO CAMPO DE BUSCA ELE VAI FAZENDO OS PROCEDIMENTOS
		// E CHAMANDO AS FUNÇÕES NECESSÁRIAS PARA TODO O ECO-SISTEMA FUNCIONAR DE FORMA CORRETA.
		function procura(busca) {
			var pagina = 1;
			$.ajax({
				url: "http://127.0.0.1:3000/clientes?_page=" + pagina + "&_limit=10&nome_like=" + busca + "&_sort=id&_order=asc",
				dataType: "json",
				async: true,
				type: "GET",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
				success: function(response) {

					$('#novos_botoes').empty();
					var msg = JSON.stringify(response, 1);

					paginar(qtsEncontrados);
					var i = 1;
					$('#tbd').empty();
					var botaoOpcoes = $("#botaoOpcoes");
					var tableCliente = '';
					if ((qtsEncontrados > 0)) {

						for (i = 0; i <= qtsEncontrados; i++) {
							tableCliente += '<tr ><th id="tbd" class="">' + response[i]['id'] + '</th>';
							tableCliente += '<td class="">' + response[i]['nome'] + '</td>';
							tableCliente += '<td class="">' + response[i]['cpf'] + '</td>';
							tableCliente += '<td class="">' + response[i]['dataNasc'] + '</td>';
							tableCliente += '<td class="">' + response[i]['email'] + '</td>';

							var ativo = response[i]['ativo'];

							if (ativo == "1") {
								tableCliente += '<td class=""><div class="wrapper" value="' + response[i]['ativo'] + '"><label><div class="switch switchOn"></div></label></div></td>';
							} else if (ativo == "0") {
								tableCliente += '<td class=""><div class="wrapper" value="' + response[i]['ativo'] + '"><label><div class="switch"></div></label></div></td>';
							}

							//---------------- EDIT ----------------//

							//tableCliente += '<td class=""><a href="usuario_altera.php" value="'+ response[i]['id'] +'" class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></a></td>';

							tableCliente += '<td class=""><a href="usuario_altera.php?id="' + response[i]['id'] + '" " class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></a></td>';

							//tableCliente += '<td class=""><span value="'+ response[i]['id'] +'" class="editarUsuario"><div class="icon-large icon-fixed-width icon-edit" align="center"></div></span></td>';

							//---------------- DELETE ----------------//

							//do jeito que disse pra mim que queria fazer 
							tableCliente += '<td class=""><span value="' + response[i]['id'] + '" class="deleteUsuario"><div class="icon-large icon-fixed-width icon-remove-circle" align="center"></div></span></td>';

							// do seu jeito que escreveu mas não foi o que  me falou, o que pensou
							//tableCliente += '<td class=""><a href="javascript:excluipessoa(" value="'+ response[i]['id'] +') " class="deleteUsuario"><div class="icon-large icon-fixed-width icon-remove-circle" align="center"></div></a></td>';

							tableCliente += '</tr>';
							$('#tbd').html(tableCliente);
						}
					}
				},
				timeout: 18000
			});
		}

		function paginar(total_itens) {

			var qtde_registros = total_itens; // totais_registros();
			console.log('registros para paginar ' + total_itens);

			if (qtde_registros % 10 == 0) { //Retorna verdadeiro caso o primeiro valor seja igual ao segundo.
				qts_itens = qtde_registros;
			} else {
				qts_itens = (qtde_registros + 10 - (qtde_registros % 10));
			}
			var a = 1;
			for (a = 1; a <= qts_itens / 10; a++) {
				$('#novos_botoes').append('<button class=bots value=' + a + ' > ' + a + '</button>'); //exibindo os botões	 
				console.log('CRIANDO BOTÕES ');
			}
		}

		function totaisRegistrosCompletao() {

			var quantidade = 0;

			$.ajax({
				url: "http://127.0.0.1:3000/qtde_registros",
				dataType: "json",
				async: true,
				type: "GET",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
				success: function(response) {
					var resp = JSON.stringify(response);
					quantidade = response['total'];
				},

				timeout: 18000
			});

			return quantidade;
		}

		function editarInfomacoes() {

			var qts_achous = 0;
            
			$.ajax({
				url: "http://127.0.0.1:3000/clientes?nome_like=" + busca + "&_sort=id&_order=asc",
				dataType: "json",
				async: true,
				type: "GET",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
				success: function(response) {

					var msg = JSON.stringify(response, 1);
					var qts_achous = response.length;
					console.log('Registros - quantos encontrou : ' + qts_achous);
					qtsEncontrados = qts_achous;
				},

				timeout: 180
			});
		}

		/*function expessoa(id) { 

			$.ajax({
				url: "http://127.0.0.1:3000/clientes/id=" + id + " ",
				dataType: "json",
				async: true, 
				type: "DELETE",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},

			});
		}*/

		$('.deleteUsuario').on('click', function() {

			var id = $(this).attr('value');
			//PELO THIS AQUI, ELE FAZ A MÁGICA E SABE QUEM CLICOU NELE... AO CONTRÁRIO DA OUTRA QUE VC PRECISA INFORMAR PELO PARAMETRO

			$.ajax({

				url: "http://127.0.0.1:3000/clientes/" + id + "",
				dataType: "json",
				async: false,
				type: "DELETE",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
			});

			bootbox.confirm("ATEN&Ccedil;&Atilde;O!!! Voc&ecirc; tem certeza que deseja remover este usuario? Esta opera&ccedil;&atilde;o n&atilde;o poder&aacute; ser desfeita!!!", "N&atilde;o", "Sim", function(confirmed) {
				if (confirmed) {
					location.reload();
				}
			});
		});

		$('.editarUsuario').on('click', function() {

			var id = $(this).attr('value');

			$.ajax({

				url: "http://127.0.0.1:3000/clientes/" + id + "",
				dataType: "json",
				async: false,
				type: "PUT",
				crossDomain: true,
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json"
				},
			});
			location.reload();
		});

		$('.enable-usuario').on('click', function(e) {
			e.preventDefault();
			var location = $(this).find('a').attr('href');
			bootbox.confirm("Voc&ecirc; tem certeza que deseja ativar este usuario?", "N&atilde;o", "Sim", function(confirmed) {
				if (confirmed) {
					window.location.replace(location);
				}
			});
		});
		$('.disable-usuario').on('click', function(e) {
			e.preventDefault();
			var location = $(this).find('a').attr('href');
			bootbox.confirm("Voc&ecirc; tem certeza que deseja desativar este usuario?", "N&atilde;o", "Sim", function(confirmed) {
				if (confirmed) {
					window.location.replace(location);
				}
			});
		});
		$('.delete-usuario').on('click', function(e) {
			e.preventDefault();
			var location = $(this).find('a').attr('href');
			bootbox.confirm("ATEN&Ccedil;&Atilde;O!!! Voc&ecirc; tem certeza que deseja remover este usuario? Esta opera&ccedil;&atilde;o n&atilde;o poder&aacute; ser desfeita!!!", "N&atilde;o", "Sim", function(confirmed) {
				if (confirmed) {
					window.location.replace(location);
				}
			});
		});

		$('.toggle-info').popover({
			'html': true,
			'placement': 'left'
		}).click(function(ev) {
			$('.toggle-info').not(this).popover('hide');
		});

		function postar(caminho, id) {
			document.form1.action = caminho;
			document.form1.id.value = id;
			document.form1.submit();
		}
		//Função de voltar ao topo
		$("#top").hide();
		$(function toTop() {
			$(window).scroll(function() {
				if ($(this).scrollTop() > 100) {
					$('#top').fadeIn();
				} else {
					$('#top').fadeOut();
				}
			});
			$('#top').click(function() {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
	});
</script>