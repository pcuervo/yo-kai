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

?>