<?php get_header();
global $errors;
global $success;
if ($errors != '') {
	echo '<pre>';
	print_r($errors);
	echo '</pre>';
}
if ($success != '') {
	echo '<pre>';
	print_r($success);
	echo '</pre>';
} ?>
	<div class="[ width--800p ][ margin-auto ]">
	<div class="row [ margin-bottom--large ]">
		<div class="col-xs-4">
			<!-- Portrait perfil -->
			<?php get_template_part( 'templates/portrait', 'perfil' ); ?>
		</div>
		<div class="col-xs-8">
			<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--xxlarge ]">¿Tienes alguna consulta?</h2>
		</div>
	</div>
	<form method="POST" class="[ padding-top--large padding-bottom--large ]" data-parsley-validate>
		<div class="form-group [ margin-bottom--large ]">
			<label for="exampleTextarea" class="[ hidden ]">Mensaje</label>
			<textarea class="form-control" name="contenido-consulta" id="exampleTextarea" rows="9" placeholder="Escríbe aquí tu consulta" aria-describedby="nombreTutorHelp" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO"></textarea>
		</div>
		<div class="[ text-center ][ margin-bottom ]">
			<input type="hidden" name="action" value="guarda-consulta">
			<div class="[ border-primary border-radius--20 ][ inline-block ]">
				<button type="submit" class="btn btn--primary">Enviar</button>
			</div>
		</div>
	</form>
</div>
<?php get_footer(); ?>