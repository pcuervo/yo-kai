<?php get_header(); ?>
	<div class="[ width--800p ][ margin-auto ]">
	<div class="row [ margin-bottom--large ]">
		<div class="col-xs-4">
			<div class="[ portrait-perfil ]">
				<img class="[ portrait ]" src="<?php echo THEMEPATH; ?>images/portrait.png" alt="portada perfil">
				<img class="[ avatar ]" src="<?php echo THEMEPATH; ?>images/perfil/whisper.png" alt="portada perfil">
				<p class="[ nombre ]">Juancho panza</p>
				<p class="[ puntaje ]">44/44</p>
				<div class="[ border ]">
					<div class="[ circle ]">
						<p>Nº</p>
						<p>888</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-8">
			<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ]">¿Tienes alguna consulta?</h2>
		</div>
	</div>
	<div class="form-group [ margin-bottom--large ]">
		<label for="exampleTextarea" class="[ hidden ]">Mensaje</label>
		<textarea class="form-control" id="exampleTextarea" rows="9"></textarea>
	</div>
	<div class="[ text-center ]">
		<div class="[ border-primary border-radius--20 ][ inline-block ]">
			<button type="submit" class="btn btn--primary">Enviar</button>
		</div>
	</div>
</div>
<?php get_footer(); ?>