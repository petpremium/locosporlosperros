jQuery(document).ready(function(){
	//variables
	var libro = $('.biblio'),
		tituloLibros = $('.biblioteca');
	
	//Ani Inicial de Notas
    TweenLite.set(libro, {y : 20, autoAlpha: 0});

    //Animacion de categorias
    new TimelineMax().fromTo(tituloLibros, .8, {autoAlpha: 0, y: -50}, {autoAlpha:1, y:0})
    				 .staggerTo(libro, .8, {y: 0, autoAlpha: 1}, .8);
});