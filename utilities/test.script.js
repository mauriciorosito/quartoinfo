function deleteTest(id){
	if(confirm("Você tem certeza que deseja excluir?")){
		window.location = "../forms/test.form.php?action=delete&id_user=" + id;
	}
}