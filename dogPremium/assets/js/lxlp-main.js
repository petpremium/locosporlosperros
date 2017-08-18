jQuery(document).ready(function($){
	// Carrusel
	$('.carousel-inner .item').first().addClass('active');
	var ajaxUrl = php_array.admin_ajax;
	
// ============ Obtener altura =============

	var altoHeader = $('#masthead').outerHeight();

	$('#mastwrapper').css({
		'marginTop' : altoHeader
	});

// ============ Campos Vacios buscadores =============

	$("#searchsubmit, .woocommerce-product-search input[type=submit]").addClass("subBtn");
	$("#s, .search-field").addClass("inSerch");
	var searchBtn = $(".subBtn");
	
	searchBtn.on('click', function(){
		var busq = $(".inSerch").val();
		if (!busq){
			$(".inSerch").attr("placeholder", "Indicanos que buscar");
			$(".inSerch").addClass('your-class');
			$(".inSerch").focus();
			return false;
		} else{
			
		}
	});

//========== Aparicion de form Inicio ===========

 var ft = $(".registrer-trigger");
 	 form = $(".form-box");
 
	ft.on("click", function(){
		$(this).toggleClass("visible");
		$(this).toggleClass("oculto");
		
		if($(this).hasClass("visible")){
			form.fadeIn("slow");
		} else if($(this).hasClass("oculto")){
			form.fadeOut("slow");
		}
	});
//========== Envio de datos Ajax Registro ===========


//=============Busqueda============

	//Aparicion de div's

	//Encontrada

	$(".report").click(function(event){
		event.preventDefault();

		$("#hidden-form").fadeIn("slow");
		$(".reporta-pet").fadeIn("slow");
		$(".find-pet").fadeOut("fast");
	});

	//Extraviada

	$(".find").click(function(event){
		event.preventDefault();

		$("#hidden-form").fadeIn("slow");
		$(".find-pet").fadeIn("slow");
		$(".reporta-pet").fadeOut("fast");

	});

	//Desaparicion de Div's

	$(".cerrar-formulario").click(function(event){
		event.preventDefault();

		$("#hidden-form").fadeOut("fast");
		$(".find-pet").fadeOut("fast");
		$(".reporta-pet").fadeOut("fast");
	});

	$(".send-button").click(function(event){
		event.preventDefault();

		$("#hidden-form").fadeOut("fast");
		$(".find-pet").fadeOut("fast");
		$(".reporta-pet").fadeOut("fast");
	});

//=============== Mascota Individual================

	//Galeria de Mascota extraviada
	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: true,
	  centerMode: true,
	  focusOnSelect: true
	});
	
	
		//Suscripcion a Newsletter
	var ajaxUrl = php_array.admin_ajax,
		formulario = $('#suscribe');
	
	formulario.on('submit', function(){
		event.preventDefault();
		
		var mail = $('#correo').val(),
			nombre = ('#nombre').val(),
			btnsub = $('.send-button'),
			datos = {
				action: newsletter,
				nombre: nombre,
				correo: correo
			};
			
		$('.send-button').attr('disabled', 'disabled');
		
		if(!mail){
			
			alert("Escribe Tu Nombre");
			('#nombre').focus();
			$('.send-button').removeAttr('disabled');
			
		} else if(!nombre){
			
			alert("Escribe Tu Correo");
			$('#correo').focus();
			$('.send-button').removeAttr('disabled');
			
		} else{
			$.ajax({
				url : ajaxUrl,
				type : 'POST',
				data : datos,
				cache : false,
				beforeSend : function(){
					alert("Mandando");
				},
				
				success : function(respuesta){
					alert(respuesta);
					location.reload();
				},
				
				error : function(){
				}
			});
		}
	});
	
	// Menú en mobile
	$('.mob-trigger').on('click', function(event){
		event.preventDefault();
		var menu = $('#mastmenu ul');
		
		
		if($(this).hasClass('fa-bars')){
			menu.animate({
				marginLeft: 0
			});
		} else if($(this).hasClass('fa-close')) {
			menu.animate({
				marginLeft: '100%'
			});
		}
		
		$(this).toggleClass('fa-bars');
		$(this).toggleClass('fa-close');
		
	});
	$('#submit').val('Enviar');
	$('#submit').addClass('small-font');
	$('.comment-reply-link').addClass('small-font');

	//isotope
	$('.grid').isotope({
	  // options
	  itemSelector: '.grid-item',
	  layoutMode: 'fitRows'
	});
	
	$('#directorio').imagesLoaded(function(){
		$('#ajax-directorio').isotope({
		  // options
		  itemSelector: '.dir-elem',
		 masonry: {
				    // use outer width of grid-sizer for columnWidth
				    columnWidth: '.dir-elem'
				  }
		});
	});

	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/
	
	function new_map( $el ) {
		
		// var
		var $markers = $el.find('.marker');
		
		
		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};
		
		
		// create map	        	
		var map = new google.maps.Map( $el[0], args);
		
		
		// add a markers reference
		map.markers = [];
		
		
		// add markers
		$markers.each(function(){
			
	    	add_marker( $(this), map );
			
		});
		
		
		// center map
		center_map( map );
		
		
		// return
		return map;
		
	}
	
	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/
	
	function add_marker( $marker, map ) {
	
		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	
		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});
	
		// add to array
		map.markers.push( marker );
	
		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});
	
			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {
	
				infowindow.open( map, marker );
	
			});
		}
	
	}
	
	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/
	
	function center_map( map ) {
	
		// vars
		var bounds = new google.maps.LatLngBounds();
	
		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){
	
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
	
			bounds.extend( latlng );
	
		});
	
		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}
	
	}
	
	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;
	
	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});
	
	$('.acf-map-perrito').each(function(){

		// create map
		map = new_map( $(this) );

	});
	
	var helpForm = $(".content-helpForm");
	
	helpForm.hide();
	});