$(document).ready(function() {
	if( $("link_category_tr").load){ 
		$("#category_type").hide();
		$("#link_type").hide();
	}
					
	$("#type").change(function() {
		if( this.value=="category" ){
			$("#category_type").show();
			$("#link_type").hide();
		}else if (this.value=="link"){
			$("#category_type").hide();
			$("#link_type").show();
		} else {
			$("#category_type").hide();
			$("#link_type").hide();
		}
	});
});