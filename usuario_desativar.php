<?php

//DESATIVA USUARIO

	include_once('general_functions.php');
	desativarUsuario($_POST['id']);
	addMessage('info','Usuario desativado com sucesso');
	$page = '';
	if (isset($_POST['page'])){
		$page = '?page='.$_POST['page'];
	}
	header('Location: usuario.php'.$page);

?>

<script>
	
	$(document).ready(function() {

		function desativarUsuario() {
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
					var tableCliente = '';
						tableCliente += '<tr ><th id="tbd" class="">' + response['id'] + '</th>';
						tableCliente += '</tr>';
						$('#tbd').html(tableCliente);
					},
				timeout: 1800000
			});
			var tot_itens = totaisRegistrosCompletao();
			paginar(40);
		}

		desativarUsuario();
	});

</script>