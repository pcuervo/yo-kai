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
		$password  = $args['password-competitor'];
		$userLogin = $args['nick-name-competitor'];
		$email     = $args['email-tutor'];

		$user_id = username_exists( $userLogin );

		if ( !$user_id and email_exists($email) == false ) {
			$participante_id = $this->create($userLogin, $password, $email);

			if( ! is_wp_error($participante_id) ){
				return $this->set_completar_registro($participante_id, $args);
			}elseif(email_exists($email) == true){
				$errors = $participante_id->get_error_message();
			}

		}elseif(email_exists($email) == true){
			$errors = 'El email ya esta registrado.';
		}else{
			$errors = 'El nickname ya esta en uso.';
		}

	}

	/**
	 * COMPLETA EL REGISTRO DEL USUARIO
	 * @param [type] $participante_id [description]
	 * @param [type] $args            [description]
	 */
	private function set_completar_registro($participante_id, $args)
	{
		$this->set_maquilador_role($participante_id, 'participante');

		$this->save_metadata_participante($participante_id, $args);

		$this->auto_login($participante_id);

		wp_redirect( site_url('/bienvenido/') );
		exit;
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
	private function save_metadata_participante($participante_id, $data)
	{
		$nombre = $data['name-competitor'].' '.$data['last-name-competitor'];
		update_user_meta($participante_id, '_avatar_id', $data['avatar-participante']);
		update_user_meta($participante_id, '_nombre_tutor', $data['name-tutor']);
		update_user_meta($participante_id, '_apellido_tutor', $data['last-name-tutor']);
		update_user_meta($participante_id, '_telefono_tutor', $data['telephone-tutor']);
		update_user_meta($participante_id, 'nickname', $data['nick-name-competitor']);
		wp_update_user( [ 'ID' => $participante_id, 'display_name' => $nombre]);
	}


	/**
	 * LOGIN PARTICIPANTE
	 * @return [type] [description]
	 */
	public function participante_login($data)
	{
		$creds = array();
		$creds['user_login'] = $data['login-nickname'];
		$creds['user_password'] = $data['login-password'];

		$user = wp_signon( $creds, false );

		if ( is_wp_error($user) ) :
			wp_redirect( '?return=error'); exit;
		else:
			wp_redirect( site_url('/bienvenido/') ); 
			exit;
		endif;
	}

}