<<<<<<< HEAD
<?php
	get_header();
	the_post();
?>
	<img class="[ absolute ][ width--50 ][ margin-left--25p ][ z-index---1 ]" src="<?php echo THEMEPATH; ?>images/spining-elements.png" alt="imagen spining elements">
	<h2 class="[ color-primary ][ text-center ]">Aviso de privacidad</h2>
	<div class="[ text-center ][ margin-bottom--large margin-auto ][ width--800p ]">
		<div class="[ border-bottom--primary border-top--primary ][ padding-top--large padding-bottom--large ]">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="[ text-center ][ margin-bottom--xxlarge ]">
		<div class="[ border-primary border-radius--20 ][ inline-block ]">
			<a href="<?php echo site_url('/registro'); ?>" class="[ inline-block ][ btn btn--primary ][ text-center ][ margin-auto ]">VOLVER</a>
		</div>
	</div>
<?php get_footer(); ?>