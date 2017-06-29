<?php get_header(); ?>
	<div class="container-fluid">
		<div class="row">
			<!-- Inicio Loop -->
			<?php while(have_posts()) : the_post(); 
				$author_id = get_the_author_meta( 'id' );
				$author_photo = get_field('foto', 'user_'. $author_id );
				$author_fb = get_field('facebook', 'user_'. $author_id );
				$author_tw = get_field('twitter', 'user_'. $author_id );
				$author_ig = get_field('instagram', 'user_'. $author_id );
			?>
				<div class="single-post">
					<div class="post-thumbnail">
						<?php the_post_thumbnail('full'); ?>
						<div class="mask"></div>
						<div class="post-titulos">
							<h2 class="titulo-seccion"><?php the_title(); ?></h2>
							<h4 class="subtitulo-pub categories">
								<p>Categorías</p>
								<p><?php the_category(' '); ?></p>
							</h4>
						</div>
					</div>
					<div class="container">
						<!-- Contenedor del area central -->
						<div class="post-contenido">
							<div class="float-mask">
								<div class="col-md-8">
									<div class="post-entry">
										<?php the_content(); ?>
									</div>
									<div class="post-author">
										<div class="titulo-post-author">
											<h1 class="titulo-pub">Acerca Del Autor</h1>
										</div>
										<div class="info-author">
											<nav class="col-md-2 redes-sociales">
												<ul>
													<?php
														if($author_tw){
													?>
														<li><a href="<?php echo $author_tw; ?>" class="fa fa-twitter icono"></a></li>		
													<?php
														} else {
														
														}
													?>
													<?php
														if($author_fb){
													?>
														<li><a href="<?php echo $author_fb; ?>" class="fa fa-facebook icono"></a></li>		
													<?php
														} else {
														
														}
													?>
													<?php
														if($author_ig){
													?>
														<li><a href="<?php echo $author_ig; ?>" class="fa fa-instagram icono"></a></li>	
													<?php
														} else {
														
														}
													?>
												</ul>
											</nav>
											<div class="col-md-3 img-author">
												<?php
													if($author_photo){
												?>
													<img src="<?php echo $author_photo; ?>" alt="" class="img-circle img-responsive">
												<?php	} else { ?>					
													<img src="<?php bloginfo('template_url')?>/assets/img/dummy/usu.jpg" class="img-circle img-responsive">	
												<?php
														}
												?>
											</div>
											<div class="col-md-7 bio-author">
												<h1 class="subtitulo-pub"><?php the_author(); ?></h1>
												<?php the_author_description(); ?>
											</div>
										</div>
									</div>
									<div class="post-tags small-font">
										<h3 class="titulo-pub">Etiquetas</h3>
										<?php the_tags(' '); ?>
									</div>
	
									<div class="comentarios">
										<?php comments_template(); ?>
									</div>
								</div>
								
								<div class="col-md-4">
									<?php get_sidebar(); ?>
								</div>
							</div>
						</div>
						<!-- Fin Contenedor del area central -->
					</div>
				</div>
			<?php endwhile; ?>
			<!-- Final loop -->	
		</div>
	</div>
<?php get_footer(); ?>