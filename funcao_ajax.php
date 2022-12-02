function recuperardados() {
	
	var nome = document.form.nome.value;
	var ajax = new AJAX();
	ajax.Updater("listar.php?digito="+nome,"conteudo","get","carregando os dados...");
} 