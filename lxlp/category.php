<?php get_header(); ?>

<div id="blog">
	<nav id="sec-menu">
		<ul>
			<li><span class="category-titulo titulo-seccion"><?php single_cat_title(); ?></span></li>
		</ul>
		
	</nav>
	
	<div class="container wrapper">
		<div class="row">
			<div class="posts-wrap col-md-9">
				<?php
					if(have_posts()) : while(have_posts()) : the_post();
				?>
					<div <?php post_class(array('class' => 'post-list')); ?>>
						<div class="col-md-5">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
						</div>
						
						<div class="col-md-7 post-entries">
							<?php the_category(' | '); ?> - <?php the_time('F j Y'); ?>
							<h2 class="titulo-pub"><?php the_title(); ?></h2>
							
							<?php the_excerpt(); ?>
							
							<a href="<?php the_permalink(); ?>" class="boton-general small-font dark">Leer Más</a>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</div>
			
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>