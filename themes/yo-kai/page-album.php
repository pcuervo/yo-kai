<?php get_header();
global $current_user;
$category_slug = isset($_GET['cat']) ? $_GET['cat'] : ''; ?>
	<div class="[ width--800p ][ margin-auto ]">
		<div class="row [ margin-bottom--large ][ height--450p ]">

			<div class="col-xs-4">
				<!-- Portrait perfil -->
				<?php get_template_part( 'templates/portrait', 'perfil' ); ?>
			</div>

			<!-- slider -->

			<div id="myCarousel" class="carousel-album carousel slide [ margin-bottom--large ][ absolute top--40 ]" data-ride="carousel">
			<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<!-- <li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li> -->
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

					<?php $result = new WP_Query(
						array(
							'posts_per_page' => -1,
							'post_type' => 'medallas',
							'category_name' => $category_slug
						)
					);

					if ( !empty($result->posts) ):
	                	$count = 1;
	               		$medallas_participante = get_user_meta($current_user->ID, 'medallas', true);
	                   	foreach (array_chunk($result->posts, 16) as $key => $medallas):
	                   		$class = $count == 1 ? 'active' : '';
	                   		echo '<div class="item '.$class.'">';
		                   		echo '<div class="[ inline-block width--32 ]"></div>';
		                    	foreach ($medallas as $key => $medalla):
		                    		$imagen = attachment_image_url( $medalla->ID, 'full'); ?>
		                    		<a href="#" class="image-card">
		                    			<?php $url_image = THEMEPATH.'images/no-card.png';
		                    			$url_image = isset($medallas_participante[$medalla->ID]) ? $imagen : $url_image; ?>

										<img src="<?php echo $url_image; ?>" alt="imagen de perfil">
										<?php if (isset($medallas_participante[$medalla->ID]) AND $medallas_participante[$medalla->ID]['count'] > 1 ): ?>
											<img class="[ multiple-card ]" src="<?php echo THEMEPATH; ?>images/multiple.png" alt="imagen de perfil">
											<p class="[ text-center ][ color-dark ]"><?php echo $medallas_participante[$medalla->ID]['count']; ?></p>
										<?php endif; ?>
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
		</div>

		<div class="[ text-center ][ margin-bottom--xxlarge ]">
			<div class="[ border-primary border-radius--20 ][ inline-block ]">
				<a href="<?php echo site_url('/cargar/'); ?>" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ]">Cargar</a>
			</div>
		</div>
		<div class="[ absolute bottom--48 ]">
			<div class="[ text-center ]">
				<div class="[ category-card ]">
					<a href="<?php echo site_url('/album/'); ?>">
						<img class="[ img-initial ]" src="<?php echo THEMEPATH; ?>/icons/icon_0.png" alt="icono categoría carta">
						<img class="[ img-hover ]" src="<?php echo THEMEPATH; ?>/icons/icon_0a.png" alt="icono categoría carta">
					</a>
				</div><div class="[ category-card ]">
					<a href="<?php echo site_url('/album/'); ?>">
						<img class="[ img-initial ]" src="<?php echo THEMEPATH; ?>/icons/icon_0.png" alt="icono categoría carta">
						<img class="[ img-hover ]" src="<?php echo THEMEPATH; ?>/icons/icon_0a.png" alt="icono categoría carta">
					</a>
				</div><div class="[ category-card ]">
					<a href="<?php echo site_url('/album/'); ?>">
						<img class="[ img-initial ]" src="<?php echo THEMEPATH; ?>/icons/icon_0.png" alt="icono categoría carta">
						<img class="[ img-hover ]" src="<?php echo THEMEPATH; ?>/icons/icon_0a.png" alt="icono categoría carta">
					</a>
				</div>
				<?php $terms = get_terms( 'category', ['hide_empty' => false] );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
				    foreach ( $terms as $term ):
				    	$imagen_term = get_term_meta( $term->term_id, 'imagen_term', true );
				    	$imagen_term_hover = get_term_meta( $term->term_id, 'imagen_term_hover', true ); ?>
				        <div class="[ category-card ]">
							<a href="<?php echo site_url('/album/'); ?>?cat=<?php echo $term->slug; ?>">
								<img class="[ img-initial ]" src="<?php echo $imagen_term; ?>" alt="icono categoría carta">
								<img class="[ img-hover ]" src="<?php echo $imagen_term_hover; ?>" alt="icono categoría carta">
							</a>
						</div>
				    <?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#concurso-terminado">Modal</button>

	<!-- Modal -->
	<div class="modal fade" id="concurso-terminado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="[ absolute width--100vw height--100vh ]"></div>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<img src="<?php echo THEMEPATH; ?>images/logo.png" alt="logo yo-kai watch">
				<p>EL CONCURSO POR LOS PREMIOS HA TERMINADO. PUEDES SEGUIR USANDO EL ÁLBUM DIGITAL PARA DIVERTIRTE, PERO EL RANKING YA NO REGISTRARÁ MOVIMIENTOS A PARTIR DEL 5 DE ENERO DE 2017 A LAS 14 HR.</p>
				<p>¡ESPERAMOS QUE HAYAS RESULTADO GANADOR!</p>
			</div>
			<div class="[ border-primary border-radius--20 ][ inline-block ][ margin-bottom ]">
				<button type="button" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ]" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
<?php get_footer(); ?>