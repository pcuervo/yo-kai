<?php if(isset($_POST['action']) AND $_POST['action'] == 'send-mail-ganador' ) sendMailGanador($_POST);


/** AGREGAR MENU PARA GANADOR */
add_action( 'admin_menu', 'menuGanador' );

function menuGanador() {
	add_menu_page( 'Ganador', 'Ganador', 'read', 'ganador', 'opciones_de_ganador', '', 8);
}

function opciones_de_ganador() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	$participantes_ranking = Medallas::ranking();

	$theme_dir = get_template_directory();
	$dateReal = date('Y-m-d H:i:s');
	$dateFin = '2017-01-05 14:00:00';

	if ( $dateReal < $dateFin ) {
		include_once($theme_dir.'/templates/rank-list-admin.php');
	}else{
		include_once($theme_dir.'/templates/ganador.php');
	}
}

function htmlMailGanador($id_user){
	$message = '<div style="margin: 0 auto; max-width: 500px; background-image: url(http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fondo-image.png); background-size: cover;">';

		$message .= '<div style="tex-align: center; padding-top: 30px; ">';
			$message .= '<a style="display:block; " href="http://yokaiwatchmexico.com/">';
				$message .= '<img style="width: 100%" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/header.png" alt="header yo-kai">';
			$message .= '</a>';
		$message .= '</div>';
		$message .= '<div style="padding-left:50px; padding-right:50px; padding-bottom:50px;">';
			$message .= '<h2 style="border-bottom: 2px solid #FDC804; color: #FDC804; font-size: 24px; line-height: 35px; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">¡Bienvenido a la comunidad Yo-Kai México</h2>';
			$message .= '<div class="">';
					$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">¡Has resultado ganador en el concurso de YoKai México! Pronto nos comunicaremos contigo al número telefónico que ingresaste en el registro o, en caso de no encontrarte, lo haremos a través de éste correo electrónico.</p>';
					$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">Si vives en la Ciudad de México, te indicaremos la dirección para que puedas pasar a recoger tu premio; si vives en cualquiera de los demás estados de la República o en el extranjero, solicitaremos tu dirección para enviártelo por paquetería.</p>';
					$message .= '<p style="font-size: 16px; color: #fff; line-height: 25px;">¡Muchas gracias </br>por participar!</p>';
			$message .= '</div>';
			$message .= '<div style="text-align: right;">';
				$message .= '<img style="width: 150px;" src="http://yokaiwatchmexico.com/wp-content/themes/yo-kai/images/fantasma.png" alt="imagen spining elements">';
			$message .= '</div>';
		$message .= '</div>';

	$message .= '</div>';

	return $message;
}


function sendMailGanador($data){
	extract($data);

	$email = get_user_meta($idGanador, '_email_tutor', true);
	$userInfo = get_userdata($idGanador);
	
	if ($email != '') {
		$mail_class = new Mails;
  		$result = $mail_class->sendMailChildWinner($email, $userInfo);
  		
  		if ($result != 'error') {
  			setSendMail(1);
  		}
	}
}

function setSendMail($status){
	if ( get_option( 'send_mail_winner' ) !== false ):
	    update_option('send_mail_winner', $status );
	else:
	    $deprecated = null;
	    $autoload = 'no';
	    add_option( 'send_mail_winner', $status, $deprecated, $autoload );
	endif;

	$current_user = wp_get_current_user();

	if ( get_option( 'send_mail_winner_user' ) !== false ):
	    update_option('send_mail_winner_user', $current_user->ID );
	else:
	    $deprecated = null;
	    $autoload = 'no';
	    add_option( 'send_mail_winner_user', $current_user->ID, $deprecated, $autoload );
	endif;
}
