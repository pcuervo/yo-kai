<?php get_header();
global $errors;
if ($errors != '') {
	echo '<pre>';
	print_r($errors);
	echo '</pre>';
} ?>
	<img class="[ absolute ][ width--50 ][ margin-left--25p ][ z-index---1 ]" src="<?php echo THEMEPATH; ?>images/spining-elements.png" alt="imagen spining elements">
	<div class="[ margin-bottom margin-auto ][ width--600p ]">
		<h2 class="[ color-primary ][ text-center ]">Introduce tus datos y los de tu papá, mamá o tutor.</h2>
		<form method="POST" class="[ border-bottom--primary border-top--primary ][ padding-top--large padding-bottom--large ]" data-parsley-validate>
			<p class="[ font-peace_sansregular ]">Datos del participante</p>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="[ hidden ]" for="exampleInputName">Nombre</label>
					<input type="text" class="form-control" name="name-competitor" id="exampleInputName" placeholder="Nombre" aria-describedby="nombreHelp" required data-parsley-required-message="ERROR TEXT">
				</div>
				<div class="form-group [ margin-bottom--large ] col-sm-6">
					<label class="[ hidden ]" for="exampleInputApellido">Apellido</label>
					<input type="text" class="form-control" name="last-name-competitor" id="exampleInputApellido" placeholder="Apellido" aria-describedby="apellidoHelp" required data-parsley-required-message="ERROR TEXT">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="[ hidden ]" for="exampleInputNickName">Nickname</label>
					<input type="text" class="form-control" name="nick-name-competitor" id="exampleInputNickName" placeholder="Nickname" aria-describedby="nicknameHelp" required data-parsley-required-message="ERROR TEXT">
				</div>
				<div class="form-group [ margin-bottom--large ] col-sm-6">
					<label class="[ hidden ]" for="exampleInputPassword">Contraseña</label>
					<input type="password" class="form-control" name="password-competitor" id="exampleInputPassword" placeholder="Contraseña" required data-parsley-required-message="ERROR TEXT">
				</div>
			</div>
			<p class="[ text-center ]"> Elige tu imagen de perfil:</p>

			<!-- slider -->

			<div id="myCarousel" class="carousel slide [ margin-bottom--large ]" data-ride="carousel">
			<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

					<?php $args = array(
	                        'post_type' => 'post',
	                        'posts_per_page' => -1
	                        );
	                $result = new WP_Query( $args );

	                if ( !empty($result->posts) ):
	                	$count = 1;
	                   	foreach (array_chunk($result->posts, 5) as $key => $avatars):
	                   		$class = $count == 1 ? 'active' : '';
	                   		echo '<div class="item '.$class.'">';
	                    	foreach ($avatars as $key => $avatar):
	                    		$imagen = attachment_image_url( $avatar->ID, 'full'); ?>
	                    		<a href="#" data-id="<?php echo $avatar->ID; ?>" class="image-perfil">
									<img src="<?php echo $imagen; ?>" alt="imagen de perfil">
									<div class="[ perfil-shadow perfil-unselected ]"></div>
								</a>
	                    	<?php endforeach;
                    		echo '</div>';
                    		$count++;
                    	endforeach;
                	endif; ?>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<img src="<?php echo THEMEPATH; ?>images/perfil/arrow-left.png" alt="arrow de perfil">
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<img src="<?php echo THEMEPATH; ?>images/perfil/arrow-right.png" alt="arrow de perfil">
					<span class="sr-only">Next</span>
				</a>
			</div>

			<p class="[ font-peace_sansregular ]">Datos TUTOR</p>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="[ hidden ]" for="exampleInputNameTutor">Nombre</label>
					<input type="text" class="form-control" name="name-tutor" id="exampleInputNameTutor" placeholder="Nombre" aria-describedby="nombreTutorHelp" required data-parsley-required-message="ERROR TEXT">
				</div>
				<div class="form-group [ margin-bottom--large ] col-sm-6">
					<label class="[ hidden ]" for="exampleInputApellidoTutor">Apellido</label>
					<input type="text" class="form-control" name="last-name-tutor" id="exampleInputApellidoTutor" placeholder="Apellido" aria-describedby="apellidoTutorHelp" required data-parsley-required-message="ERROR TEXT">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="[ hidden ]" for="exampleInputTelefono">Telefono</label>
					<input type="tel" class="form-control" name="telephone-tutor" id="exampleInputTelefono" placeholder="Telefono" aria-describedby="telefonoHelp" required data-parsley-required-message="ERROR TEXT">
				</div>
				<div class="form-group [ margin-bottom--large ] col-sm-6">
					<label class="[ hidden ]" for="exampleInputEmail">Email</label>
					<input type="email" class="form-control" name="email-tutor" id="exampleInputEmail" placeholder="Email" required data-parsley-type-message="ERROR TEXT"  data-parsley-required-message="ERROR TEXT">
				</div>
			</div>
			<div class="row [ margin-bottom--large ]">
				<div class="form-check col-sm-6">
					<input type="checkbox" id="terminos-y-condiciones" name="terminos-y-condiciones" required required data-parsley-required-message="ERROR TEXT">
					<label class="[ line-height--30 ]" for="terminos-y-condiciones"><span></span>
						<a href="<?php echo site_url('/terminos-y-condiciones'); ?>">Acepto Términos y Condiciones</a>
					</label>
				</div>
				<div class="form-check col-sm-6">
					<input type="checkbox" id="autorizacion" name="autorizacion" required required data-parsley-required-message="ERROR TEXT">
					<label class="[ line-height--30 ][ color-light ]" for="autorizacion"><span></span>
						Autorizo a mi hijo(a) a utilizar la plataforma y a participar en el concurso Yokai
					</label>
				</div>
			</div>
			<div class="[ text-center ]">
				<input type="hidden" name="action" value="crear-participante">
				<input type="hidden" id="avatar-participante" name="avatar-participante" value="">

				<div class="[ border-primary border-radius--20 ][ inline-block ]">
					<button type="submit" class="btn btn--primary">CREAR CUENTA</button>
				</div>
			</div>
		</form>
	</div>
	<div class="[ text-center ][ margin-bottom--large ]">
		<a class="[ margin-left ][ margin-right ]" href="<?php echo site_url('/terminos-y-condiciones'); ?>">Términos y Condiciones</a>
		<a class="[ margin-left ][ margin-right ]" href="<?php echo site_url('/aviso-de-privacidad'); ?>">Aviso de Privacidad</a>
	</div>
<?php get_footer(); ?>