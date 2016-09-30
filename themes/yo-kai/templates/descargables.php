<div class="wrap nosubsub">
	<h2>Descargables</h2>

	<div class="hide-sidebar sidebar-for-errors cont-cupones">
		<h3>Cargar cupones para un evento</h3>
		<p class="description" id="tagline-description">URL del archivo descargable.</p>
		<form action="" method="POST" enctype="multipart/form-data">
				
			<table class="form-table">
				<tbody>
					<tr>
						<?php $desc_1 = get_option( 'descargable_1' ); ?>
						<th scope="row"><label for="descargable_1">Descargable 10/40</label></th>
						<td><input name="descargable_1" type="text" id="descargable_1" value="<?php echo $desc_1; ?>" class="widefat"></td>
					</tr>
					<tr>
						<?php $desc_2 = get_option( 'descargable_2' ); ?>
						<th scope="row"><label for="descargable_2">Descargable 20/40</label></th>
						<td><input name="descargable_2" type="text" id="descargable_2" value="<?php echo $desc_2; ?>" class="widefat"></td>
					</tr>
					<tr>
						<?php $desc_3 = get_option( 'descargable_3' ); ?>
						<th scope="row"><label for="descargable_3">Descargable 30/40</label></th>
						<td><input name="descargable_3" type="text" id="descargable_3" value="<?php echo $desc_3; ?>" class="widefat"></td>
					</tr>
				
				</tbody>
			</table>
			<input type="hidden" name="action" value="save-descargables">
			<input type="submit" value="Guardar" class="button button-primary button-large">
		</form>
	</div>
</div>