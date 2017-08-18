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
						<img src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" class="img-responsive aligncenter logo" alt="<?php the_title(); ?>">
					</a>
				</div>
				
				<!-- Inicio Menú --->
				<nav id="mastmenu">
					<a href="" class="mob-trigger mob-only fa fa-bars"></a>
					<?php wp_nav_menu(array('menu' => 'Principal')); ?>
					<i class="fa fa-user-circle-o registrer-trigger oculto"></i>
					<div class="form-box">
						<div class="form-registrer">
							<?php
								if(!is_user_logged_in(  )){
							?>
								<form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
									<div class="form-group label-floating">
										<label class="control-label">Nombre de Usuario o Correo</label>
										<input type="text" name="log" id="user_login" class="form-control">
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Contraseña</label>
										<input type="password" name="pwd" id="user_pass" class="form-control">
									</div>
									<div class="login-button">
										<input type="hidden" name="redirect_to" value="<?php bloginfo('url'); ?>/user">
										<input type="submit" name="wp-submit" id="wp-submit" value="Iniciar" class="registro-btn" > |  <a href="<?php bloginfo('url'); ?>/user" class="registro-btn-a">Registrarse</a>
									</div>
								</form>
							<?php
								} else {
							?>
								<div class="user-data">
									<h1>Bienvenido</h1>
									<p>
									<?php 
										global $current_user;
										get_currentuserinfo();
										echo $current_user->user_login;
									?>
									</p>
									<p>
										<a href="<?php bloginfo('url'); ?>/user" class="boton-gamelta btn">Ver Perfil</a>
									</p>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</nav>
			</div>
		</div>		
	</header>
	<!-- Fin Header -->
	
	<div id="mastwrapper">
	<?php
	if(is_page('comunidad')){
	?>
		<div class="container">
			<img class="foro-img" src="<?php bloginfo('template_url'); ?>/assets/img/refugio.png" alt="foro-img">
		</div>
	<?php
	}
	?>