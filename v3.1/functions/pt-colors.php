<?php 

function add_types_color_meta() { ?>
	<div class="form-field">
		<label for="term_meta[type_color]"><?php _e( 'Hex color', 'fromscratch' ); ?></label>
		<input type="text" name="term_meta[type_color]" id="term_meta[type_color]" value="">
		<p class="description"><?php _e( 'Futuristic as hell!','fromscratch' ); ?></p>
	</div>
<?php } 
add_action( 'project-types_add_form_fields', 'add_types_color_meta', 10, 2 );


function edit_types_color_meta($term) {
	$t_id = $term->term_id;
	$term_meta = get_option( "project-types_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[type_color]"><?php _e( 'Hex color', 'fromscratch' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[type_color]" id="term_meta[type_color]" value="<?php echo esc_attr( $term_meta['type_color'] ) ? esc_attr( $term_meta['type_color'] ) : ''; ?>">
			<p class="description"><?php _e( 'Futuristic as hell!','fromscratch' ); ?></p>
		</td>
	</tr>
<?php }

add_action( 'project-types_edit_form_fields', 'edit_types_color_meta', 10, 2 );

function save_types_color_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "project-types_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "project-types_$t_id", $term_meta );
	}
}  
add_action( 'edited_project-types', 'save_types_color_meta', 10, 2 );  
add_action( 'create_project-types', 'save_types_color_meta', 10, 2 );

?>