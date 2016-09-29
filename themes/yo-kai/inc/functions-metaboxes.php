<?php // CUSTOM METABOXES //////////////////////////////////////////////////////////////////

add_action('add_meta_boxes', function(){

	add_meta_box( 'meta-box-extras_video', 'Extras video', 'show_metabox_extras_video', 'videos', 'side', 'high' );;

});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////

function show_metabox_extras_video($post){
	global $post;
	wp_nonce_field(__FILE__, 'videos_nonce');
	$id_video = get_post_meta( $post->ID, 'id_video', true );

	$orden_videos = get_post_meta( $post->ID, 'orden_videos', true );
	echo '<pre>';
	 print_r($orden_videos);
	 echo '</pre>'; ?>
	<br/><label for='id_video' class='label-paquetes'>ID video: </label>
	<input type='text' name='id_video' class='widefat' value='<?php echo $id_video; ?>' id='id_video'/>
	<br/><br/><label for='orden_videos' class='label-paquetes'><strong>Posición video:</strong> </label><br/>
	<br/>
	<?php 
	for ($i=1; $i < 6; $i++) { 
		$libre = 'si';
		if (!empty($orden_videos)) {
			foreach ($orden_videos as $key => $orden) {
				if ($orden == $i AND $key != $post->ID) {
					echo '<p>Posicion '.$i.' ('.get_the_title($key).')</p>';
					$libre = 'no';
				}
				
			}
		}
		if ($libre == 'si') {
			$checked = (isset($orden_videos[$post->ID]) AND $orden_videos[$post->ID] == $i) ? 'checked' : ''; ?>
			<input type="radio" name="orden-video" id="orden_videos" value="<?php echo $i; ?>"  <?php echo $checked; ?> /> Posición <?php echo $i; ?><br><br>
		
		<?php }
	}
	
}


// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



add_action('save_post', function($post_id){


	if ( ! current_user_can('edit_page', $post_id)) 
		return $post_id;


	if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
		return $post_id;
	
	
	if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
		return $post_id;


	if (isset($_POST['id_video']) AND check_admin_referer(__FILE__, 'videos_nonce')) {
		update_post_meta( $post_id, 'id_video', $_POST['id_video'] );
		
		$orden_videos = get_post_meta( $post_id, 'orden_videos', true );
		if ($orden_videos == '') $orden_videos = [];

		$orden_videos[$post_id] = $_POST['orden-video'];
		update_post_meta( $post_id, 'orden_videos', $orden_videos );

	}


});

// META TERMS 
// 
// OTHER METABOXES ELEMENTS ///////////////////////////////////////////////////////

add_action( 'category_add_form_fields', 'add_category_field', 10, 2 );
function add_category_field($taxonomy) {
	echo "<div class='form-field'>";
	    echo "<label for='imagen_term' class='label-paquetes'>Imagen: </label>";
		echo "<input type='text' name='imagen_term' class='widefat' value='' id='imagen_term'/>";
	echo "</div>";
	echo "<div class='form-field'>";
	    echo "<label for='imagen_term_hover' class='label-paquetes'>Imagen: </label>";
		echo "<input type='text' name='imagen_term_hover' class='widefat' value='' id='imagen_term_hover'/>";
	echo "</div>";
}

add_action( 'created_category', 'save_feature_meta', 10, 2 );
function save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['imagen_term'] ) && '' !== $_POST['imagen_term'] ){
        add_term_meta( $term_id, 'imagen_term', $_POST['imagen_term'], true );
    }

     if( isset( $_POST['imagen_term_hover'] ) && '' !== $_POST['imagen_term_hover'] ){
        add_term_meta( $term_id, 'imagen_term_hover', $_POST['imagen_term_hover'], true );
    }
}

add_action( 'category_edit_form_fields', 'edit_feature_category', 10, 2 );
function edit_feature_category( $term, $taxonomy ){
                
    $imagen_term = get_term_meta( $term->term_id, 'imagen_term', true );
                
    echo "<tr class='form-field term-group-wrap'>";
    	echo "<th scope='row'>";
	    	echo "<label for='imagen_term' class='label-paquetes'>Imagen: </label>";
	    echo "</th>";
	    echo "<td>";
			echo "<input type='text' name='imagen_term' class='widefat' value='".$imagen_term."' id='imagen_term'/>";
			echo "<p class='description'>Url imagen</p>";
		echo "</td>";
	echo "</tr>";

	$imagen_term_hover = get_term_meta( $term->term_id, 'imagen_term_hover', true );
                
    echo "<tr class='form-field term-group-wrap'>";
    	echo "<th scope='row'>";
	    	echo "<label for='imagen_term_hover' class='label-paquetes'>Imagen hover: </label>";
	    echo "</th>";
	    echo "<td>";
			echo "<input type='text' name='imagen_term_hover' class='widefat' value='".$imagen_term_hover."' id='imagen_term_hover'/>";
			echo "<p class='description'>Url imagen hover</p>";
		echo "</td>";
	echo "</tr>";
}

add_action( 'edited_category', 'update_feature_meta', 10, 2 );
function update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['imagen_term'] ) ){
        update_term_meta( $term_id, 'imagen_term', $_POST['imagen_term'] );
    }

    if( isset( $_POST['imagen_term_hover'] ) ){
        update_term_meta( $term_id, 'imagen_term_hover', $_POST['imagen_term_hover'] );
    }
}