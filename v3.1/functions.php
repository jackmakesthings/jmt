<?php

 if(!defined('WP_THEME_URL')) {
	define( 'WP_THEME_URL', get_bloginfo('template_directory'));
}

//include('functions/theme-panel.php');
include('functions/shortcodes.php');
include('functions/project_cpt.php');
include('functions/tools-icons.php');
include('functions/cat-colors.php');
// include('functions/pt-colors.php');
// include('style2.php');
/**
* Initiate Theme Options
*
* @uses wp_deregister_script()
* @uses wp_register_script()
* @uses wp_enqueue_script()
* @uses register_nav_menus()
* @uses add_theme_support()
* @uses is_admin()
*
* @access public
* @since 1.0.0
*
* @return void
*/

function init_fromscratchtwo() {
	
	if(!is_admin()) {
	
	wp_deregister_script( 'jquery' );
    	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');
    	wp_enqueue_script( 'jquery' );
    	
    	wp_register_script( 'easing', WP_THEME_URL . '/js/jquery.easing.js');
    	wp_enqueue_script( 'easing' );
    	 	
    	    	
    	wp_register_script( 'masonry', WP_THEME_URL . '/js/jquery.masonry.min.js');
    	wp_enqueue_script( 'masonry' ); 
    	
		wp_register_script( 'filterable', WP_THEME_URL . '/js/filterable.js');
    	wp_enqueue_script( 'filterable' ); 

    	  	
    }
    
	register_nav_menu( 'primary', 'Primary Menu' );
	
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'fromscratchtwo' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'fromscratchtwo' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'fromscratchtwo' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area for the right side of posts and pages', 'fromscratchtwo' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li><div class="widget-divider"></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
		
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 220, 220, true );
	add_custom_background();
	add_image_size( 'grid-thumb', 200, 200, true );
 }    
add_action('init', 'init_fromscratchtwo');

function my_get_posts( $query ) {
	if ( is_single() || is_home() || is_category() || is_tax() || is_tag())
		$query->set( 'post_type', array( 'project' ) );
		return $query; 
		}
add_filter( 'pre_get_posts', 'my_get_posts' );

		
// post class stylin'

function project_cpclass($classes) {
	    global $post, $post_id;
	    	$cpclass = get_post_custom_values('cpclass', $post->ID);
	  		 if ( !$cpclass ) return $classes;
	  		 	  		 else foreach((get_post_custom_values('cpclass', $post->ID)) as $value) { $classes[] = $value; }
	        return $classes;   
	}
add_filter('post_class', 'project_cpclass');

function project_toolclass($classes) {
	    global $post, $post_id;
	    	// $toolclass = get_post_custom_values('project-tools', $post->ID);
		$taxonomy = 'project-tools';
		$terms = get_the_terms( $post->id, $taxonomy );
		$cats = get_the_terms( $post->id, 'category' );
		if ( empty ($cats) ) return $classes;
		else foreach ( $cats as $category ) { $classes[] = $category->slug; }
		if ( empty( $terms )) return $classes;
		else foreach ( $terms as $term ) { $classes[] = $term->slug; }
	    return $classes;
	    
	}
add_filter('post_class', 'project_toolclass');

function jacks_category_list() {
	$args=array(
  		'orderby' => 'name',
  		'order' => 'ASC',
		// 'hide_empty' => false
  		);
	$categories=get_categories($args);
	echo '<ul class="sorting">';
	echo '<li><a href="#">All Things</a></li>';
  	foreach($categories as $category) { 
    		echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . $category->description . '" ' . '>' . $category->description.'</a> </li> ';
		 } 
	echo '</ul>';
	}
function cat_nav() {
	$args=array(
		'orderby' => 'name',
		'order' => 'ASC',
		'exclude' => '1'
		);
	$cats=get_categories($args);
	foreach ($cats as $category) {
			$t_ID = $category->term_id;
			$cat_meta = get_option("category_$t_ID");
			$link = get_category_link($t_ID);
					if (isset($cat_meta['category_color'])){
					  $colormeta = $cat_meta['category_color'];
					}
					$out[] = '<li class="' . $category->slug . '" style="background:#' .$cat_meta['category_color'] . '"><a href="' . $link . '">'. $category->name . '</a></li>'; }
			$return = '<ul><h2>JUMP TO</h2>';
			$return .= join( '', $out );
			$return .= '</ul>';
			return $return;
			echo $return;	
	
}	
function recent_nav() {
	$largs = array(
		'posts_per_page' => '3',
		'post_type' => 'project',
		);
	$recent = new WP_Query($largs);
	echo '<ul><h2>AS OF LATE</h2>';
	while ($recent->have_posts()) :
		$recent->the_post();
		$bgcolor = show_cat_colors();
		$icons = show_tools_icons();
		echo '<li style="background:' . $bgcolor . '">';
		echo '<a href="';
		the_permalink();
		echo '">';
		the_title();
		echo '</a></li>';
		endwhile;
	echo '</ul>'; 
}
	
function intro_block() { ?>
		
		<ul class="introLinks">
			<li><a href="/jack-who/">jack who?</a></li>
			<!-- li><a href="">clients &amp; services</a></li -->
			<!-- li><a href="/get-in-touch/">get in touch</a></li -->
		</ul>
	
<?php }

remove_filter("the_content", "wpautop");
remove_filter("the_excerpt", "wpautop");

function filter_cats() {
		$args=array(
				'orderby' => 'count',
				'order' => 'DESC',
				'hide_empty' => true,
				'exclude' => 1
				);
			$categories=get_categories($args);
			echo '<li><a href="#all" rel="all">All Things</a></li>';
			foreach($categories as $category) { 
				 $termname = strtolower($category->slug);
				 $termname = str_replace(' ', '-', $termname);
				echo '<li><a href="#'.$termname.'" title="" rel="'.$termname.'">'.$category->description.'</a></li>';
				}}
				
function filter_tools() {
$args = array( 'taxonomy' => 'project-tools' );
$terms = get_terms('project-tools', $args);
$homeurl = home_url();
    $term_list = '';
    foreach ($terms as $term) {
        $t_ID = $term->term_id;
					$term_meta = get_option("project-tools_$t_ID");
					if (!isset($term_meta['tool_icon'])){
					$term_meta['tool_icon'] = '@';
					}
    		$term_list .= '<li><a href="#' . $term->slug . '" class=" '. $term->slug . ' bg-icon proj-icon ' .$term_meta["tool_icon"] . '"  href="' . $homeurl . '/project-tools/' . $term->slug . '" title="' . $term->name . '">' . $term_meta['tool_icon'] . '<span class="legend">' .  $term->name . '</span></a></li>';
    		}
    echo $term_list;
}


function footer_additions() { ?>	
<script type="text/javascript">	
	jQuery(document).ready(function() {	
	jQuery('#grid-content').filterable();
      
});
</script>
<style type="text/css">
#grid-content li:hover {
    opacity: 0.9 !important;
}
</style>
<?php }

function posts_nav() {
	global $post, $post_id;
	$next_post = get_next_post($post->id);
	$prev_post = get_previous_post($post->id);
echo '<ul class="posts_nav" id="nav">';	
if (!empty( $prev_post)): ?>
 <li class="prev"> <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><span class="larr">&#10144;</span><?php echo $prev_post->post_title; ?></a></li>
<?php endif; if (!empty( $next_post )): ?>
<li class="next"><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?><span class="rarr">&#10144;</span></a></li>
<?php endif; 
echo '</ul>';
}

 ?>