<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<!-- Inicio Loop -->
			<?php while(have_posts()) : the_post(); ?>
				<div class="single-post">
					<!-- Contenedor del area central -->
					<div class="post-contenido-no-thumb">
						<div class="float-mask">
							<div class="col-md-12">
								<h2 class="titulo-pub">
									<?php the_title(); ?>
								</h2>
								
								<div class="info-directorio col-md-3">
									<table class="table">
										<!-- Dirección del lugar -->
										<?php if(get_field('direccion')){ ?>
											<tr>
												<td><i class="fa fa-map-marker"></i></td>
												<td><?php the_field('direccion'); ?></td>
											</tr>
										<?php	
											} else {} 
										?>
										<!-- Teléfono -->
										<?php if(get_field('telefono')){ ?>
											<tr>
												<td><i class="fa fa-phone"></i></td>
												<td><?php the_field('telefono'); ?></td>
											</tr>
										<?php	
											} else {} 
										?>
										<?php
											if(get_field( 'ubicacion' )) {
										?>
											<tr>
												<td><i class="fa fa-location"></i></td>
												<td>
													<?php
														$location = get_field('ubicacion');

														if( !empty($location) ):
														?>
														<div class="acf-map">
															<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
														</div>
														<?php endif; ?>
												</td>
											</tr>
										<?php
											} else {}
										?>
											<tr>
												<td><i class="fa fa-th"></i></td>
												<td><?php 
													$tipos = get_field('tipo');
													echo $tipos['label'];
													 ?>
												</td>
											</tr>
										<?php
											$tipo = get_field('tipo');
											if($tipo['value'] == 'petfriendly'){
										?>		
												<tr>
													<td colspan="2">
														<?php
															$servicios = get_field('servicios_lugares_pet_friendly');
															if($servicios) :
															foreach($servicios as $servicio) :
															?>
																<div class="col-md-12" style="margin-bottom: 10px;">
																	<img src="<?php bloginfo('template_url'); ?>/assets/img/iconos/<?php echo $servicio; ?>.svg" class="img-responsive serv-icon">
																</div>
															<?php
															endforeach; 
															endif;
														?>
													</td>
												</tr>
										<?php		
											} else if($tipo['value'] == 'refugios'){
										?>
											<tr>
												<td colspan="2">
													<?php
														$servicios = get_field('servicios_refugios');
														if($servicios) :
														foreach($servicios as $servicio) :
														?>
															<div class="col-md-12">
																<img src="<?php bloginfo('template_url'); ?>/assets/img/iconos/<?php echo $servicio; ?>.svg" class="img-responsive serv-icon">
															</div>
														<?php
														endforeach; 
														endif;
													?>
												</td>
											</tr>
										<?php	
											}else if($tipo['value'] == 'expertos'){
										?>
											<tr>
												<td colspan="2">
													<?php
														$servicios = get_field('servicios_expertos');
														if($servicios) :
														foreach($servicios as $servicio) :
														?>
															<div class="col-md-12">
																<img src="<?php bloginfo('template_url'); ?>/assets/img/iconos/<?php echo $servicio; ?>.svg" class="img-responsive serv-icon">
															</div>
														<?php
														endforeach; 
														endif;
													?>
												</td>
											</tr>
										<?php	
											}
										?>
									</table>
								</div>
								<div class="post-entry col-md-9">
									<div class="local-thumb">
										<?php
											if(has_post_thumbnail()){
												the_post_thumbnail('full', array('class' => ' aligncenter img-responsive'));
											} else {
												
											}
										?>
									</div>
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin Contenedor del area central -->
				</div>
			<?php endwhile; ?>
			<!-- Final loop -->	
		</div>
	</div>
<?php get_footer(); ?>