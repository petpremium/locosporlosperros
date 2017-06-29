jQuery(document).ready(function(){
	//variables
	var nota = $('.post'),
		tituloNotas = $('.post-wrap');
	
	//Ani Inicial de Notas
    TweenLite.set(nota, {x : 20, autoAlpha: 0});

    //Animacion de categorias
    new TimelineMax().fromTo(tituloNotas, 1, {autoAlpha: 0, x: -50}, {autoAlpha:1, x:0})
    				 .staggerTo(nota, 1, {x: 0, autoAlpha: 1}, 1);
});