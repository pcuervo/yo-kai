<?php get_header(); ?>
<div class="[ width--800p ][ margin-auto ]">
	<div class="row [ margin-bottom--large ]">
		<div class="col-sm-4">
			<!-- Portrait perfil -->
			<?php get_template_part( 'templates/portrait', 'perfil' ); ?>
		</div>
		<div class="col-sm-8">
			<h2 class="[ text-center ][ padding-bottom--small ][ color-primary ][ border-bottom--primary ][ margin-top--xxlarge ]">¡Descubre más del mundo yo-kai</h2>
		</div>
	</div>
	<div class="row [ margin-bottom--large ]">
		<?php $video_1 = get_option( 'orden_videos_1');
		if ($video_1 != ''): 
			$id_video = get_post_meta( $video_1, 'id_video', true ); ?>
			<div class="col-xs-12">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id_video; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<h3 class="[ color-light ][ text-uppercase ]"><?php echo get_the_title($video_1); ?></h3>
			</div>
		<?php endif; ?>
	</div>
	<div class="row [ margin-bottom--large ]">
		<?php $video_2 = get_option( 'orden_videos_2');
		if ($video_2 != ''): 
			$id_video_2 = get_post_meta( $video_2, 'id_video', true ); ?>
			<div class="col-xs-6">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id_video_2; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<h3 class="[ color-light ][ text-uppercase ]"><?php echo get_the_title($video_2); ?></h3>
			</div>
		<?php endif;
		$video_3 = get_option( 'orden_videos_3');
		if ($video_3 != ''): 
			$id_video_3 = get_post_meta( $video_3, 'id_video', true ); ?>
			<div class="col-xs-6">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id_video_3; ?>" frameborder="0" allowfullscreen></iframe>			</div>
				<h3 class="[ color-light ][ text-uppercase ]"><?php echo get_the_title($video_3); ?></h3>
			</div>
		<?php endif; ?>
	</div>
	<?php $video_4 = get_option( 'orden_videos_4');
	$video_5 = get_option( 'orden_videos_5');
	if ($video_4 || $video_5): ?>
		<div class="row [ margin-bottom--large ]">
			<?php if ($video_4 != ''): 
				$id_video_4 = get_post_meta( $video_4, 'id_video', true ); ?>
				<div class="col-xs-6">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id_video_4; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
					<h3 class="[ color-light ][ text-uppercase ]"><?php echo get_the_title($video_4); ?></h3>
				</div>
			<?php endif;
			if ($video_5 != ''): 
				$id_video_5 = get_post_meta( $video_5, 'id_video', true ); ?>
				<div class="col-xs-6">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id_video_5; ?>" frameborder="0" allowfullscreen></iframe>			</div>
					<h3 class="[ color-light ][ text-uppercase ]"><?php echo get_the_title($video_5); ?></h3>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="row [ margin-bottom--xxlarge ]">
		<div class="col-xs-6">
			<a href="http://www.hasbro.com/es-mx/toys-games/yokai" target="_blank" class="[ text-decoration-none block ]">
				<img class="[ width--100 ]" src="<?php echo THEMEPATH; ?>images/productos.png" alt="productos">
				<h3 class="[ color-light ][ text-uppercase ][ color-primary--hover ]">Encuentra aquí los productos Yo-kai</h3>
			</a>
		</div>
		<div class="col-xs-6">
			<a href="https://www.youtube.com/channel/UCZWFPpoheQVPrcG68A3ayVw" target="_blank" class="[ text-decoration-none block ]">
				<img class="[ width--100 ]" src="<?php echo THEMEPATH; ?>images/mas-videos.png" alt="imagen más videos">
				<h3 class="[ color-light ][ text-uppercase ][ color-primary--hover ]">¡Mira más videos!</h3>
			</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>