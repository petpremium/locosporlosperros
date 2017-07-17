jQuery(document).ready(function(){
	var loader = $('.loader-ajax');
	loader.hide();
	$('#directorio-filter a').click(function(event){
		event.preventDefault();
		var objetivo = $(this).data('target');
				data = {
					categoria : objetivo,
					action : 'directorio'
				},
				ajaxUrl = php_array.admin_ajax,
		
		$.ajax({
			type: 'POST',
			url: ajaxUrl,
			data: data,
			beforeSend: function(){
				$('#ajax-directorio').html('');
				loader.fadeIn();
			},
			success: function(data){
					loader.fadeOut();
				$('#ajax-directorio').html(data);
				//Animaciones
				//variables
				var dir = $('.dir-elem'),
					tituloDir = $('#ajax-directorio');
				
				//Ani Inicial de Notas
			    TweenLite.set(dir, {y : 20, autoAlpha: 0});
			
			    //Animacion de categorias
			    new TimelineMax().fromTo(tituloDir, .5, {autoAlpha: 0, y: -50}, {autoAlpha:1, y:0})
			    				 .staggerTo(dir, .5, {y: 0, autoAlpha: 1}, .5);
			}
		});
	});
	//Animaciones
	//variables
	var dir = $('.dir-elem'),
		tituloDir = $('#ajax-directorio');
	
	//Ani Inicial de Notas
    TweenLite.set(dir, {y : 20, autoAlpha: 0});

    //Animacion de categorias
    new TimelineMax().fromTo(tituloDir, .5, {autoAlpha: 0, y: -50}, {autoAlpha:1, y:0})
    				 .staggerTo(dir, .5, {y: 0, autoAlpha: 1}, .5);
});