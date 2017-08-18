<?php

	//Inserción de jQuery
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
	   wp_enqueue_script('jquery');
	}

	// Soporte para menús con wp_nav_menu( array('menu' => 'Nombre_del_menu' ));
	add_theme_support('menus');

	// Soporte para imagen destacada
	add_theme_support('post-thumbnails');

	// Soporte para sidebar
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Barra Lateral',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
	));
	
	
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'Tienda',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>'
	));

	// shortcode in widgets
	if ( !is_admin() ){
	    add_filter('widget_text', 'do_shortcode', 11);
	}

	// make TinyMCE allow iframes
	add_filter('tiny_mce_before_init', create_function( '$a',
	'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );

	add_filter('mce_buttons','wysiwyg_editor');
	function wysiwyg_editor($mce_buttons) {
	    $pos = array_search('wp_more',$mce_buttons,true);
	    if ($pos !== false) {
	        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
	        $tmp_buttons[] = 'wp_page';
	        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
	    }
	    return $mce_buttons;
	}

	function mqw_mas_botones($buttons) {
	 $buttons[] = 'hr';
	 $buttons[] = 'del';
	 $buttons[] = 'sub';
	 $buttons[] = 'sup';
	 $buttons[] = 'fontselect';
	 $buttons[] = 'fontsizeselect';
	 $buttons[] = 'cleanup';
	 $buttons[] = 'styleselect';
	 return $buttons;
	}
	add_filter("mce_buttons_3", "mqw_mas_botones");

	//Añadir columna de IDs
	add_filter('manage_posts_columns', 'posts_columns_id', 5);
	add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
	add_filter('manage_pages_columns', 'posts_columns_id', 5);
	add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

	function posts_columns_id($defaults){
		$defaults['wps_post_id'] = __('ID');
		return $defaults;
	}
	function posts_custom_id_columns($column_name, $id){
		if($column_name === 'wps_post_id'){
			echo $id;
		}
	}

	// Registrar options page con ACF
	if( function_exists('acf_add_options_page') ) {
		$parent = acf_add_options_page(array(
			'page_title' 	=> 'Ajustes del sitio',
			'menu_title' 	=> 'Ajustes Sitio',
			'redirect' 		=> false
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Ajustes Sociales',
			'menu_title' 	=> 'Social',
			'parent_slug' 	=> $parent['menu_slug'],
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Ajustes Slider',
			'menu_title' 	=> 'Slider Home',
			'parent_slug' 	=> $parent['menu_slug'],
		));
	}

	// Registrar scripts en el tema
	add_action( 'wp_enqueue_scripts', 'registrar_scripts', 1 );
	function registrar_scripts() {
		//Scripts
		//Prefixfree
		wp_register_script( 'prefixfree', get_template_directory_uri() . '/assets/js/prefixfree.min.js', array( 'jquery' ), '1.0', true );
		// Bootstrap
		wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
		// CSSAnimate
		wp_register_script( 'cssplug', get_template_directory_uri() . '/assets/js/cssplugin.min.js', array( 'jquery' ), '1.0', true );
		// Tweenlite
		wp_register_script( 'tl', get_template_directory_uri() . '/assets/js/tweenlite.min.js', array( 'jquery' ), '1.0', true );
		// GSAP 
		wp_register_script('gsap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js", true, null);
		// Imagesloaded
		wp_register_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.1', true );
		// Main JS
		wp_register_script( 'main-js', get_template_directory_uri() . '/assets/js/lxlp-main.js', array( 'jquery' ), '1.1', true );
		// Registro JS
		wp_register_script( 'registro-js', get_template_directory_uri() . '/assets/js/registro.min.js', array( 'jquery' ), '1.1', true );
		// Materias Kit
		wp_register_script( 'material-kit', get_template_directory_uri() . '/assets/js/material-kit.js', array( 'jquery' ), '1.0', true );
		// Materia
		wp_register_script( 'material-js', get_template_directory_uri() . '/assets/js/material.min.js', array( 'jquery' ), '1.0', true );
		// Main JS
		wp_register_script( 'directorios-js', get_template_directory_uri() . '/assets/js/directorios.js', array( 'jquery' ), '1.2', true );
		// Blog JS
		wp_register_script( 'blog-js', get_template_directory_uri() . '/assets/js/blog.js', array( 'jquery' ), '1.2', true );
		// Libreria JS
		wp_register_script( 'libreria-js', get_template_directory_uri() . '/assets/js/libreria.js', array( 'jquery' ), '1.2', true );
		// Busqueda JS
		wp_register_script( 'busqueda-js', get_template_directory_uri() . '/assets/js/busqueda.js', array( 'jquery' ), '1.2', true );
		// slick
		wp_register_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.0', true );
		// isotope
		wp_register_script( 'isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.js', array( 'jquery' ), '1.0', true );
		// Script Tienda
		wp_register_script( 'tienda-js', get_template_directory_uri() . '/assets/js/tienda.min.js', array( 'jquery' ), '1.0', true );
		//CSS
		//Bootstrap
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
		//Bootstrap
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
		//slick
		wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
		// Material
		wp_register_style( 'material-ui', get_template_directory_uri() . '/assets/css/material-kit.css' );
		//slick
		wp_register_style( 'slick', get_template_directory_uri() . '/assets/css/slick-theme.css' );
		$php_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
	 	wp_localize_script( 'main-js', 'php_array', $php_array );
	 	wp_localize_script( 'directorios-js', 'php_array', $php_array );
	}
	
	// Google maps api
	function nr_load_scripts() {
			
		wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA5BoOclFD8cVIazxXtVU4aI1xAcV-nrYQ',null,null,true);  
		wp_enqueue_script('googlemaps');
			
	}
	add_action( 'wp_enqueue_scripts', 'nr_load_scripts' );
	
	add_filter('acf/settings/google_api_key', function () {
	    return 'AIzaSyA5BoOclFD8cVIazxXtVU4aI1xAcV-nrYQ';
	});

	// Añadir los scripts al DOM
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
	function theme_enqueue_scripts() {
		// Scripts
		wp_enqueue_script('prefixfree');
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('cssplug');
		wp_enqueue_script('tl');
		wp_enqueue_script('gsap');
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('material-kit');
		wp_enqueue_script('material-js');
		wp_enqueue_script('main-js');
		wp_enqueue_script('isotope-js');
		wp_enqueue_script('slick-js');
		if(is_page('directorios')){		
			wp_enqueue_script('directorios-js');
		}
		if(is_page('user')){		
			wp_enqueue_script('registro-js');
		}
		if(is_page('tienda')){		
			wp_enqueue_script('tienda-js');
		}
		if(is_page('el-blog')){		
			wp_enqueue_script('blog-js');
		}
		if(is_page('libreria')){		
			wp_enqueue_script('libreria-js');
		}
		if(is_page('busqueda-de-mascotas')){		
			wp_enqueue_script('busqueda-js');
		}	
		// CSS
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('material-ui');
	}
	
	// Usar ajax
	add_action( 'wp_ajax_newsletter', 'newsletter_init' );
	add_action( 'wp_ajax_nopriv_newsletter', 'newsletter_init' );

	function newsletter_init() {
		global $wpdb;
		$nombre = $_POST['nombre'];
		$mail = $_POST['correo'];
		$tabla_registro = 'newsletters';
		$datum = $wpdb->get_results("SELECT * FROM $tabla_registro WHERE correo = '" . $mail . "'");
		
	 if($wpdb->num_rows > 0) {
		 // Ya existe el correo o el ticket
	 	echo "Tu correo ya a sido registrado anteriormente";
	 	die();
	 } else{
		$wpdb->insert($tabla_registro, 
			array(
				'Nombre' => $nombre,
				'Correo' => $mail
			)
		);
		echo "Gracias por registrarte, ahora te llegaran nuestras Novedades";
		die();
		}
	}
	
	// ========= Nuevo Usuario ==========
	add_action( 'wp_ajax_newuser', 'newuser_init' );
	add_action( 'wp_ajax_nopriv_newuser', 'newuser_init' );

	function newuser_init() {
		// Obtener Datos para crear usuario
		$username = $_POST['userName'];
		$password = $_POST['passUser'];
		$email = $_POST['email'];
		$nombre = $_POST['completeName'];

		$userdata = array(
		    'user_login'  =>  $username,
		    'user_pass'   =>  $password,
		    'user_email' => $email,
		    'user_nicename' => $nombre
		);

		// Insertar Usuario en DB
		$user_id = wp_insert_user( $userdata ) ;

		//On success
		if ( ! is_wp_error( $user_id ) ) {
			echo "Felicidades ya estas Registrado";
		    die();
		} else{
		    echo "El Usuario Ya Estaba Registrado";
			die();
		}
	}
	
	function my_acf_load_field( $field ) {
  $field['label'] = 'Título de la publicación';
	  return $field;
	}
	add_filter('acf/load_field/name=_post_title', 'my_acf_load_field');
	
	add_action('wp_ajax_directorio', 'directorio_init');
	add_action('wp_ajax_nopriv_directorio', 'directorio_init');
	
	function directorio_init(){
		$categoria = $_POST['categoria'];
			$args = array(
				'post_type' => 'directorio',
				'posts_per_page' => 12,
				'category_name' => $categoria
			);
			
			$queryDirectorio = new WP_Query($args);
			
			while($queryDirectorio->have_posts()) : $queryDirectorio->the_post();
		?>
			<div class="dir-elem col-md-4">
				<div class="fondo-nota dir-ind">
					<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>">
					<div class="elem-content">
						<h2 class="titulo-posts"><?php the_title(); ?></h2>
						<h5 class="subtitulo-posts"><?php the_category(','); ?></h5>
						<p><?php excerpt(10); ?></p>
						<a class="boton-general" href="<?php the_permalink(); ?>" class="boton-general">Ver detalles</a>
					</div>
				</div>
			</div>
		<?php
			endwhile;
			wp_reset_postdata();
			die();
	}

	// Tipo de Post Libros
	// Register Custom Post Type
	function custom_post_type_libros() {
	
		$labels = array(
			'name'                  => _x( 'Libros', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Libro', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Libros', 'text_domain' ),
			'name_admin_bar'        => __( 'Libro', 'text_domain' ),
			'archives'              => __( 'Archivo de libros', 'text_domain' ),
			'parent_item_colon'     => __( 'Libro padre:', 'text_domain' ),
			'all_items'             => __( 'Todos los Libros', 'text_domain' ),
			'add_new_item'          => __( 'Añadir nuevo Libro', 'text_domain' ),
			'add_new'               => __( 'Añadir Nuevo', 'text_domain' ),
			'new_item'              => __( 'Nuevo Libro', 'text_domain' ),
			'edit_item'             => __( 'Editar libro', 'text_domain' ),
			'update_item'           => __( 'Actualizar Libro', 'text_domain' ),
			'view_item'             => __( 'Ver Libro', 'text_domain' ),
			'search_items'          => __( 'Buscar Libro', 'text_domain' ),
			'not_found'             => __( 'No encontrado', 'text_domain' ),
			'not_found_in_trash'    => __( 'No encontrado en papelera', 'text_domain' ),
			'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
			'set_featured_image'    => __( 'Establecer imagen destacda', 'text_domain' ),
			'remove_featured_image' => __( 'Remover imagen Destacada', 'text_domain' ),
			'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
			'insert_into_item'      => __( 'Insertar en Libro', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Actualizar este Libro', 'text_domain' ),
			'items_list'            => __( 'Lista de Libros', 'text_domain' ),
			'items_list_navigation' => __( 'Navegación de la lista de lIBROS', 'text_domain' ),
			'filter_items_list'     => __( 'Filtrar Lista de Libros', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Libro', 'text_domain' ),
			'description'           => __( 'Libros de consulta', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-book-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'libro', $args );
	
	}
	add_action( 'init', 'custom_post_type_libros', 0 );
	
	// Post Type Directorios
	// Register Custom Post Type
function custom_post_type_directorio() {

	$labels = array(
		'name'                  => _x( 'Establecimientos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Establecimiento', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Directorio', 'text_domain' ),
		'name_admin_bar'        => __( 'Directorio', 'text_domain' ),
		'archives'              => __( 'Archivos de Establecimientos', 'text_domain' ),
		'parent_item_colon'     => __( 'Establecimiento Padre:', 'text_domain' ),
		'all_items'             => __( 'Todos los Establecimientos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir Nuevo Establecimiento', 'text_domain' ),
		'add_new'               => __( 'Añadir Nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Establecimiento', 'text_domain' ),
		'edit_item'             => __( 'Editar Establecimiento', 'text_domain' ),
		'update_item'           => __( 'Actualizar Establecimiento', 'text_domain' ),
		'view_item'             => __( 'Ver Establecimiento', 'text_domain' ),
		'search_items'          => __( 'Buscar Establecimiento', 'text_domain' ),
		'not_found'             => __( 'No encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en papelera', 'text_domain' ),
		'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer Imagen Destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover Imagen Destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en establecimiento', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Actualizar este establecimiento', 'text_domain' ),
		'items_list'            => __( 'Listas de Establecimientos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de lista de establecimientos', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar lista de establecimientos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Establecimiento', 'text_domain' ),
		'description'           => __( 'Directorios', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-store',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'directorio', $args );

}
add_action( 'init', 'custom_post_type_directorio', 0 );

// Post Type Búsquedas
// Register Custom Post Type
function custom_post_type_busqueda() {

	$labels = array(
		'name'                  => _x( 'Busquedas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Busqueda', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Búsqueda', 'text_domain' ),
		'name_admin_bar'        => __( 'Búsqueda', 'text_domain' ),
		'archives'              => __( 'Archivo de Búsquedas', 'text_domain' ),
		'parent_item_colon'     => __( 'Búsqueda Padre:', 'text_domain' ),
		'all_items'             => __( 'Todas las Búsquedas', 'text_domain' ),
		'add_new_item'          => __( 'Añadir Nueva Búsqueda', 'text_domain' ),
		'add_new'               => __( 'Añadir Nueva', 'text_domain' ),
		'new_item'              => __( 'Nueva Búsqueda', 'text_domain' ),
		'edit_item'             => __( 'Editar Búsqueda', 'text_domain' ),
		'update_item'           => __( 'Actualizar Búsqueda', 'text_domain' ),
		'view_item'             => __( 'Ver Búsqueda', 'text_domain' ),
		'search_items'          => __( 'Buscar Búqueda', 'text_domain' ),
		'not_found'             => __( 'No encontrada', 'text_domain' ),
		'not_found_in_trash'    => __( 'No encontrada en papelera', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer Imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover Imagen Destacda', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en Búqueda', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Actualizar esta búsqueda', 'text_domain' ),
		'items_list'            => __( 'Lista de Búquedas', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de lista de búsquedas', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Lista de Búquedas', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Busqueda', 'text_domain' ),
		'description'           => __( 'Sección de busqueda', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'excerpt', 'thumbnail',  ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'busqueda', $args );

}
add_action( 'init', 'custom_post_type_busqueda', 0 );


function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)."...";
echo $excerpt;
}

/* Disable WordPress Admin Bar for all users but admins. */
  show_admin_bar(false);
	/* Opcionales

	// Login Nuevo
	function my_login_stylesheet() {
	    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/style-login.css' );
	}
	add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


	// Usar ajax
	add_action( 'wp_ajax_$nombrecall', '$nombrecall_init' );
	add_action( 'wp_ajax_nopriv_$nombrecall', '$nombrecall_init' );

	function $nombrecall_init() {

	}

	// Modificar Login css
	function my_login_stylesheet() {
	    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/style-login.css' );
	}
	add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


	//Añadir google analytics
	add_action('wp_footer', 'add_googleanalytics');
	function add_googleanalytics() { ?>
	// Paste your Google Analytics code from Step 6 here
	<?php }

	// Cambiar largo del excerpt
	function new_excerpt_length($length) {
	return 100;
	}
	add_filter('excerpt_length', 'new_excerpt_length');


	// Añadir soporte para posrt formats
	add_theme_support( 'post-formats', array( 'chat', 'audio', 'video', 'status', 'quote', 'link', 'gallery', 'aside' ) );

	// Cambiar tamaño de the post thumbnail
	add_image_size('home', 200, 217, true);
	add_image_size('medium', 600, 300, true);


	// Detectar navegadores
	function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = ‘lynx’;
	elseif($is_gecko) $classes[] = ‘gecko’;
	elseif($is_opera) $classes[] = ‘opera’;
	elseif($is_NS4) $classes[] = ‘ns4’;
	elseif($is_safari) $classes[] = ‘safari’;
	elseif($is_chrome) $classes[] = ‘chrome’;
	elseif($is_IE) $classes[] = ‘ie’;
	else $classes[] = ‘unknown’;

	if($is_iphone) $classes[] = ‘iphone’;
	return $classes;
	}
	add_filter(‘body_class’,’browser_body_class’);

	// Cambiar nombres de los roles
	function wps_change_role_name() {
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
	    $wp_roles->roles[$rol]['name'] = '$nombreRol';
	    $wp_roles->role_names[$rol] = '$nombreRol';
	}
	add_action('init', 'wps_change_role_name');

	// Redireccionar directo al post si es el único en una categoría o tag
	function redirect_to_post(){
	    global $wp_query;
	    if( is_archive() && $wp_query->post_count == 1 ){
	        the_post();
	        $post_url = get_permalink();
	        wp_redirect( $post_url );
	    }

	} add_action('template_redirect', 'redirect_to_post');

	// Agregar search a un menú
	add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
	function add_search_form($items, $args) {
	if( $args->theme_location == 'MENU-NAME' )
	        $items .= '<li class="search"><form role="search" method="get" id="searchform" action="'.home_url( '/' ).'"><input type="text" value="search" name="s" id="s" /><input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" /></form></li>';
	        return $items;
	}
	*/

?>