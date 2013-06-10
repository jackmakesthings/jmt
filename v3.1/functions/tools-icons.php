<?php

function add_tools_icon_meta() { ?>
    <div class="form-field">
		<label for="term_meta[tool_icon]"><?php _e( 'Icon character', 'fromscratch' ); ?></label>
		<input type="text" name="term_meta[tool_icon]" id="term_meta[tool_icon]" value="">
		<p class="description"><?php _e( 'Futuristic as hell!','fromscratch' ); ?></p>
	</div>
<?php } 
add_action( 'project-tools_add_form_fields', 'add_tools_icon_meta', 10, 2 );


function edit_tools_icon_meta($term) {
	$t_id = $term->term_id;
	$term_meta = get_option( "project-tools_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[tool_icon]"><?php _e( 'Icon character', 'fromscratch' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[tool_icon]" id="term_meta[tool_icon]" value="<?php echo esc_attr( $term_meta['tool_icon'] ) ? esc_attr( $term_meta['tool_icon'] ) : ''; ?>">
			<p class="description"><?php _e( 'Futuristic as hell!','fromscratch' ); ?></p>
		</td>
	</tr>
<?php }

add_action( 'project-tools_edit_form_fields', 'edit_tools_icon_meta', 10, 2 );

function save_tools_icon_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "project-tools_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "project-tools_$t_id", $term_meta );
	}
}  
add_action( 'edited_project-tools', 'save_tools_icon_meta', 10, 2 );  
add_action( 'create_project-tools', 'save_tools_icon_meta', 10, 2 );


function show_all_tools($sep, $bg) {
$args = array( 'taxonomy' => 'project-tools' );
$terms = get_terms('project-tools', $args);
$homeurl = home_url();
$color = show_cat_colors($post->id);
$count = count($terms); $i=0;
if ($count > 0) {
    $term_list = '<ul class="icons-list tools-list">';
    foreach ($terms as $term) {
        $i++;
        $t_ID = $term->term_id;
					$term_meta = get_option("project-tools_$t_ID");
					if (!isset($term_meta['tool_icon'])){
					$term_meta['tool_icon'] = '@';
					}
    	if ($bg == 1) { 
    		$term_list .= '<li><a style="background-color:'. $color . '" class=" bg-icon proj-icon ' .$term_meta['tool_icon'] . '"  href="' . $homeurl . '/project-tools/' . $term->slug . '" title="' . sprintf(__('View all post filed under %s', ''), $term->name) . '">' . $term_meta['tool_icon'] . '</a></li>'; }
    	else {     		
    		$term_list .= '<li><a style="color:'. $color . '" class="proj-icon ' .$term_meta['tool_icon'] . '"  href="' . $homeurl . '/project-tools/' . $term->slug . '" title="' . sprintf(__('View all post filed under %s', ''), $term->name) . '">' . $term_meta['tool_icon'] . '</a></li>'; }
    	
    	
    	if ($count != $i && $sep == 1) $term_list .= ' &middot; '; 
    	elseif ($count != $i && sep == 0) $term_list .= '';
    	else $term_list .= '</ul>';
    }
    echo $term_list;
}}

function show_tools_icons(){
	global $post, $post_id;
	$post = &get_post($post->ID);
	$color = show_cat_colors($post->id);
	$taxonomy = 'project-tools';
	$terms = get_the_terms( $post->id, $taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $term ) {
					$t_ID = $term->term_id;
					$term_meta = get_option("project-tools_$t_ID");
					if (isset($term_meta["tool_icon"])){
					$iconmeta = $term_meta["tool_icon"];
					}
			
				$out[] = '<a style="color:'. $color . '" class="proj-icon ' . $term_meta["tool_icon"] . '" href="' .get_term_link($term->slug, $taxonomy) .'" title="' .  $term->name . '">' . $term_meta["tool_icon"] . '</a>'; }
			$return = join( '', $out );
			return $return;
		}
	}
?>