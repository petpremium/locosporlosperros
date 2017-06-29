jQuery(document).ready(function(){
	//Animaciones
	
	//variables
	var mascota = $('.lista-perros'),
		tituloMascotas = $('.titulo-seccion');
	
	//Ani Inicial de Notas
    TweenLite.set(mascota, {y : 20, autoAlpha: 0});

    //Animacion de categorias
    new TimelineMax().fromTo(tituloMascotas, 2.5, {autoAlpha: 0, x: -50}, {autoAlpha:1, x:0})
    				 .staggerTo(mascota, 1, {y: 0, autoAlpha: 1}, 1);
});