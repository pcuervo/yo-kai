<?php global $current_user;
$count_medallas = wp_count_posts('medallas');
$medallas_participante = get_user_meta($current_user->ID, 'medallas', true);
$countMedallasParticipante = $medallas_participante == '' ? 0 : count($medallas_participante);
$rankingParticipante = Medallas::getRankingParticipanteId($current_user->ID); ?>

<div class="[ portrait-perfil ][ z-index--1 ]">
	<img class="[ portrait ]" src="<?php echo THEMEPATH; ?>images/portrait.png" alt="portada perfil">
	<img class="[ avatar ]" src="<?php echo THEMEPATH; ?>images/perfil/whisper.png" alt="portada perfil">
	<p class="[ nombre ]"><?php echo isset($current_user->user_login) ? $current_user->user_login : 'no login'; ?></p>
	<p class="[ puntaje ]"><?php echo $countMedallasParticipante ?>/<?php echo $count_medallas->publish; ?></p>
	<div class="[ border ]">
		<div class="[ circle ]">
			<p>Nº</p>
			<p><?php echo $rankingParticipante != '' ? $rankingParticipante : 0; ?></p>
		</div>
	</div>
</div>