<?php get_header(); ?>
	<div class="container">
		<!-- Inicio Loop -->
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(  ); ?>
		<?php endwhile; ?>
		<!-- Final loop -->
	</div>
<?php get_footer(); ?>