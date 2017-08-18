<?php acf_form_head();
/*
Template Name: Perfil de usuario
*/
?>

<?php global $current_user; get_currentuserinfo(); ?>

<?php get_header(); ?>

<main id="main" class="site-main wrapper" role="main">
	<div class="main-column container">
		
		
		<?php
			if(is_user_logged_in(  )){
		?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="page-<?php the_ID(); ?>" class="meta-box hentry">
				<header class="entry-header">
					<h1 class="entry-title">Bienvenido, <span class="userColor"><?php echo esc_html($current_user->display_name); ?></span></h1>
				</header>
				<div class="post-content cf col-md-6">
					<div class="entry-content">
						<div class="col-md-12">
							<p>Aquí podrás revisar tus datos de perfil.</p>
							<?php $options = array(
							    'post_id' => 'user_'.$current_user->ID,
							    'field_groups' => array(604),
							    'form' => true, 
							    'return' => add_query_arg( 'updated', 'true', get_permalink() ), 
							    'html_before_fields' => '',
							    'html_after_fields' => '',
							    'submit_value' => 'Actualizar Usuario' 
							);
							acf_form( $options );
							?>
						</div>
					</div>
				</div>
				<div class="post-content cf col-md-6">
					<div class="entry-content">
						<div class="col-md-12">
							<form action="update_user" id="update_user">
								<p>
									<label>Tu Nombre:</label> 
									<input type="text" name="username" id="user_name" value="<?php echo $current_user->user_firstname; ?>" class="form-control">
								</p>
								<p>
									<label>Tu Correo:</label> 
									<input type="email" name="usermail" id="user_mail" value="<?php echo $current_user->user_email; ?>" class="form-control">
								</p>
							</form>
						</div>
					</div>
					<p>
						<a style="float:right" href="<?php echo wp_logout_url("user"); ?>" class="icon-cancel standard-button button-logout btn btn-danger btn-raised">Salir</a>
					</p>
				</div>
			</article>
			<?php endwhile; ?>
		<?php
			} else {
		?> 
		<div class="vistaDividida">
			<div class="col-md-6">
				<div class="inicioSesion">
					<h3>Inicia sesion para tener acceso a tus datos</h3>
					<h6>Inicia Sesión Aqui</h6>
					<div class="formulario">
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
								<input type="submit" name="wp-submit" id="wp-submit" value="Ingresar" class="registro-btn">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div id="registro">
					<h3>Se parte de nuestra familia canina y entérate de nuestras noticias</h3>
					<h6>Registrate Aqui</h6>
					<div class="ajax-response"></div>
					<div class="formulario">
						<form id="registro-form">
							<div class="form-group label-floating">
								<label class="control-label">Nombre Completo</label>
								<input type="text" name="completeName" id="completeName" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Correo Electronico</label>
								<input type="text" name="email" id="email" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Nombre de Usuario</label>
								<input type="text" name="userName" id="userName" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Contraseña</label>
								<input type="password" name="passUser" id="passUser" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Confirmar Contraseña</label>
								<input type="password" name="passcheck" id="passcheck" class="form-control">
							</div>
							<input type="hidden" name="action" value="newuser">
							<input type="submit" value="Registrarse" class="btn-danger registro-btn">
						</form>
					</div>
					<div class="ajax-response"></div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</div><!-- .main-column -->
</main><!-- #main -->

<?php get_footer(); ?>