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
				<div class="row flex">
					<?php the_post_thumbnail( 'full', array('class' => 'img-responsive') ); ?>
				</div>
			</div>
			<!-- Fin search box -->
			
			<div class="directorio-wrap container">
				<div class="leyenda">
					<span class="cdmx">Nuestros Directorios Pertenecen a la Ciudad de Mexico Unicamente</span>
				</div>
					<div class="loader-ajax">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/LXLP-loader.gif" class="aligncenter" alt="">
					</div>
				<div class="row" id="ajax-directorio">
					<!-- Elemento del directorio -->
					<?php
						$args = array(
							'post_type' => 'directorio',
							'posts_per_page' => 14,
						);
						
						$queryDirectorio = new WP_Query($args);
						
						while($queryDirectorio->have_posts()) : $queryDirectorio->the_post();
					?>
						<div class="col-md-3 col-sm-6 element-dir">
							<a target="_blank" href="<?php the_field('pdf'); ?>">
								<div class="contenido">
									<img src="<?php the_field('imagen_destacada'); ?>" alt="" class="img-responsive">
									<div class="mask">
										<h4 class="titleCat"><?php the_title(); ?></h4>
									</div>
								</div>
							</a>
						</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="leyenda-baja">
				<span>Si quieres registrar tu negocio o lugar en la guia, enviar datos completos a petfriendly@dogpremium.net</span>
			</div>
		</main>	
<?php get_footer(); ?>