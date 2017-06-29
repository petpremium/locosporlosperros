<?php 
	acf_form_head();
?>
<?php
/*
Template Name: Busqueda
*/
?>

<?php 
	get_header(); 
?>
<!--inicion de cuerpo-->	
<div id="hidden-form">
	<div class="formulario-oculto reporta-pet">
		<div class="forma">
			<a href="" class="fa fa-close cerrar-formulario"></a>
			
			<h2 class="form-title">
				Datos Específicos
			</h2>
			
			<?php
				$options = array(
			
				/* (string) Unique identifier for the form. Defaults to 'acf-form' */
				'id' => 'reporta-dog-2',
				
				'post_id'		=> 'new_post',
				
				'new_post'		=> array(
					'post_type'		=> 'busqueda',
					'post_status'		=> 'publish',
					'post_category' => array(14)
				),
				'form_attributes' => array(
					'class' => 'search-form'
				),
				
				/* (array) An array of field group IDs/keys to override the fields displayed in this form */
				'field_groups' => array(151),
				
				/* (boolean) Whether or not to show the post title text field. Defaults to false */
				'post_title' => true,
				
				/* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
				'form' => true,
				
				/* (string) The text displayed on the submit button */
				'submit_value' => __("Enviar", 'acf'),
				
				/* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
				'updated_message' => __("Post updated", 'acf'),
				
				/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'. 
				Choices of 'top' (Above fields) or 'left' (Beside fields) */
				'label_placement' => 'top',
				
				/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'. 
				Choices of 'label' (Below labels) or 'field' (Below fields) */
				'instruction_placement' => 'label',
				'uploader' => 'basic',
			);
			?>
			
			<?php 
				acf_form( $options ); 
			?>
		</div>
	</div>
	
		
	
	<div class="formulario-oculto find-pet">
		<div class="forma">
			<a href="" class="fa fa-close cerrar-formulario"></a>
			
			<h2 class="form-title">
				Datos Específicos
			</h2>
			
			<?php
				$options2 = array(
			
				/* (string) Unique identifier for the form. Defaults to 'acf-form' */
				'id' => 'reporta-dog-2',
				
				'post_id'		=> 'new_post',
				
				'new_post'		=> array(
					'post_type'		=> 'busqueda',
					'post_status'		=> 'publish',
					'post_category' => array(13)
				),
				'form_attributes' => array(
					'class' => 'search-form'
				),
				
				/* (array) An array of field group IDs/keys to override the fields displayed in this form */
				'field_groups' => array(144),
				
				/* (boolean) Whether or not to show the post title text field. Defaults to false */
				'post_title' => true,
				
				/* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
				'form' => true,
				
				/* (string) The text displayed on the submit button */
				'submit_value' => __("Enviar", 'acf'),
				
				/* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
				'updated_message' => __("Post updated", 'acf'),
				
				/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'. 
				Choices of 'top' (Above fields) or 'left' (Beside fields) */
				'label_placement' => 'top',
				
				/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'. 
				Choices of 'label' (Below labels) or 'field' (Below fields) */
				'instruction_placement' => 'label',
				'uploader' => 'basic',
			);
			?>
			
			<?php 
				acf_form( $options2 ); 
			?>
		</div>
	</div>
</div>

<div id="busq">

	<div class="img-destacada-busq">
		<img class="img-full" src="<?php bloginfo('template_url')?>/assets/img/busqueda/busqueda-cover.jpg" alt="">
		<div class="titulos t1 text-left container-fluid"><h1><span class="modifica-color">¿ENCONTRASTE</span><br>UNA MASCOTA<br>PERDIDA?</h1> <br><a class="ea report" href="">ENTRA AQUÍ</a></div>
		<div class="titulos t2 text-right container-fluid"><h1><span class="modifica-color">¿BUSCAS</span> A TU <br>MASCOTA<br>EXTRAVIADA?</h1><br><a class="ea find" href="">ENTRA AQUÍ</a></div>
	</div>
	<div class="separacion">
		<p class="titulo-seccion text-center">ÚLTIMAS MASCOTAS REPORTADAS</p>
	</div>
	<!--Las Ultimas Mascotas Reportadas-->
	
	<div class="container Ultimas-Reportadas">
		<?php
			$args = array(
				'category_name' => 'mascota-encontrada, mascota-extraviada',
				'posts_per_page' => 12,
				'post_type' => 'busqueda'
			);
			
			$petQuery = new WP_Query($args);
			
			if($petQuery->have_posts()) : 
			
			while($petQuery->have_posts()) : $petQuery->the_post();
		?>
			<div class="col-md-3 col-sm-4 lista-perros">
				<div class="foto-perro">
					<img class="img-responsive" src="<?php the_field('foto_del_perro'); ?>" alt="">
				</div>
				<div class="info-perro">
					<h2 class="subtitulo-pub text-center"><?php the_title(); ?></h2>	
					<h4 class="small-font"><?php the_category(','); ?></h4>
					<a href="<?php the_permalink(); ?>" class="aligncenter boton-general small-font">Ver Información</a>	
				</div>
			</div>
		<?php
			endwhile;
			wp_reset_postdata();
		
			else:
		?>
			<h2 class="titulo-seccion text-center">No se han reportado mascotas aún</h2>
		<?php
			endif;
		?>
		
	</div>
	<div id="nav-pag-busq">
		<ul>
			<li><a class="navegacion" href="#"><< Anterior </a></li>
			<li><a class="numeros" href="#">1</a></li>
			<li><a class="numeros" href="#">2</a></li>
			<li><a class="numeros" href="#">3</a></li>
			<li><a class="numeros" href="#">4</a></li>
			<li><a class="numeros" href="#">5</a></li>
			<li><a class="navegacion" href="#">Siguiente >></a></li>
		</ul>
	</div>
</div>
<?php get_footer(); ?>