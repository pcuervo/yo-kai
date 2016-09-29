<?php  /**
 * CLASE DE MAILS
 */

class Mails{

	private $wpdb;

	public function __construct()
	{
		global $wpdb;
		$this->wpdb = &$wpdb;
	}

	/**
	 * [sendMailNickPass ENVIA UN MAIL CON EL NICKNAME Y PASSWORD DEL O LOS HIJOS]
	 * @param  [type] $wpParticipante [description]
	 * @return [type]                 [description]
	 */
	public function sendMailNickPassChilds($wpParticipantes)
	{
		global $success;
		$subject = 'YO-KAI - Recuperación de contraseña';
		$body = 'Hemos enviado los datos de acceso a las cuentas de tus hijos: <br />';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$headers = 'From: YO-KAI <no-reply@yo-kay.com>' . "\r\n";
		$message = '<html><body>';

		$message .= '<img class="" src="<?php echo THEMEPATH; ?>images/spining-elements.png" alt="imagen spining elements">';
		$message .= '<h2 class="">Recuperar contraseña</h2>';
		$message .= '<div class="">';
			$message .= '<div class="">';
				$message .= '<p>Tú o tu hijo solicitaron la recuperación de la contraseña para la página yo-kay. Recuerda que el concurso por los premios termina el 5 de enero de 2017 a las 14 horas.</p>';
				$message .= '<p>Estos son los datos de tu cuenta:</p>';
				foreach ($wpParticipantes as $key => $participante) {
					$pass = $this->get_password_participantes($participante->ID);
					$message .= '<p>Nickname: <span>'.$participante->user_login.'</span></p>';
					$message .= '<p>Contraseña: <span>'.$pass.'</span></p>';
				}
			$message .= '</div>';
		$message .= '</div>';

		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

		//SEND EMAIL CONFIRMATION
		$resp = wp_mail( 'alex.cervantes@losmaquiladores.com', $subject, $message, $headers );
		
		if ($resp) {
			$success = 'Se enviaron con exito su nickname y contraseña';
		}
	}


	/**	
	 * REGRESA LA CONTRASEÑA DEL PARTICIPANTE
	 */
	public function get_password_participantes($participante_id)
	{
		$partA = get_user_meta($participante_id, '_prpapa', true);
		$partB = get_user_meta($participante_id, '_prpapb', true);

		$partA = substr($partA, 6);
		$partB = substr($partB, 0, 3);

		return $partB.$partA;

	}
	

}
