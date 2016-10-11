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
	public function sendMailNickPassChilds($wpParticipantes, $email_send)
	{
		global $success;
		$subject = 'Recuperación de contraseña';
		$body = 'Hemos enviado los datos de acceso a las cuentas de tus hijos: <br />';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$headers = 'From: Yo-Kai Watch México <no-reply@yo-kai.com>' . "\r\n";
		$message = '<html><body style="max-width: 500px; background-image: url(http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fondo-image.png); background-size: contain;">';

		$message .= '<div style="tex-align: center; padding-top: 30px; ">';
			$message .= '<a style="display:block; " href="http://yokaiwatchmexico.com/">';
				$message .= '<img style="width: 100%" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/header.png" alt="header yo-kai">';
			$message .= '</a>';
		$message .= '</div>';
		/*$message .= '<img style="position: absolute; width: 50%; margin-left: 25%;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/spining-elements.png" alt="imagen spining elements">';*/
		$message .= '<div style="padding-left:50px; padding-right:50px; padding-bottom:50px;">';
			$message .= '<h2 style="border-bottom: 2px solid #FDC804; color: #FDC804; font-size: 24px; line-height: 35px; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">Recuperar contraseña</h2>';
			$message .= '<div class="">';
				$message .= '<div class="">';
					$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Tú o tu hijo solicitaron la recuperación de la contraseña para la página Yo-Kai. Recuerda que el concurso por los premios termina el 5 de enero de 2017 a las 14 horas.</p>';
					$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Estos son los datos de tu cuenta:</p>';
					foreach ($wpParticipantes as $key => $participante) {
						$pass = $this->get_password_participantes($participante->ID);
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Nickname: <span style="color: #FDC804">'.$participante->user_login.'</span></p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Contraseña: <span style="color: #FDC804">'.$pass.'</span></p>';
					}
					$message .= '<div style="text-align: right;">';
						$message .= '<img style="width: 150px;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fantasma.png" alt="imagen spining elements">';
					$message .= '<div>';
				$message .= '</div>';
			$message .= '</div>';
		$message .= '</div>';

		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

		//SEND EMAIL CONFIRMATION
		$resp = wp_mail( $email_send, $subject, $message, $headers );
		if ($resp) {
			$success = 'Se enviaron con éxito su nickname y contraseña.';
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

	/**
	 * ENVIA LA CONSULTA POR MAIL
	 * @return [type]       [description]
	 */
	public function sendMailConsulta($data, $participante)
	{
		global $success;
		$email = get_user_meta($participante->ID, '_email_tutor', true);
		$telefono = get_user_meta($participante->ID, '_telefono_tutor', true);
		$subject = 'Yo-Kai - Consulta de '.$participante->user_login;
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$headers = 'From: Yo-Kai - Consultas <no-reply@yo-kai.com>' . "\r\n";
		$message = '<html><body style="max-width: 500px; background-image: url(http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fondo-image.png); background-size: cover;">';

		$message .= '<div style="tex-align: center; padding-top: 30px; ">';
			$message .= '<a style="display:block; " href="http://yokaiwatchmexico.com/">';
				$message .= '<img style="width: 100%" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/header.png" alt="header yo-kai">';
			$message .= '</a>';
		$message .= '</div>';
		/*$message .= '<img style="position: absolute; width: 50%; margin-left: 25%;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/spining-elements.png" alt="imagen spining elements">';*/
		$message .= '<div style="padding-left:50px; padding-right:50px; padding-bottom:50px;">';
			$message .= '<h2 style="border-bottom: 2px solid #FDC804; color: #FDC804; font-size: 24px; line-height: 35px; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">Consulta participante</h2>';
			$message .= '<div class="">';
				$message .= '<div class="">';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Nickname: <span style="color: #FDC804">'.$participante->user_login.'</span></p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Consulta: <span style="color: #FDC804">'.$data['contenido-consulta'].'</span></p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Email: <span style="color: #FDC804">'.$email.'</span></p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Teléfono: <span style="color: #FDC804">'.$telefono.'</span></p>';
				$message .= '</div>';
			$message .= '</div>';
			$message .= '<div style="text-align: right;">';
				$message .= '<img style="width: 150px;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fantasma.png" alt="imagen spining elements">';
			$message .= '<div>';
		$message .= '</div>';

		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

		//SEND EMAIL CONFIRMATION
		$resp = wp_mail( 'nayeli@pcuervo.com', $subject, $message, $headers );
		if ($resp) {
			$success = 'Se envió tu consulta correctamente.';
		}
	}


}
