jQuery(document).ready(function($){
	var formRegis = $("#registro-form");
	    ajaxUrl = php_array.admin_ajax;
	
	formRegis.on("submit", function(){
		event.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url: ajaxUrl,
			type: 'POST',
			data: data,
			cache: false,
			beforeSend : function(){
			},
			
			success : function(response){
				$(".ajax-response").append("<h1>" . response . "</h1>");
				location.reload();
			},
				
			error : function(){
				alert("Error");
			}
		});
	});
	
});