<?php get_header(); ?>
<div id="search-page">
	<div id="search-wrapper">
		<div class="container">
			<!-- Noticias del Juego -->
			<div class="col-md-9">
				<div id="grid-resultado">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<div class="col-md-12 result-ind">
							<article class="articulo">
								<div class="post-thumbnail col-md-4">
									<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
								</div>
								<!-- Header del post -->
								<header class="post-header col-md-8">
									<h2>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
									<p><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>" class="read-more-btn pull-left">Ver Articulo</a>
								</header>	
								<!-- Fin header del post -->
							</article>
						</div>
					<?php endwhile; else : ?>
						<div id="not-found">
							<h2 class="not-found">Lo sentimos, no hay resultados con esta búsqueda, intenta de nuevo con un término distinto</h2>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- Fin Noticias del Juego -->
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>