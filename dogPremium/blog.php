<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="blog">
	<div class="container wrapper">
		<?php 
			while(have_posts()) : the_post();
		?>
		<div class="row">
			<?php the_post_thumbnail( 'full', array('class' => 'img-responsive' ) ); ?>
			
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
						'posts_per_page' => 20
					);
					
					$query = new WP_Query($args);
					
					if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); 
				?>
					<div <?php post_class(array('class' => 'post-list')); ?>>
						<div class="col-md-5">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
						</div>
						
						<div class="col-md-7 post-entries">
							<?php the_time('F j Y'); ?>
							<h2 class="titulo-pub"><?php the_title(); ?></h2>
							
							<?php the_excerpt(); ?>
							
							<a  href="<?php the_permalink(); ?>" class="read-more small-font">Leer Más</a>
						</div>
					</div>
				<?php
					endwhile;
					wp_reset_postdata();
					endif;
				?>
				
			<?php
				endwhile;
			?>
			</div>
			
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>