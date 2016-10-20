<?php 

/** AGREGAR MENU PARA GANADOR */
add_action( 'admin_menu', 'menuGanador' );

function menuGanador() {
	add_menu_page( 'Ganador', 'Ganador', 'read', 'ganador', 'opciones_de_ganador', '', 8);
}

function opciones_de_ganador() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	$theme_dir = get_template_directory();
	if ( date('Y-m-d H:i:s') < '2017-01-05 14:00:00' ) {
		include_once($theme_dir.'/templates/rank-list-admin.php');
	}else{
		include_once($theme_dir.'/templates/ganador.php');
	}

	
}
