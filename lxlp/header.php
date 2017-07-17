<!--DOCTYPE html-->
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
		<?php wp_head(); ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</head>
	
	<body <?php body_class(); ?>>
	<!-- Inicio Header -->
	<header id="masthead">
		<div class="container">
			<div class="row">
				<div class="logo">
					<a href="<?php bloginfo('url'); ?>">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" class="img-responsive aligncenter" alt="<?php the_title(); ?>">
					</a>
				</div>
				
				<!-- Inicio Menú --->
				<nav id="mastmenu">
					<a href="" class="mob-trigger mob-only fa fa-bars"></a>
					<?php wp_nav_menu(array('menu' => 'Principal')); ?>
				</nav>
			</div>
		</div>		
	</header>
	<!-- Fin Header -->
	
	<div id="mastwrapper">