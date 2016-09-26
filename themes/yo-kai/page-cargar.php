<?php get_header();
file_put_contents(
 	'/Users/alejandrosandoval/Desktop/php.txt',
 	var_export( 'siiiiii', true )
 ); 
global $errors;
global $cargaMedalla;
global $idMedalla;
if ($errors != '') {
	echo '<pre>';
	print_r($errors);
	echo '</pre>';
} ?>
	<div class="[ width--800p ][ margin-auto ]">
		<img class="[ absolute right--0 bottom--50 ]" src="<?php echo THEMEPATH; ?>images/fondo-cargar.png" alt="fondo de personajes">
		<div class="row [ margin-bottom--large ]">
			<div class="col-xs-5">
				<!-- Portrait perfil -->
				<?php get_template_part( 'templates/portrait', 'perfil' ); ?>
			</div>
			<div class="col-xs-7">
				<?php if($cargaMedalla != 1): ?>
					<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--xxlarge ]">CARGA TU NUEVA MEDALLA EN TU ÁLBUM DIGITAL. </h2>
					<p>Introduce el código que aparece debajo del código QR en el revés de tu medalla.</p>
				<?php else: ?>
					<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--xxlarge ]">!LISTO, TIENES UNA NUEVA MEDALLA YO-KAI!</h2>
					<p>Ahora puedes cargar otra medalla o volver al álbum.</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row [ margin-bottom--large ]">
			<div class="col-xs-5">
				<?php $imagen = attachment_image_url( $idMedalla, 'full');
				$url_medalla = $cargaMedalla == 1 ? $imagen : THEMEPATH.'images/no-card--large.png';  ?>
				<img class="[ width--100 ]" src="<?php echo $url_medalla; ?>" alt="imagen de interrogacion">
			</div>
			<div class="col-xs-7 [ text-center ][ padding-top--xlarge ]">

				<!-- Al cargar -->
				<?php if($cargaMedalla != 1): ?>
					<form method="POST" data-parsley-validate>
						<div class="form-group [ margin-bottom--large ]">
							<label class="[ hidden ]" for="exampleInputMedalla">Ingresa el código de tu medalla</label>
							<input type="text" class="form-control" name="nuevaMedallaCompetitor" id="exampleInputMedalla" placeholder="Medalla" aria-describedby="medallaHelp" required data-parsley-required-message="ERROR TEXT">
						</div>
						<div class="[ border-primary border-radius--20 ][ inline-block ]">
							<input type="hidden" name="action" value="cargar-nueva-medalla">
							<button type="submit" class="btn btn--primary">Cargar</button>
						</div>
					</form>
				<?php elseif($cargaMedalla == 1): ?>
					<!-- Después de cargar -->
					<div class="[ text-center ]">
						<div class="[ border-primary border-radius--20 ][ inline-block ][ margin-bottom ]">
							<a href="<?php echo site_url('/cargar/'); ?>" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ]">Nueva carga</a>
						</div>
						<div class="[ border-primary border-radius--20 ][ inline-block ]">
							<a href="<?php echo site_url('/album/'); ?>" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ]">Ir al álbum</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>