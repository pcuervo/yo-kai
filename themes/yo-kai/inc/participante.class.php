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

		if ( !$user_id ) {
			$participante_id = $this->create($userLogin, $password, '');

			if( ! is_wp_error($participante_id) ){
				return $this->set_completar_registro($participante_id, $args);
			}elseif(email_exists($email) == true){
				$errors = $participante_id->get_error_message();
			}

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

		wp_redirect( site_url('/album/') );
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
		update_user_meta($participante_id, '_email_tutor', $data['email-tutor']);
		update_user_meta($participante_id, 'nickname', $data['nick-name-competitor']);
		$partA = substr($data['password-competitor'], 0, 3);
		$partB = substr($data['password-competitor'], 3);

		update_user_meta($participante_id, '_prpapa', '$P$Bt6'.$partB);
		update_user_meta($participante_id, '_prpapb', $partA.'$R$5t6');


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
			wp_redirect( site_url('/album/') );
			exit;
		endif;
	}


	/**
	 * RECUPERAR CONTRASEÑA
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function recuperar_contrasena_participante($data)
	{
		global $errors;
		extract($data);

		$wpParticipanteMail = $this->get_participante_email($valorRecuperar);
		$wpParticipanteLogin = get_user_by('login', $valorRecuperar);
		$wpParticipante = $wpParticipanteMail ? $wpParticipanteMail : FALSE;
		$wpParticipante = $wpParticipanteLogin ? [$wpParticipanteLogin] : $wpParticipanteMail;

		$mail_send = $wpParticipanteMail ? $valorRecuperar : get_user_meta($wpParticipanteLogin->ID, '_email_tutor', true);

		if ($wpParticipanteMail || $wpParticipanteLogin) {
			$mail_class = new Mails;
			$mail_class = $mail_class->sendMailNickPassChilds($wpParticipante, $mail_send);
		}else{
			$errors = 'El email o nickname no existen.';
		}
	}

	/**
	 * REGRESA EL USUARIO SI EXISTE EL MAIL
	 */
	public function get_participante_email($email)
	{
		return $this->wpdb->get_results( "SELECT u.*, meta_value as mail_participante FROM {$this->wpdb->prefix}users as u
			INNER JOIN {$this->wpdb->prefix}usermeta as um
			ON u.ID = um.user_id
			WHERE meta_key = '_email_tutor' AND meta_value = '$email'",
		OBJECT
		 );
	}

	/**
	 * GUARDA LA CONSULTA
	 */
	public function saveConsulta($data_consulta){

		// Create post object
		$current_user = wp_get_current_user();

		$description = isset($data_consulta['contenido-consulta']) ? $data_consulta['contenido-consulta'] : '';
		$new_consulta = array(
			'post_title'   => 'Participante: '.$current_user->user_login,
			'post_content' => $description,
			'post_status'  => 'publish',
			'post_date'    => current_time('mysql'),
			'post_author'  => $current_user->ID,
			'post_type'    => 'consulta'
		);

		return wp_insert_post($new_consulta);
	}

	/**
	 * CREA LA CONSULTA
	 */
	public function createConsulta($data){
		global $current_user;
		global $errors;

		$consulta_id = $this->saveConsulta($data);

		if ($consulta_id) {
			update_post_meta( $consulta_id, '_participante_consulta', $current_user->ID );
			$mail_class = new Mails;
			$mail_class = $mail_class->sendMailConsulta($data, $current_user);
		}else{
			$errors = 'Error al enviar tu consulta, por favor inténtalo de nuevo.';
		}

	}

}