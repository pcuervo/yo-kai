<?php /**
 * CLASE DE PARTICIPANTES
 */

class Participante{

	private $wpdb;

	public function __construct()
	{
		global $wpdb;
		$this->wpdb = &$wpdb;
	}


	/**
	 * CREA UN PARTICIPANTE NUEVO
	 */
	private function create($nombre, $password, $email)
	{
		return wp_create_user(
			$nombre,
			$password,
			$email
		);

	}

	/**
	 * INICIO PARA GUARDAR EL PARTICIPANTE
	 */
	public function save( $args = array() )
	{
		global $errors;
		$nombre    = $args['name-competitor'].' '.$args['last-name-competitor'];
		$password  = $args['password-competitor'];
		$userLogin = $args['nick-name-competitor'];
		$email     = $args['email-tutor'];

		$participante_id = $this->create($nombre, $password, $email);

		if( ! is_wp_error($participante_id) ){
			$new_user = true;

			$this->set_maquilador_role($participante_id, 'participante');

			$this->save_metadata_participante($participante_id, $args);

			$this->auto_login($participante_id);

			wp_redirect( site_url('/bienvenido/') );
			exit;
		}else{
			$errors = $participante_id->get_error_message();
		}

	}

	/**
	 * ASIGNA ROL A PARTICIPANTE
	 */
	private function set_maquilador_role($participante_id, $role)
	{
		$wp_user = get_user_by( 'id', $participante_id );
		$wp_user->set_role( $role );
	}


	/**
	 * AUTO LOGIN
	 */
	private function auto_login($participante_id)
	{
		$user = get_userdata( $participante_id );

		$username = $user->data->user_login;

		wp_set_current_user($participante_id, $username);
		wp_set_auth_cookie($participante_id);
		return true;
	}


	/**
	 * METADATA DEL USUARIO
	 */
	private function save_metadata_participante($participante_id, $data){
		update_user_meta($participante_id, '_avatar_id', $data['avatar-participante']);
		update_user_meta($participante_id, '_nombre_tutor', $data['name-tutor']);
		update_user_meta($participante_id, '_apellido_tutor', $data['last-name-tutor']);
		update_user_meta($participante_id, '_telefono_tutor', $data['telephone-tutor']);
		update_user_meta($participante_id, 'nickname', $data['nick-name-competitor']);
	}

}