<?php
// CUSTOM PAGES

add_action('init', function(){


	// PRODUCTOS
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

});
