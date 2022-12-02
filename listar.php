<?php

//LISTA OS USUARIOS DIGITADOS NA BUSCA - FUNÇÃO FEITA EM AJAX PARA ESTUDO
include("general_functions.php");
include('paginator_busca.php');

$isbsc = isset($_GET['isbsc']) ? $_GET['isbsc'] : 1;
$ipp = isset($_GET['ipp']) ? $_GET['ipp'] : 1;
$busc =  isset($_GET['bsc']) ? $_GET['bsc'] : $_GET['bsc'];
$pagee = isset($_GET['page']) ? $_GET['page'] : 1;

echo "VOCE PESQUISOU POR : " . $busc . "<br/><br/>";

//$busc = $_GET['bsc'] = 'bar';

//$ipp = $_GET['ipp'];
$page  =  $_GET['page'];
$retorno = busca($busc);
$ret_auxiliar = mysqli_fetch_array($retorno);
$qtde = mysqli_num_rows($retorno);
//$pagee = isset($_GET['page']) ? $_GET['page'] : 5;
$data = Array();

while ($row = mysqli_fetch_array($retorno)) {
	$data[] = $row;
}
$usuariosPag = getPageElements_busca($data, $pagee, 10);

if( $qtde > 0 ){

foreach ($usuariosPag as $usuari) :

?>
<tr class="<?php echo $usuari['ativo']; ?>" data-name="<?php echo $usuari['nome']; ?>" data-id="<?php echo $usuari['id']; ?> ">
	<td data-title="ID"><?php echo $usuari['id'] /*. ' - ' . $qtde*/;  ?></td>
	<td data-title="Nome"><?php echo ($usuari['nome']); ?></td>
	<td id="inputCPF" data-title="CPF"><?php echo  $usuari['cpf']; ?></td>
	<td data-title="Data de Nascimento"><?php echo date('d/m/Y', strtotime($usuari['dataNasc'])); ?></td>
	<td data-title="E-mail"><?php echo $usuari['email']; ?></td>
	<td>
		<div class="btn-group pull-right">
			<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-wrench"></i> Op&ccedil;&otilde;es
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">

				<li><a href="javascript:postar('usuario_novo.php',<?php echo $usuari['id']; ?>);"><i class="icon-large icon-fixed-width icon-edit"></i> Adicionar</a></li>
				<li><a href="javascript:postar('usuario_altera.php',<?php echo $usuari['id']; ?>);"><i class="icon-large icon-fixed-width icon-edit"></i> Editar</a></li>

				<?php if ($usuari['ativo'] == 0) : ?>
					<li class="enable-usuari"><a href="javascript:postar('usuario_ativar.php',<?php echo $usuari['id'] ?>);" onclick="return false;"> <i class="icon-large icon-fixed-width icon-ok-circle"></i> Ativar</a></li>
				<?php endif; ?>
				<?php if ($usuari['ativo'] == 1) : ?>
					<li class="disable-usuari"><a href="javascript:postar('usuario_desativar.php',<?php echo $usuari['id']; ?>);"><i class="icon-large icon-fixed-width icon-remove-circle"></i> Desativar</a></li>
				<?php endif; ?>

				<li class="disconnect-usuari"><a href="javascript:postar('usuario_remover.php',<?php echo $usuari['id']; ?>);"><i class="icon-large icon-fixed-width icon-ban-circle"></i>Remover</a></li>
			</ul>
		</div>
	</td>
</tr>
	 
<?php
	endforeach; } echo "----" . printPaginator_busca($data, $pagee, 10); echo '-';
?>