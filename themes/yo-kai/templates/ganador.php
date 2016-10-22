<?php $ganador = isset($participantes_ranking[0]) ? $participantes_ranking[0] : [];
$ganador_id = isset($ganador->participante_id) ? $ganador->participante_id : 0;
$email = get_user_meta($ganador_id, '_email_tutor', true);
$user_info = get_userdata($ganador_id); ?>
<div class="wrap nosubsub">
	<h2>Ganador</h2>
	<p><strong>Para: </strong> <?php echo $email; ?></p>
	<p><strong>Asunto: </strong> ¡Felicidades <?php $user_info->user_login ?>! Has ganado en yokaiwatchmexico.com</p>

	
	<?php echo htmlMailGanador($ganador_id); ?>
	
	
</div>