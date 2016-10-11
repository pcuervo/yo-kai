<?php get_header();
global $errors;
$errors_compare = 'El nickname ya esta en uso.';
$nombre = isset($_POST['name-competitor']) ? $_POST['name-competitor'] : '';
$lastName = isset($_POST['last-name-competitor']) ? $_POST['last-name-competitor'] : '';
$nickName = (isset($_POST['nick-name-competitor']) AND $errors != $errors_compare) ? $_POST['nick-name-competitor'] : '';
$nameTutor = isset($_POST['name-tutor']) ? $_POST['name-tutor'] : '';
$lastNameTutor = isset($_POST['last-name-tutor']) ? $_POST['last-name-tutor'] : '';
$telefonoTutor = isset($_POST['telephone-tutor']) ? $_POST['telephone-tutor'] : '';
$emailTutor = isset($_POST['email-tutor']) ? $_POST['email-tutor'] : '';
$avatar_default = '';
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
				<div class="form-group col-xs-6">
					<label class="[ hidden ]" for="exampleInputName">Nombre</label>
					<input type="text" class="form-control" name="name-competitor" id="exampleInputName" placeholder="Nombre" aria-describedby="nombreHelp" value="<?php echo $nombre; ?>" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
				<div class="form-group [ margin-bottom--large ] col-xs-6">
					<label class="[ hidden ]" for="exampleInputApellido">Apellido</label>
					<input type="text" class="form-control" name="last-name-competitor" id="exampleInputApellido" placeholder="Apellido" value="<?php echo $lastName; ?>" aria-describedby="apellidoHelp" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label class="[ hidden ]" for="exampleInputNickName">Nickname</label>
					<input type="text" class="form-control" name="nick-name-competitor" id="exampleInputNickName" placeholder="Nickname" value="<?php echo $nickName; ?>" aria-describedby="nicknameHelp" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
				<div class="form-group [ margin-bottom--large ] col-xs-6">
					<label class="[ hidden ]" for="exampleInputPassword">Contraseña</label>
					<input type="password" class="form-control" name="password-competitor" id="exampleInputPassword" placeholder="Contraseña" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
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
	                    		$class_act = ($key == 2 AND $count == 1) ? 'perfil-selected' : 'perfil-unselected';
	                    		$avatar_default = ($key == 2 AND $count == 1) ? $avatar->ID : $avatar_default;

	                    		$imagen = attachment_image_url( $avatar->ID, 'full'); ?>
	                    		<a href="#" data-id="<?php echo $avatar->ID; ?>" class="image-perfil">
									<img src="<?php echo $imagen; ?>" alt="imagen de perfil">
									<div class="[ perfil-shadow <?php echo $class_act; ?> ]"></div>
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

			<p class="[ font-peace_sansregular ]">Datos tutor</p>
			<div class="row">
				<div class="form-group col-xs-6">
					<label class="[ hidden ]" for="exampleInputNameTutor">Nombre</label>
					<input type="text" class="form-control" name="name-tutor" id="exampleInputNameTutor" placeholder="Nombre" value="<?php echo $nameTutor; ?>" aria-describedby="nombreTutorHelp" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
				<div class="form-group [ margin-bottom--large ] col-xs-6">
					<label class="[ hidden ]" for="exampleInputApellidoTutor">Apellido</label>
					<input type="text" class="form-control" name="last-name-tutor" id="exampleInputApellidoTutor" placeholder="Apellido" value="<?php echo $lastNameTutor; ?>" aria-describedby="apellidoTutorHelp" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<label class="[ hidden ]" for="exampleInputTelefono">Telefono</label>
					<input type="tel" class="form-control" name="telephone-tutor" id="exampleInputTelefono" placeholder="Telefono" value="<?php echo $telefonoTutor; ?>" aria-describedby="telefonoHelp" required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
				<div class="form-group [ margin-bottom--large ] col-xs-6">
					<label class="[ hidden ]" for="exampleInputEmail">Email</label>
					<input type="email" class="form-control" name="email-tutor" id="exampleInputEmail" placeholder="Email" value="<?php echo $emailTutor; ?>" required data-parsley-type-message="ESTE CAMPO ES OBLIGATORIO"  data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
				</div>
			</div>
			<div class="row [ margin-bottom--large ]">
				<div class=" col-xs-6">
					<div class="form-check">
						<input type="checkbox" id="terminos-y-condiciones" name="terminos-y-condiciones" required required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
						<label class="[ flex ][ line-height--30 ]" for="terminos-y-condiciones"><span class="[ width--25 ]"></span>
							<a href="<?php echo site_url('/terminos-y-condiciones'); ?>" target="_blank" class="[ font-size--16 ]">Acepto Términos y Condiciones</a>
						</label>
					</div>
				</div>
				<div class=" col-xs-6">
					<div class="form-check">
						<input type="checkbox" id="autorizacion" name="autorizacion" required required data-parsley-required-message="ESTE CAMPO ES OBLIGATORIO">
						<label class="[ flex ][ font-size--16 ][ line-height--30 ][ color-light ]" for="autorizacion"><span></span>
							Autorizo a mi hijo(a) a utilizar la plataforma y a participar en el concurso Yokai
						</label>
					</div>
				</div>
			</div>
			<div class="[ text-center ]">
				<input type="hidden" name="action" value="crear-participante">
				<input type="hidden" id="avatar-participante" name="avatar-participante" value="<?php echo $avatar_default; ?>">

				<div class="[ border-primary border-radius--20 ][ inline-block ]">
					<button type="submit" class="btn btn--primary">CREAR CUENTA</button>
				</div>
			</div>
		</form>
	</div>
	<div class="[ text-center ][ margin-bottom--xxlarge ]">
		<a class="[ font-size--16 ][ margin-left ][ margin-right ]" target="_blank" href="<?php echo site_url('/terminos-y-condiciones'); ?>">Términos y Condiciones</a>
		<a class="[ font-size--16 ][ margin-left ][ margin-right ]" target="_blank" href="<?php echo site_url('/aviso-de-privacidad'); ?>">Aviso de Privacidad</a>
	</div>
<?php get_footer(); ?>