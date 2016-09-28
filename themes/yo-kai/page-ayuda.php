<?php get_header(); ?>
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
	<div class="form-group [ margin-bottom--large ]">
		<label for="exampleTextarea" class="[ hidden ]">Mensaje</label>
		<textarea class="form-control" id="exampleTextarea" rows="9" placeholder="Escríbe aquí tu consulta"></textarea>
	</div>
	<div class="[ text-center ][ margin-bottom--xxlarge ]">
		<div class="[ border-primary border-radius--20 ][ inline-block ]">
			<button type="submit" class="btn btn--primary">Enviar</button>
		</div>
	</div>
</div>
<?php get_footer(); ?>