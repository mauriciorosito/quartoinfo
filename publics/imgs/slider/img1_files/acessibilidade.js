//Funções

// Atalhos
function gotoMenu(){
	//alert("Menu..");	
	$("#inicioMenu").focus();		
	return false;
}

function gotoConteudo(){
	//alert("Conteudo...");	
	$("#inicioCont").focus();
	return false;
} 

function gotoHome(){
	//alert("Home sweet home");	
	window.location = "index.php";
	return false;
}

function gotoPesquisar(){
	$("input[name=palavras]").focus();
	return false;
}

function gotoRybena(){
	$("#rybena").focus();
	return false;
}

// Fonte
function configTamanhoPadrao(){		
	var tamAtual = parseInt($.cookie("tamFonte"));							
	// Verifica se é necessário atualizar o tamanho da fonte 
	if(!isNaN(tamAtual)){ 			
		$("div[id^='cont']").css("font-size", tamAtual);
	}else{
		$.cookie("tamFonte", $("body").css("font-size").replace("px", ""));
	}	
}

function atualizarFonte(op){		
	var tamAtual = parseInt($.cookie("tamFonte"));		
	// Para a fonte retornar ao tamanho normal
	if(op == "="){		
		tamAtual = $("body").css("font-size");
		$("div[id^='cont']").css("font-size", tamAtual);
		$.cookie("tamFonte", tamAtual.replace("px", ""));		
	}else{		
		inc = ((op == "+" && 1) || (op == "-" && -1) || 0);				
		var tamTemp = tamAtual + inc
		if(tamTemp >= 12 && tamTemp < 20){
			$("div[id^='cont']").css("font-size", tamTemp);				
			$.cookie("tamFonte", tamTemp);
		}	
	}		
	
}


// Contraste
function configContrastePadrao(){
	var  contraste = $.cookie("contraste") || "";	
	$("body").attr("class", contraste);
}

function ativarCaixaContraste(){
	$("#caixa_contraste").css("display", "block");	
}

function desativarCaixaContraste(){
	$("#caixa_contraste").css("display", "none");		
}

function mudarContraste(classe){
	$.cookie("contraste", classe);
	$("body").attr("class", classe);
}

function selecionaContraste(){	
	var contraste = $(this).attr("id");
	//alert(contraste);
	mudarContraste(contraste);
	desativarCaixaContraste();
}


// Configurando ...
$(document).ready(function(){	
	// Verifica se existe fonte no cookie
	configTamanhoPadrao();	
	
	// Verifica se existe algum contraste no cookie
	configContrastePadrao();

	// Atalhos(jquery.hotkeys)	
	$(document).bind("keydown", "Alt+Shift+1", gotoMenu);
	$(document).bind("keydown", "Alt+1", gotoMenu);	
		
	$(document).bind("keydown", "Alt+Shift+2", gotoConteudo);
	$(document).bind("keydown", "Alt+2", gotoConteudo);
	
	$(document).bind("keydown", "Alt+Shift+3", gotoHome);
	$(document).bind("keydown", "Alt+3", gotoHome);		

	$(document).bind("keydown", "Alt+Shift+4", gotoPesquisar);
	$(document).bind("keydown", "Alt+4", gotoPesquisar);
   
   $(document).bind("keydown", "Alt+Shift+5", gotoRybena);
	$(document).bind("keydown", "Alt+5", gotoRybena);
	
	$("#aumentar_fonte").click(function(){ atualizarFonte("+"); });
	$("#diminuir_fonte").click(function(){ atualizarFonte("-"); });
	$("#tamanho_original").click(function(){ atualizarFonte("="); });	
	
	//$("#alto_contraste").click(function(){ alert('teste'); });	
	$("#alto_contraste").mouseover(ativarCaixaContraste).click(ativarCaixaContraste);
	$("#alto_contraste").mouseout(desativarCaixaContraste)//.blur(desativarCaixaContraste);
	
	$("#caixa_contraste").mouseover(ativarCaixaContraste).focus(ativarCaixaContraste);
	$("#caixa_contraste").mouseout(desativarCaixaContraste).blur(desativarCaixaContraste);
	
	$("#caixa_contraste a").click(selecionaContraste);	
	$("#contraste_original").blur(desativarCaixaContraste);	
	
});
