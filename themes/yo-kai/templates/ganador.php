<?php $ganador = isset($participantes_ranking[0]) ? $participantes_ranking[0] : [];
$ganador_id = isset($ganador->participante_id) ? $ganador->participante_id : 0;
$email = get_user_meta($ganador_id, '_email_tutor', true);
$user_info = get_userdata($ganador_id); 
$sendMailWinner = get_option( 'send_mail_winner' );
$sendMailWinnerUserId = get_option( 'send_mail_winner_user' );
$user_info_send = get_userdata($sendMailWinnerUserId);   ?>
<div class="wrap nosubsub">
	<h2>Ganador - <?php echo $user_info->user_login ?></h2>
	<p><strong>Para: </strong> <?php echo $email; ?></p>
	<p><strong>Asunto: </strong> ¡Felicidades <?php $user_info->user_login ?>! Has ganado en yokaiwatchmexico.com</p>

	<?php echo htmlMailGanador($ganador_id);

	if ($sendMailWinner != 1) :
		if ( $dateReal >= $dateFin ): ?>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="action" value="send-mail-ganador">
				<input type="hidden" name="idGanador" value="<?php echo $ganador_id; ?>">

				<input type="submit" value="Enviar email al ganador" class="button button-primary button-large">
			</form>
		<?php endif; 
	else: ?>
		<div class="notice notice-success">
			<p>El correo electrónico ya fue enviado por <?php echo $user_info_send->user_login; ?>.</p>
		</div>
	<?php endif; ?>
	
</div>

<?php include_once($theme_dir.'/templates/rank-list-admin.php'); ?>