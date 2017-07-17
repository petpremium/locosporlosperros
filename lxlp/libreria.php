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
			<form method="get" id="search-shop" action="<?php bloginfo('url'); ?>/">
			    <input type="text" class="lupa antes-lupa" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Buscar'); ?>...">
			    <input type="hidden" name="post_type" value="libro" />
			    <input type="submit" id="searchsubmit" value="Buscar" class="search-btn lupa-sub subBtn lupa-in">
			</form>
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
</div>
<?php get_footer(); ?>