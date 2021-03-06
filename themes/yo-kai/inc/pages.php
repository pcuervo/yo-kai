<?php
// CUSTOM PAGES

add_action('init', function(){


	// Aviso de privacidad
	if( ! get_page_by_path('aviso-de-privacidad') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Aviso de privacidad',
			'post_name'   => 'aviso-de-privacidad',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Ayuda
	if( ! get_page_by_path('ayuda') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Ayuda',
			'post_name'   => 'ayuda',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Bienvenido
	if( ! get_page_by_path('bienvenido') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Bienvenido',
			'post_name'   => 'bienvenido',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Ganaste
	if( ! get_page_by_path('ganaste') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Ganaste',
			'post_name'   => 'ganaste',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Recuperar contraseña
	if( ! get_page_by_path('recuperar-contrasena') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Recuperar contraseña',
			'post_name'   => 'recuperar-contrasena',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Registro
	if( ! get_page_by_path('registro') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Registro',
			'post_name'   => 'registro',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Respuesta contraseña
	if( ! get_page_by_path('respuesta-contrasena') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Respuesta contraseña',
			'post_name'   => 'respuesta-contrasena',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Términos y condiciones
	if( ! get_page_by_path('terminos-y-condiciones') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Términos y condiciones',
			'post_name'   => 'terminos-y-condiciones',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Videos
	if( ! get_page_by_path('videos') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Videos',
			'post_name'   => 'videos',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Ranking
	if( ! get_page_by_path('ranking') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Ranking',
			'post_name'   => 'ranking',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Album
	if( ! get_page_by_path('album') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Album',
			'post_name'   => 'album',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Cargar
	if( ! get_page_by_path('cargar') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Cargar',
			'post_name'   => 'cargar',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	// Descargables
	if( ! get_page_by_path('descargables') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Descargables',
			'post_name'   => 'descargables',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

	if( ! get_page_by_path('videos-yokai') ){
		$page = array(
			'post_author' => 1,
			'post_status' => 'publish',
			'post_title'  => 'Videos Yokai',
			'post_name'   => 'videos-yokai',
			'post_type'   => 'page'
		);
		wp_insert_post( $page, true );
	}

});
