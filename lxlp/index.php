<?php get_header(); ?>
<div id="home-wrap">
	<div id="home">
		<div class="container-fluid">
			<div class="row">
				<!-- Imagen Destacada -->
				<div id="imagen-principal">
					<div id="carousel-home" class="carousel slide" data-ride="carousel">
					
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
						<?php if(have_rows( 'slide', 'option' )) : while(have_rows( 'slide', 'option' )) : the_row(); ?>	
						    	<div class="item">
								<a href="<?php the_sub_field('url'); ?>">
									<img src="<?php the_sub_field('imagen'); ?>" class="img" alt="">
									
									<div class="texto-imagen">
										<h2 class="titulo-seccion">Lo Destacado</h2>
										<p class="subtitulo-pub"><?php the_sub_field('texto'); ?></p>
									</div>
								</a>
						    	</div>
						<?php endwhile; endif; ?>
					  </div>
					
					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		</div>
		<!-- Introducción -->
		<div id="introduccion">
			<div class="container">
				<p class="main-text">¡Locos x los perros es tu comunidad especialmente creada para el cuidado de tu mejor amigo! Sabemos que quieres lo mejor para él, por eso tenemos mucha información útil para cuidarlo como se merece.</p>
			</div>
		</div>
		<!-- Novedades -->
		<div id="novedades">
			<h2 class="titulo">Lo más Nuevo</h2>
			
			<div id="post-wraps">
				<div class="container">
					<div class="row">				
						<?php 
						query_posts(array(
							'posts_per_page' => 6
						));
						if(have_posts()) : while(have_posts()) : the_post(); ?>
							<div class="nota col-md-4">
								<div class="row">
									<div class="mask"></div>
									<img src="<?php the_field('imagen_destacada'); ?>" class="img-responsive" alt="">
									<div class="titulos subtitulo-pub">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<p>
											<div class="cat-name small-font">
												<?php the_category(','); ?>
											</div>
										</p>
									</div>
								</div>
							</div>
						<?php endwhile; endif; ?>
						
						<div class="clearfix"></div>
						
						<div class="read-more text-center">
							<a href="<?php bloginfo('url'); ?>/el-blog" class="btn btn-warning">Ver todas las notas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Contacto -->
		<div></div>
		<!-- Redes Sociales -->
		<div></div>
	</div>
</div>

<?php get_footer(); ?>
