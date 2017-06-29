<?php
/*
Template Name: Libreria
*/
?>

<?php get_header(); ?>
<!--inicion de cuerpo-->	
<div id="lib">
	<div class="img-destacada">
		<img class="img-full" src="<?php bloginfo("template_url")?>/assets/img/library/MAINIMAGE.png" alt="">
	</div>
	<div id="buscador">
		<div class="busca text-center">
			<p class="titulo-seccion">¿QUÉ TEMA TE INTERESA?</p>
			<input class="antes-lupa" type="text">
			<input class="lupa-in" type="submit">
		</div>
	</div>
	<div class="container biblioteca">
		<?php
			$args = array(
				'post_type' => 'libro',
				'posts_per_page' => 6
			);
			
			$bookQuery = new WP_Query($args);
			while($bookQuery->have_posts()) : $bookQuery->the_post();
		?>
			<div class="col-md-3 col-sm-4 col-xs-12 biblio">
				<div class="fondo-nota lib-ind">
					<img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="">
					<h2 class="titulo-posts titulo-pub"><?php the_title(); ?></h2>
					<a class="boton-general small-font" target="_blank" href="<?php the_field('pdf'); ?>">Ver PDF</a>
				</div>
			</div>
		<?php
			endwhile;
			wp_reset_postdata();
		?>
	</div>
	<div id="nav-pag">
		<ul>
			<li><a class="navegacion" href="#"><< Anterior </a></li>
			<li><a class="numeros" href="#">1</a></li>
			<li><a class="numeros" href="#">2</a></li>
			<li><a class="numeros" href="#">3</a></li>
			<li><a class="numeros" href="#">4</a></li>
			<li><a class="numeros" href="#">5</a></li>
			<li><a class="navegacion" href="#">Siguiente >></a></li>
		</ul>
	</div>
</div>
<?php get_footer(); ?>