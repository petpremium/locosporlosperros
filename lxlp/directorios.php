<?php
/*
Template Name: Directorios
*/
?>

<?php get_header(); ?>
<!--inicion de cuerpo-->	
		<main id="cuerpo" class="directorio">
			<!-- SearchBox -->
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/QUEBUSCAS.jpg" class="img-responsive" alt="">
					</div>
					
					<div class="col-md-9 serch-bar">
						<h1>¿Qué estás buscando?</h1>
						<form method="get" id="serch-directorio" action="<?php bloginfo('url'); ?>/">
						    <input type="text" class="lupa" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Buscar'); ?>...">
						    <input type="hidden" name="post_type" value="directorio" />
						    <button type="submit" class="search-btn lupa-sub subBtn"><?php _e('Search'); ?></button>
						</form>
					</div>
				</div>
			</div>
			<!-- Fin search box -->
			
			<nav id="directorio-filter">
				<ul>
					<li>
						<a href="#" data-target="lugares">
							<span class="strong">Lugares</span><br/>
							<span class="light">Pet friendly</span>
						</a>
					</li>
					<li>
						<a href="#" data-target="expertos">
							<span class="strong">Expertos</span>
						</a>
					</li>
					<li>
						<a href="#" data-target="refugios">
							<span class="strong">Refugios &</span><br/>
							<span class="light">Adopciones</span>
						</a>
					</li>
				</ul>
			</nav>
			
			<div class="directorio-wrap container">
					<div class="loader-ajax">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/LXLP-loader.gif" class="aligncenter" alt="">
					</div>
				<div class="row" id="ajax-directorio">
					<!-- Elemento del directorio -->
					<?php
						$args = array(
							'post_type' => 'directorio',
							'posts_per_page' => 12,
						);
						
						$queryDirectorio = new WP_Query($args);
						
						while($queryDirectorio->have_posts()) : $queryDirectorio->the_post();
					?>
						<div class="dir-elem col-md-4 col-sm-6">
							<div class="fondo-nota dir-ind">
								<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>">
								<div class="elem-content">
									<h2 class="subtitulo-pub titulo-posts"><?php the_title(); ?></h2>
									<h5 class="small-font enlace-wrap"><?php the_category(','); ?></h5>
									<p><?php excerpt(10); ?></p>
									<a class="boton-general small-font" href="<?php the_permalink(); ?>">Ver detalles</a>
								</div>
							</div>
						</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div>
				
				
			</div>
		</main>	
<?php get_footer(); ?>