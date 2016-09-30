<?php // Modify default post-type labels
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


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


add_action('init', function(){


	// MEDALLAS
	$labels = array(
		'name'          => 'Medallas',
		'singular_name' => 'Medalla',
		'add_new'       => 'Nuevo Medalla',
		'add_new_item'  => 'Nuevo Medalla',
		'edit_item'     => 'Editar Medalla',
		'new_item'      => 'Nuevo Medalla',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Medalla',
		'search_items'  => 'Buscar Medalla',
		'not_found'     => 'No se encontro',
		'menu_name'     => 'Medallas'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'medallas' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'taxonomies'         => array( 'category' ),
		'supports'           => array( 'title', 'thumbnail' )
	);
	register_post_type( 'medallas', $args );

	// VIDEOS
	$labels = array(
		'name'          => 'Videos',
		'singular_name' => 'Video',
		'add_new'       => 'Nuevo Video',
		'add_new_item'  => 'Nuevo Video',
		'edit_item'     => 'Editar Video',
		'new_item'      => 'Nuevo Video',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Video',
		'search_items'  => 'Buscar Video',
		'not_found'     => 'No se encontro',
		'menu_name'     => 'Videos'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'videos' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail' )
	);
	register_post_type( 'videos', $args );

	// CONSULTAS
	$labels = array(
		'name'          => 'Consultas',
		'singular_name' => 'Consulta',
		'add_new'       => 'Nueva Consulta',
		'add_new_item'  => 'Nueva Consulta',
		'edit_item'     => 'Editar Consulta',
		'new_item'      => 'Nueva Consulta',
		'all_items'     => 'Todas',
		'view_item'     => 'Ver Consulta',
		'search_items'  => 'Buscar Consulta',
		'not_found'     => 'No se encontro',
		'menu_name'     => 'Consultas'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'consulta' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor' )
	);
	register_post_type( 'consulta', $args );


});