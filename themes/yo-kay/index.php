<?php get_header(); ?>
	<img class="[ absolute ][ width--50 ][ margin-left--25p ][ z-index---1 ]" src="<?php echo THEMEPATH; ?>images/spining-elements.png" alt="imagen spining elements">
	<img class="[ absolute left--0 ]" src="<?php echo THEMEPATH; ?>images/chabon.png" alt="imagen chabon">
	<img class="[ absolute right--0 ]" src="<?php echo THEMEPATH; ?>images/banda.png" alt="imagen banda">
	<div class="[ text-center ][ margin-bottom margin-auto ][ width--600p ]">
		<h2 class="[ color-primary ]">COLECCIONA LAS MEDALLAS YO-KAI Y GANA UN NINTENDO 2DS Y MUCHOS PREMIOS MÁS. REGÍSTRATE Y CREA TU ÁLBUM DIGITAL.</h2>
		<form class="[ border-bottom--primary border-top--primary ][ padding-top--large padding-bottom--large ]" data-parsley-validate>
			<div class="form-group">
				<label class="[ hidden ]" for="exampleInputNickname">Nickname</label>
				<input type="text" class="form-control" id="exampleInputNickName" placeholder="Nickname" aria-describedby="nicknameHelp" required data-parsley-required-message="ERROR TEXT">
			</div>
			<div class="form-group [ margin-bottom--large ]">
				<label class="[ hidden ]" for="exampleInputPassword">Contraseña</label>
				<input type="password" class="form-control" id="exampleInputPassword" placeholder="Contraseña" required data-parsley-required-message="ERROR TEXT">
			</div>
			<div class="[ border-primary border-radius--20 ][ inline-block ]"><button type="submit" class="btn btn--primary">Ingresar</button></div>
		</form>
	</div>
	<div class="[ text-center ]">
		<a class="[ margin-left ][ margin-right ]" href="<?php echo site_url('/registro'); ?>">Crear cuenta</a>
		<a class="[ margin-left ][ margin-right ]" href="<?php echo site_url('/recuperar-contrasena'); ?>">Recuperar contraseña</a>
	</div>
<?php get_footer(); ?>