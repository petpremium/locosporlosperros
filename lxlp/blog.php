<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="blog">
	<nav id="sec-menu">
		<?php wp_nav_menu(array(
			'menu' => 'Categorias del Blog'));
		?>
	</nav>
	
	<div class="container wrapper">
		<div class="row">
<!--
			<div class="suscribe col-md-12">
				<div class="col-md-4">
					Suscríbete a nuestro Newsletter y recibe la mejor información para tu mejor amigo
				</div>
				<div class="col-md-8 formulario-news">
					<form action="newsletter" id="suscribe">
						<input type="text" name="nombre" id="nombre" class="input-btn" placeholder="Nombre">
						<input type="email" class="input-btn" name="correo" id="correo" placeholder="Correo Electrónico">
						<input type="hidden" value="newsletter" name="action">
						<input type="submit" class="send-button" value="Suscribirme">
					</form>
				</div>
			</div>
-->
			
			<div class="copy-grid small-font">
				<?php
					$args = array(
						'category_name' => 'tips',
						'posts_per_page' => 1
					);
					$tipQuery = new WP_Query($args);
					while($tipQuery->have_posts()) : $tipQuery->the_post();
				?>
					<div class="col-md-4 featured-posts">
						<div class="row">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>">
							<div class="mask"></div>
							<div class="datos-del-post">
								<div class="category-name"><?php the_category(' - '); ?></div>
								<h2 class="subtitulo-pub">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<h4 class="mini-font"><?php the_time('j F Y'); ?></h4>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
				
				<?php
					$args = array(
						'category_name' => 'salud',
						'posts_per_page' => 1
					);
					$tipQuery = new WP_Query($args);
					while($tipQuery->have_posts()) : $tipQuery->the_post();
				?>
					<div class="col-md-4 featured-posts">
						<div class="row">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>">
							<div class="mask"></div>
							<div class="datos-del-post">
								<div class="category-name"><?php the_category(' - '); ?></div>
								<h2 class="subtitulo-pub">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<h4 class="mini-font"><?php the_time('j F Y'); ?></h4>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
				
				
				<?php
					$args = array(
						'category_name' => 'tips',
						'posts_per_page' => 1
					);
					$tipQuery = new WP_Query($args);
					while($tipQuery->have_posts()) : $tipQuery->the_post();
				?>
					<div class="col-md-4 featured-posts">
						<div class="row">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>">
							<div class="mask"></div>
							<div class="datos-del-post">
								<div class="category-name"><?php the_category(' - '); ?></div>
								<h2 class="subtitulo-pub">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>
								<h4 class="mini-font"><?php the_time('j F Y'); ?></h4>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_postdata();
				?>
			</div>
			
			<div class="posts-wrap col-md-9">
				<?php
					$args = array(	
						'posts_per_page' => 10
					);
					
					$query = new WP_Query($args);
					
					if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); 
				?>
					<div <?php post_class(array('class' => 'post-list')); ?>>
						<div class="col-md-5">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
						</div>
						
						<div class="col-md-7 post-entries">
							<?php the_category(' | '); ?> - <?php the_time('F j Y'); ?>
							<h2 class="titulo-pub"><?php the_title(); ?></h2>
							
							<?php the_excerpt(); ?>
							
							<a  href="<?php the_permalink(); ?>" class="read-more small-font">Leer Más</a>
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