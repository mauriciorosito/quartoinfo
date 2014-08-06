function moveMenu(id, rapido) {
	if (!rapido)
		rapido = "normal"
	else
		rapido = 0;

	$("ul.sub_"+id).slideToggle(rapido);
	
	if ($("#botaooculto_"+id).text() == "Mostrar submenus") {
		$("#botaooculto_"+id).text("Esconder submenus");
	} else {
		$("#botaooculto_"+id).text("Mostrar submenus");
	}
		
	return false;
}
$(function() {
	$("#botao_19").click(function(){ return moveMenu("19"); });
	$("#botaooculto_19").click(function(){ return moveMenu("19"); });
	$("#botao_45").click(function(){ return moveMenu("45"); });
	$("#botaooculto_45").click(function(){ return moveMenu("45"); });
	$("#botao_34").click(function(){ return moveMenu("34"); });
	$("#botaooculto_34").click(function(){ return moveMenu("34"); });
	$("#botao_54").click(function(){ return moveMenu("54"); });
	$("#botaooculto_54").click(function(){ return moveMenu("54"); });
	$("#botao_221").click(function(){ return moveMenu("221"); });
	$("#botaooculto_221").click(function(){ return moveMenu("221"); });
	$("#botao_195").click(function(){ return moveMenu("195"); });
	$("#botaooculto_195").click(function(){ return moveMenu("195"); });
	$("#botao_37").click(function(){ return moveMenu("37"); });
	$("#botaooculto_37").click(function(){ return moveMenu("37"); });
	$("#botao_120").click(function(){ return moveMenu("120"); });
	$("#botaooculto_120").click(function(){ return moveMenu("120"); });
	$("#botao_60").click(function(){ return moveMenu("60"); });
	$("#botaooculto_60").click(function(){ return moveMenu("60"); });
	$("#botao_76").click(function(){ return moveMenu("76"); });
	$("#botaooculto_76").click(function(){ return moveMenu("76"); });
	$("#botao_124").click(function(){ return moveMenu("124"); });
	$("#botaooculto_124").click(function(){ return moveMenu("124"); });

	moveMenu(54, 1);});