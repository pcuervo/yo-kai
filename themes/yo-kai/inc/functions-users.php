<?php require_once('participante.class.php');

if (isset($_POST['action']) AND $_POST['action'] == 'crear-participante') {
	$participante = new Participante();
	$result = $participante->save($_POST);
}

/**	
 * LOGIN DEL PARTICIPANTE
 * @return [type] [description]
 */
function login_participante() {
	if(isset($_POST['action'] ) && isset($_POST['action'] ) == 'login' ){
		$user = new Participante();
		$user->participante_login($_POST);
	}

}

add_action( 'wp', 'login_participante');

/**
 * REDIRECCIONA AL PARTICIPANTE SI QUIERE ENTRAR AL ADMIN
 */
add_action('admin_init', 'no_participante_dashboard');
function no_participante_dashboard() {
  if (( !current_user_can('administrator') && !current_user_can('editor') ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX )) {
  		wp_redirect(site_url('/')); exit;
  }
}

/**
 * CREA ROL DE PARTICIPANTE
 */
$administrator = get_role('author');
add_role( 'participante', 'Participante', $administrator->capabilities );