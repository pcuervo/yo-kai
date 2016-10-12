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
		$message = '<html><body style="margin: 0 auto; max-width: 500px; background-image: url(http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fondo-image.png); background-size: contain;">';

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
		$headers = 'From: Ayuda Yo-Kai <no-reply@yo-kai.com>' . "\r\n";
		$message = '<html><body style="margin: 0 auto; max-width: 500px; background-image: url(http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fondo-image.png); background-size: cover;">';

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
		$resp = wp_mail( 'ayuda@yokaiwatchmexico.com', $subject, $message, $headers );
		if ($resp) {
			$success = 'Se envió tu consulta correctamente.';
		}
	}

	/**
	 * SEND MAIL NEW REGISTER
	 */
	public function sendMailNewRegister($participante_id, $args){
		global $success;
		$subject = '¡BIENVENIDO A LA COMUNIDAD YO-KAI MÉXICO!';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$headers = 'From: Yo-Kai Watch México <no-reply@Yo-Kai.com>' . "\r\n";
		$message = '<html><body style="margin: 0 auto; max-width: 500px; background-image: url(http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fondo-image.png); background-size: cover;">';

		$message .= '<div style="tex-align: center; padding-top: 30px; ">';
			$message .= '<a style="display:block; " href="http://yokaiwatchmexico.com/">';
				$message .= '<img style="width: 100%" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/header.png" alt="header yo-kai">';
			$message .= '</a>';
		$message .= '</div>';
		/*$message .= '<img style="position: absolute; width: 50%; margin-left: 25%;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/spining-elements.png" alt="imagen spining elements">';*/
		$message .= '<div style="padding-left:50px; padding-right:50px; padding-bottom:50px;">';
			$message .= '<h2 style="border-bottom: 2px solid #FDC804; color: #FDC804; font-size: 24px; line-height: 35px; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">¡Bienvenido a la comunidad Yo-Kai México!</h2>';
			$message .= '<div class="">';
				$message .= '<div class="">';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Consigue las medallas para tu reloj Yo-Kai©, regístralas en tu álbum digital a través de la página y gana increíbles premios.</p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Desde ahora estás participando. Puedes checar el lugar en el que te encuentras en la sección “Ranking". El concurso por un Nintendo 2DS y nueve premios más termina el 5 de enero de 2017 a las 14 horas. ¡Junta la mayor cantidad de medallas que puedas!</p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Si tienes alguna duda, escríbenos desde la sección de “Ayuda" y responderemos lo más rápido posible a esta dirección de correo.</p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">¡Si eres el papá, la mamá o el tutor del niño participante, muéstrale este correo por favor!</p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Estos son los datos de tu cuenta.</p>';

						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Nickname: <span style="color: #FDC804">'.$args['nick-name-competitor'].'</span></p>';
						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Contraseña: <span style="color: #FDC804">'.$args['password-competitor'].'</span></p>';

						$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">¡Buena suerte!</p>';
				$message .= '</div>';
			$message .= '</div>';
			$message .= '<div style="text-align: right;">';
				$message .= '<img style="width: 150px;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fantasma.png" alt="imagen spining elements">';
			$message .= '<div>';
		$message .= '</div>';

		$message .= '</body></html>';

		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

		//SEND EMAIL CONFIRMATION
		return wp_mail( $args['email-tutor'], $subject, $message, $headers );

	}


}
