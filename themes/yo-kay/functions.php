<?php

/*------------------------------------*\
	#CONSTANTS
\*------------------------------------*/

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_template_directory_uri() . '/js/' );
define( 'CSSPATH', get_template_directory_uri() . '/css/' );
define( 'THEMEPATH', get_template_directory_uri() . '/' );
define( 'SITEURL', site_url('/') );

require_once('inc/pages.php');

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
	//wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
	//wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );



});

?>