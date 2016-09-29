<?php require_once('participante.class.php');
require_once('medallas.class.php');

function redirect_index_login() {
	global $current_user;

	if( !is_user_logged_in() && !pageNoLogin() ):
		wp_redirect( site_url('/') );
		exit();
	endif;

	if (is_user_logged_in() && pageNoViewIsParticipanteLogin()) {
		wp_redirect( site_url('/album/') );
		exit();
	}

}
add_action( 'wp', 'redirect_index_login');


// METHOD POST FORMS
if (isset($_POST['action']) AND $_POST['action'] == 'crear-participante') {
	$participante_class = new Participante();
	$result = $participante_class->save($_POST);
}

if (isset($_POST['action']) AND $_POST['action'] == 'cargar-nueva-medalla') {
	$medallas_class = new Medallas();
	$result = $medallas_class->save($_POST);
}

Medallas::createTableMedallasParticipante();

/**	
 * LOGIN DEL PARTICIPANTE
 * @return [type] [description]
 */
function login_participante() {
	if(isset($_POST['action'] ) && $_POST['action'] == 'login' ){
		$participante_class = new Participante();
		$participante_class->participante_login($_POST);
	}

	if(isset($_POST['action'] ) && $_POST['action'] == 'recuperar-contrasena' ){
		$participante_class = new Participante();
		$participante_class->recuperar_contrasena_participante($_POST);
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


/**	
 * REGRESA EL AVATAR DEL USUARIO
 */
function getAvatarParticipanteId($participante_id){
	$id_avatar = get_user_meta($participante_id, '_avatar_id', true);
	return attachment_image_url( $id_avatar, 'full');
}

/**	
 * PAGINAS QUE NO REQUIEREN LOGIN
 */
function pageNoLogin(){
	if (is_home() || is_page('registro')) {
		return true;
	}elseif(is_page('recuperar-contrasena') || is_page('terminos-y-condiciones')){
		return true;
	}elseif(is_page('aviso-de-privacidad') ){
		return true;
	}

	return false;
}

/**
 * PAGINAS QUE NO SE DEVEN MOSTRAR SI SE HIZO LOGIN
 * @return [type] [description]
 */
function pageNoViewIsParticipanteLogin()
{
	if (is_home() || is_page('registro')) {
		return true;
	}elseif(is_page('recuperar-contrasena')){
		return true;
	}

	return false;
}