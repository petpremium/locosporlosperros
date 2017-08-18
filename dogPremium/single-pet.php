<?php get_header(); ?>
	<div id="principal">
		<?php 
			if(in_category('mascota-extraviada')){
		?>
			<?php while(have_posts()) : the_post(); ?>
				<div id="parte-superior" class="container">
					<!--Aqui va la galeria con jquery-->
					<div id="galeria" class="col-md-6">
						<img src="<?php the_field('foto_del_perro'); ?>" class="img-responsive aligncenter" alt="<?php the_field('nombre'); ?>">
					</div>
		
					<!--Aqui Van Los Datos De Contacto-->
					<div id="barra-lateral" class="col-md-6 ">
						<div class="texto ">
							<h1><?php the_field('nombre_del_perro'); ?></h1>
							<h2 class="titulo-pub">Fecha de extravío</h2>
							<p><?php the_field('fecha_en_que_se_perdio'); ?></p>
							<h2 class="titulo-pub">Zona dónde se extravió</h2>
							<p><?php the_field('zona_donde_se_perdio'); ?></p>
							<br>
							<?php if(have_rows( 'caracteristicas' )) : ?>
							<h2 class="titulo-pub">Señas Particulares</h2>
							<ul class="clean-menu">
								<?php while(have_rows( 'caracteristicas' )) : the_row(); ?>
									<li><?php the_sub_field( 'caracteristica' ); ?></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
						<div class="texto-abajo">
							<div class="izquierda t-abajo">
								<h1><span class="negritas">DATOS DE</span><br>CONTACTO</h1>
							</div>
							<div class="derecha t-abajo">
								<ul>
									<?php if(get_field( 'nombre_dueno')){ ?>
										<li>
											<i class="fa fa-user icono"></i>
											<p><?php the_field('nombre_dueno'); ?></p>
										</li>
									<?php } else { } ?>
									<?php if(get_field( 'contacto')){ ?>
										<li>
											<i class="fa fa-phone icono"></i>
											<p><?php the_field('contacto'); ?></p>
										</li>
									<?php } else { } ?>
									<?php if(get_field( 'correo')){ ?>
										<li>
											<i class="fa fa-envelope icono"></i>
											<p><?php the_field('correo'); ?></p>
										</li>
									<?php } else { } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php
					$location = get_field('mapa_de_ubicacion');
	
					if( !empty($location) ):
				?>
					<div id="mapa" class="container text-center">
						<div class="acf-map-perrito">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
					</div>
				<?php endif; ?>
				<div class="link-abajo">
					<a href="<?php bloginfo('url'); ?>/busqueda-de-mascotas/"> << VOLVER AL LISTADO DE MASCOTAS</a>
				</div>
			<?php endwhile; ?>
		<?php
			} else if(in_category('mascota-encontrada')){
		?>
			
		<?php while(have_posts()) : the_post(); ?>
			<div id="parte-superior" class="container">
				<!--Aqui va la galeria con jquery-->
				<div id="galeria" class="col-md-6">
					<img src="<?php the_field('foto_del_perro'); ?>" class="img-responsive aligncenter" alt="<?php the_field('nombre_del_que_lo_encontro'); ?>">
				</div>
	
				<!--Aqui Van Los Datos De Contacto-->
				<div id="barra-lateral" class="col-md-6 ">
					<div class="texto ">
						<h2 class="titulo-pub">Fecha en la que se localizo</h2>
						<p><?php the_field('fecha_en_que_se_encontro'); ?></p>
						<h2 class="titulo-pub">Zona donde se localizo</h2>
						<p><?php the_field('zona_donde_se_encontro'); ?></p>
						<br>
						<?php if(have_rows( 'caracteristicas' )) : ?>
						<h2 class="titulo-pub">Señas Particulares</h2>
						<ul class="clean-menu">
							<?php while(have_rows( 'caracteristicas' )) : the_row(); ?>
								<li><?php the_sub_field( 'caracteristica' ); ?></li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
					<div class="texto-abajo">
						<div class="izquierda t-abajo">
							<h1><span class="negritas">DATOS DE</span><br>CONTACTO</h1>
						</div>
						<div class="derecha t-abajo">
							<ul>
								<?php if(get_field( 'nombre_del_que_lo_encontro')){ ?>
									<li>
										<i class="fa fa-user icono"></i>
										<p><?php the_field('nombre_del_que_lo_encontro'); ?></p>
									</li>
								<?php } else { } ?>
								<?php if(get_field( 'contacto')){ ?>
									<li>
										<i class="fa fa-phone icono"></i>
										<p><?php the_field('contacto'); ?></p>
									</li>
								<?php } else { } ?>
								
								<?php if(get_field( 'correo')){ ?>
									<li>
										<i class="fa fa-envelope icono"></i>
										<p><?php the_field('correo'); ?></p>
									</li>
								<?php } else { } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php
				$location = get_field('mapa_de_ubicacion');

				if( !empty($location) ):
			?>
				<div id="mapa" class="container text-center">
					<div class="acf-map-perrito">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				</div>
			<?php endif; ?>
			<div class="link-abajo">
				<a href="<?php bloginfo('url'); ?>/busqueda-de-mascotas/"> << VOLVER AL LISTADO DE MASCOTAS</a>
			</div>
		<?php endwhile; ?>
		<?php
			}
		?>
	</div>


<?php get_footer(); ?>