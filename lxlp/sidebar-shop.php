<div class="widget">
	<form method="get" id="search-shop" action="<?php bloginfo('url'); ?>/">
	    <input type="submit" id="searchsubmit" value="Buscar" class="search-btn lupa-sub subBtn">
	    <input type="text" class="lupa" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Buscar'); ?>...">
	    <input type="hidden" name="post_type" value="product" />
	</form>
</div>
<!--Llamar widgets -->
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('Tienda') ) : ?>
<?php endif; ?>

