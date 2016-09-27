<?php get_header(); ?>
	<div class="[ width--800p ][ margin-auto ]">
	<div class="row [ margin-bottom--large ]">
		<div class="col-xs-4">
			<!-- Portrait perfil -->
			<?php get_template_part( 'templates/portrait', 'perfil' ); ?>
		</div>
		<div class="col-xs-8">
			<div id="ranking-abierto">
				<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--xxlarge ]">¡Posiciónate entre los primeros 10 y gana un premio!</h2>
				<p class="[ text-center ]">El concurso termina el 5 de enero de 2017 a las 14hrs. En caso de empate, se ubicará en mejor posición quien haya registrado primero sus medallas.</p>
			</div>
			<h2 id="ranking-cerrado" class="[ hidden ][ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--xxlarge ]">Estas son las posiciones finales. ¡Sigue usando el album digital!</h2>
		</div>
	</div>
	<div class="[ box-raking ][ margin-bottom--large ]">
		<div class="row [ margin-bottom ]">
			<div class="col-xs-3">
				<h3 class="[ color-light ]">Posición</h3>
			</div>
			<div class="col-xs-6">
				<h3 class="[ color-light ]">Usuario</h3>
			</div>
			<div class="col-xs-3">
				<h3 class="[ color-light ]">Medallas</h3>
			</div>
		</div>
		<?php $participantes_ranking = Medallas::ranking();
		if (!empty($participantes_ranking)):
			$count_medallas = wp_count_posts('medallas');
			foreach ($participantes_ranking as $key => $paricipante):
			$imagen_perfil = getAvatarParticipanteId($paricipante->participante_id);
			$user_info = get_userdata($paricipante->participante_id); ?>
				<div class="row [ margin-bottom ]">
					<div class="col-xs-3">
						<p class="[ color-primary ][ font-size--24 ][ margin-top--large ]">Nº <?php echo $paricipante->rank; ?></p>
					</div>
					<div class="col-xs-6">
						<img src="<?php echo THEMEPATH; ?>images/portrait-1.png" alt="fondo de perfil">
						<img class="[ avatar ]" src="<?php echo $imagen_perfil; ?>" alt="fondo de perfil">
						<p class="[ nombre ]"><?php echo $user_info->user_login; ?></p>
					</div>
					<div class="col-xs-3">
						<p class="[ color-primary ][ font-size--24 ][ margin-top--large ]"><?php echo $paricipante->numero_de_medallas; ?>/<?php echo $count_medallas->publish; ?></p>
					</div>
				</div>
			<?php endforeach;
		endif; ?>
	</div>

</div>
<?php get_footer(); ?>