<?php global $errors;

/*------------------------------------*\
	#CONSTANTS
\*------------------------------------*/

/**	
 * QUITA LA BARRA DE ADMINISTRACION
 */
function quitar_barra_administracion(){ return false; }
add_filter( 'show_admin_bar' , 'quitar_barra_administracion');

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_template_directory_uri() . '/js/' );
define( 'CSSPATH', get_template_directory_uri() . '/css/' );
define( 'THEMEPATH', get_template_directory_uri() . '/' );
define( 'SITEURL', site_url('/') );


/**	
 * INCLUDES
 */

require_once('inc/pages.php');
require_once('inc/functions-users.php');


/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
* Enqueue frontend scripts and styles
**/
add_action( 'wp_enqueue_scripts', function(){
	// styles
	//wp_enqueue_style( 'styles', get_stylesheet_uri() );
	//wp_enqueue_style( 'style', THEMEPATH.'style.css');
	// scripts
	//wp_enqueue_script( 'jquery', 'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js', array('jquery'), '1.0', true );
	//wp_enqueue_script( 'bootstrap', 'http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js', array('jquery'), '1.0', true );
	//wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );
	//wp_enqueue_script( 'parsley', JSPATH.'parsley.min.js', array('plugins'), '1.0', true );

});

/**	IMAGEN EN PSOTS */
if ( function_exists('add_theme_support') ){
	add_theme_support('post-thumbnails');
}

// Modify default post-type labels
function yokai_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Avatars';
	$submenu['edit.php'][5][0] = 'Avatars';
	echo '';
}
	
function yokai_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Avatars';
	$labels->singular_name = 'Avatar';
	$labels->add_new_item = 'Añadir nueva avatar';
	$labels->edit_item = 'Editar historia';
	$labels->search_items = 'Buscar Avatars';
}
	
add_action( 'init', 'yokai_post_object_label' );
add_action( 'admin_menu', 'yokai_post_menu_label' );

/**
 * Regresa la url del attachment especificado
 * @param  int     $post_id
 * @param  string  $size
 * @return string  url de la imagen
 */
function attachment_image_url($post_id, $size){
	$image_id   = get_post_thumbnail_id($post_id);
	$image_data = wp_get_attachment_image_src($image_id, $size, true);
	return isset($image_data[0]) ? $image_data[0] : '';
}