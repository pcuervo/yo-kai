<?php get_header(); ?>
	<img class="[ absolute ][ width--50 ][ margin-left--25p ][ z-index---1 ]" src="<?php echo THEMEPATH; ?>images/spining-elements.png" alt="imagen spining elements">
	<div class="[ margin-bottom margin-auto ][ width--600p ]">
		<h2 class="[ color-primary ][ text-center ]">Introduce tus datos y los de tu papá, mamá o tutor.</h2>
		<form method="POST" class="[ border-bottom--primary border-top--primary ][ padding-top--large padding-bottom--large ]" data-parsley-validate>
			<p>Datos del participante</p>
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

					<div class="item active">
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/nathan.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/tattletell.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/walkappa.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/whisper.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/negatibuzz.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
					</div>

					<div class="item">
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/katie.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/komajiro.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/komasan.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/mochismo.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/jibanyan.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
					</div>

					<div class="item">
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/chansin.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/cheeksqueek.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/edward.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/hungramps.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
						<a href="#" class="image-perfil">
							<img src="<?php echo THEMEPATH; ?>images/perfil/barnaby.png" alt="imagen de perfil">
							<div class="[ perfil-shadow perfil-unselected ]"></div>
						</a>
					</div>
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

			<p>Datos TUTOR</p>
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
					<label class="form-check-label [ color-light ]">
						<input type="checkbox" data-parsley-mincheck="2" class="form-check-input">
						<a href="<?php echo site_url('/terminos-y-condiciones'); ?>">Acepto Términos y Condiciones</a>
					</label>
				</div>
				<div class="form-check col-sm-6">
					<label class="form-check-label [ color-light ]">
						<input type="checkbox" class="form-check-input">
						Autorizo a mi hijo(a) a utilizar la plataforma y a participar en el concurso Yokai
					</label>
				</div>
			</div>
			<div class="[ text-center ]">
				<input type="hidden" name="action" value="crear-participante">
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