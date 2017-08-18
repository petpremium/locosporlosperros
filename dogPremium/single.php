<!-- Si el tema tiene varios singles.php debes renombrar este archivo a single.php -->
<?php
	if (in_category('mascota-encontrada') ||  in_category('mascota-extraviada') ) { // Si el post est{a dentro de $catnumber jalará single-$nombrecat.php cómo vista
		include(TEMPLATEPATH . '/single-pet.php');
	} else if(in_category('lugares') || in_category('expertos') || in_category('refugios')) {
		include(TEMPLATEPATH . '/single-directorios.php');
	} else { 	
		include(TEMPLATEPATH . '/single-default.php'); // Si no está en ninguna categoría en específico este será el default
} ?>