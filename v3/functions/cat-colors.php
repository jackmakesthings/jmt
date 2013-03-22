<?php 
function add_category_meta() { ?>
	<div class="form-field">
		<label for="cat_meta[category_color]"><?php _e( 'Hex color', 'jackboxes' ); ?></label>
		<input type="text" name="cat_meta[category_color]" id="cat_meta[category_color]" value="">
		<p class="description"><?php _e( 'Futuristic as hell!','jackboxes' ); ?></p>
	</div>
<?php } ?>
<?php add_action( 'category_add_form_fields', 'add_category_meta', 10, 2 );


function edit_category_meta($term) {
	$t_id = $term->term_id;
	$cat_meta = get_option( "category_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="cat_meta[category_color]"><?php _e( 'Hex color', '' ); ?></label></th>
		<td>
			<input type="text" name="cat_meta[category_color]" id="cat_meta[category_color]" value="<?php echo esc_attr( $cat_meta['category_color'] ) ? esc_attr( $cat_meta['category_color'] ) : ''; ?>">
			<p class="description"><?php _e( 'Futuristic as hell!','jackboxes' ); ?></p>
		</td>
	</tr>
<?php } ?>
<?php add_action( 'category_edit_form_fields', 'edit_category_meta', 10, 2 );

function save_category_meta( $term_id ) {
	if ( isset( $_POST['cat_meta'] ) ) {
		$t_id = $term_id;
		$cat_meta = get_option( "category_$t_id" );
		$cat_keys = array_keys( $_POST['cat_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['cat_meta'][$key] ) ) {
				$cat_meta[$key] = $_POST['cat_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "category_$t_id", $cat_meta );
	}
}  
add_action( 'edited_category', 'save_category_meta', 10, 2 );  
add_action( 'create_category', 'save_category_meta', 10, 2 );

function show_cat_colors() {
	
	$post = &get_post($post->ID);
	$taxonomy = 'category';
	$terms = get_the_terms( $post->id, $taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $term ) {
					$t_ID = $term->term_id;
					$cat_meta = get_option("category_$t_ID");
					if (isset($cat_meta['category_color'])){
					  $colormeta = $cat_meta['category_color'];
					}
					$out[] = '#' .$cat_meta['category_color'] . ''; }
			$return = join( ' ', $out );
			return $return;
		}
	}
	
?>