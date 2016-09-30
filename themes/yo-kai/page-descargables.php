<?php get_header();
global $current_user;
	$medallas_participante = get_user_meta($current_user->ID, 'medallas', true);
	$countMedallasParticipante = $medallas_participante == '' ? 0 : count($medallas_participante); ?>
	<div class="[ width--800p ][ margin-auto ]">
	<div class="row [ margin-bottom--large ]">
		<div class="col-xs-4">
			<!-- Portrait perfil -->
			<?php get_template_part( 'templates/portrait', 'perfil' ); ?>
		</div>
		<div class="col-xs-8">
			<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--large1 ]">¡ENTRE MÁS MEDALLAS CONSIGAS, PODRÁS DESCARGAR MÁS SORPRESAS YO-KAI!</h2>
		</div>
	</div>
	<div class="[ row ][ text-center ]">
		<div class="[ col-xs-4 ]">
			<?php $desc_3 = get_option( 'descargable_3' );
			if ($countMedallasParticipante >= 30): ?>
				<img src="<?php echo THEMEPATH; ?>images/puerta1a.png" alt="imagen de descargable">
			<?php else: ?>
				<img src="<?php echo THEMEPATH; ?>images/puerta1.png" alt="imagen de descargable">
			<?php endif; ?>
			<div class="[ text-center ][ margin-bottom--xxlarge ]">
				<div class="[ border-primary border-radius--20 ][ inline-block ]">
					<?php if ($countMedallasParticipante >= 30): ?>
						<a href="<?php echo $desc_3; ?>" target="_blank" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ][ width--200p ]">DESCARGAR</a>
					<?php else: ?>
						<a href="#" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ][ width--200p ]">30/44</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="[ col-xs-4 ]">
			<?php $desc_2 = get_option( 'descargable_2' );
			if ($countMedallasParticipante >= 20): ?>
				<img src="<?php echo THEMEPATH; ?>images/puerta2a.png" alt="imagen de descargable">
			<?php else: ?>
				<img src="<?php echo THEMEPATH; ?>images/puerta2.png" alt="imagen de descargable">
			<?php endif; ?>
			<div class="[ text-center ][ margin-bottom--xxlarge ]">
				<div class="[ border-primary border-radius--20 ][ inline-block ]">
					<?php if ($countMedallasParticipante >= 20): ?>
						<a href="<?php echo $desc_2; ?>" target="_blank" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ][ width--200p ]">DESCARGAR</a>
					<?php else: ?>
						<a href="#" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ][ width--200p ]">20/44</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="[ col-xs-4 ]">
			<?php $desc_1 = get_option( 'descargable_1' );
			if ($countMedallasParticipante >= 10): ?>
				<img src="<?php echo THEMEPATH; ?>images/puerta3a.png" alt="imagen de descargable">
			<?php else: ?>
				<img src="<?php echo THEMEPATH; ?>images/puerta3.png" alt="imagen de descargable">
			<?php endif; ?>
			<div class="[ text-center ][ margin-bottom--xxlarge ]">
				<div class="[ border-primary border-radius--20 ][ inline-block ]">
					<?php if ($countMedallasParticipante >= 10): ?>
						<a href="<?php echo $desc_1; ?>" target="_blank" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ][ width--200p ]">DESCARGAR</a>
					<?php else: ?>
						<a href="#" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ][ width--200p ]">10/44</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>