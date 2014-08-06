$(document).ready(function(){
	// Retirar o texto 'pesqusia' quando ganhar o foco	
	$("input[name=palavras]").focus(function(){	
		if (this.value == "Pesquisar...")
			$(this).val("");
	});
	
	$("input[name=palavras]").blur(function(){
		if (this.value == "")
			$(this).val("Pesquisar...");
	});

	$("li[class=pdf] a").attr("href", "pdfgen.php?pag=" + location.href);
	$("li[class=imp] a").attr("href", "printgen.php?pag=" + location.href);
	
	try {
		$("a[rel^=prettyOverlay]").prettyPhoto();
	} catch (e) {
		
	}
	$('#trab_sim').click(function(){
		$('#trab_esconder').fadeIn();
	})
	$('#trab_nao').click(function(){
		$('#trab_esconder').fadeOut();
	})
	$('#est_sim').click(function(){
		$('#est_esconder').fadeIn();	
	})
	$('#est_nao').click(function(){
		$('#est_esconder').fadeOut();	
	})
	
});
