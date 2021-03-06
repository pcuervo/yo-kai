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
	<img class="[ absolute ][ width--50 ][ margin-left--25p ][ z-index---1 ]" src="<?php echo THEMEPATH; ?>images/spining-elements.png" alt="imagen spining elements">
	<img class="[ absolute left--0 ]" src="<?php echo THEMEPATH; ?>images/chabon.png" alt="imagen chabon">
	<img class="[ absolute right--0 ]" src="<?php echo THEMEPATH; ?>images/banda.png" alt="imagen banda">
	<div class="[ text-center ][ margin-bottom--xxlarge margin-auto ][ width--600p ]">
		<h2 class="[ color-primary ]">ESCRIBE EL CORREO DE TU PAPÁ, MAMÁ O TUTOR PARA ENVIARLE TU CONTRASEÑA.</h2>
		<form method="POST" class="[ border-bottom--primary border-top--primary ][ padding-top--large padding-bottom--large ]" data-parsley-validate>
			<div class="form-group [ margin-bottom--large ]">
				<label class="[ hidden ]" for="exampleInputEmail">Email</label>
				<input type="text" class="form-control" name="valorRecuperar" id="exampleInputEmail" placeholder="Email ó nickname" aria-describedby="emailHelp" required data-parsley-type-message="ESTE CAMPO ES OBLIGATORIO" data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
			</div>
			<input type="hidden" name="action" value="recuperar-contrasena">
			<div class="[ border-primary border-radius--20 ][ inline-block ]"><button type="submit" class="btn btn--primary">Recuperar</button></div>
		</form>
	</div>
<?php get_footer(); ?>