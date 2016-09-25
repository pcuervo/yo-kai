<?php // OTHER METABOXES ELEMENTS ///////////////////////////////////////////////////////

// META TERMS 

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