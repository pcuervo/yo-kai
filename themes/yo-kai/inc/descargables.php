<?php if(isset($_POST['action']) AND $_POST['action'] == 'save-descargables' ) setDescargables($_POST);

/** AGREGAR MENU PARA DESCARGABLES */
add_action( 'admin_menu', 'menuDescargables' );

function menuDescargables() {
	add_menu_page( 'Descargables', 'Descargables', 'read', 'descargables', 'opciones_de_descargables', '', 8);
}

function opciones_de_descargables() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	$theme_dir = get_template_directory();
	include_once($theme_dir.'/templates/descargables.php');
}

function setDescargables($data){
	for ($i=1; $i < 4; $i++) { 
		if ( get_option( 'descargable_'.$i ) !== false ):
		    update_option('descargable_'.$i, $data['descargable_'.$i] );
		else:
		    $deprecated = null;
		    $autoload = 'no';
		    add_option( 'descargable_'.$i, $data['descargable_'.$i], $deprecated, $autoload );
		endif;
	}

}