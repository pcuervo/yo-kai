<?php global $current_user;
$count_medallas = wp_count_posts('medallas'); ?>
<div class="[ portrait-perfil ][ z-index--1 ]">
	<img class="[ portrait ]" src="<?php echo THEMEPATH; ?>images/portrait.png" alt="portada perfil">
	<img class="[ avatar ]" src="<?php echo THEMEPATH; ?>images/perfil/whisper.png" alt="portada perfil">
	<p class="[ nombre ]"><?php echo isset($current_user->user_login) ? $current_user->user_login : 'no login'; ?></p>
	<p class="[ puntaje ]">44/<?php echo $count_medallas->publish; ?></p>
	<div class="[ border ]">
		<div class="[ circle ]">
			<p>Nº</p>
			<p>888</p>
		</div>
	</div>
</div>