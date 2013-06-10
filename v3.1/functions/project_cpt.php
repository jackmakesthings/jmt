<?php 
function register_cpt_project() {

    $labels = array( 
        'name' => _x( 'Projects', 'project' ),
        'singular_name' => _x( 'Project', 'project' ),
        'add_new' => _x( 'Add New', 'project' ),
        'add_new_item' => _x( 'Add New Project', 'project' ),
        'edit_item' => _x( 'Edit Project', 'project' ),
        'new_item' => _x( 'New Project', 'project' ),
        'view_item' => _x( 'View Project', 'project' ),
        'search_items' => _x( 'Search Projects', 'project' ),
        'not_found' => _x( 'No projects found', 'project' ),
        'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
        'parent_item_colon' => _x( 'Parent Project:', 'project' ),
        'menu_name' => _x( 'Projects', 'project' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'I made this stuff!',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'category' ),
        'taxonomies' => array( 'project-tools', 'project-types', 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'http://wp2.local/assets/images-stack.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => 'projects'), 
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
	}
add_action( 'init', 'register_cpt_project' );	
	

/* custom taxonomies */

    function register_taxonomy_project_tools() {
    $labels = array(
    'name' => _x( 'Tools', 'project-tools' ),
    'singular_name' => _x( 'Tool', 'project-tools' ),
    'search_items' => _x( 'Search Tools', 'project-tools' ),
    'popular_items' => _x( 'Popular Tools', 'project-tools' ),
    'all_items' => _x( 'All Tools', 'project-tools' ),
    'parent_item' => _x( 'Parent Tool', 'project-tools' ),
    'parent_item_colon' => _x( 'Parent Tool:', 'project-tools' ),
    'edit_item' => _x( 'Edit Tool', 'project-tools' ),
    'update_item' => _x( 'Update Tool', 'project-tools' ),
    'add_new_item' => _x( 'Add New Tool', 'project-tools' ),
    'new_item_name' => _x( 'New Tool', 'project-tools' ),
    'separate_items_with_commas' => _x( 'Separate tools with commas', 'project-tools' ),
    'add_or_remove_items' => _x( 'Add or remove Tools', 'project-tools' ),
    'choose_from_most_used' => _x( 'Choose from most used Tools', 'project-tools' ),
    'menu_name' => _x( 'Tools', 'project-tools' ),
    );
    $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'hierarchical' => false,
    'rewrite' => true,
    'query_var' => true
    );
    register_taxonomy( 'project-tools', array('project'), $args );
    } 
    add_action( 'init', 'register_taxonomy_project_tools' );
  
	function register_taxonomy_project_types() {
    $labels = array(
    'name' => _x( 'Project Types', 'project-types' ),
    'singular_name' => _x( 'Project Type', 'project-types' ),
    'search_items' => _x( 'Search Project Types', 'project-types' ),
    'popular_items' => _x( 'Popular Project Types', 'project-types' ),
    'all_items' => _x( 'All Project Types', 'project-types' ),
    'parent_item' => _x( 'Parent Project Type', 'project-types' ),
    'parent_item_colon' => _x( 'Parent Project Type:', 'project-types' ),
    'edit_item' => _x( 'Edit Project Type', 'project-types' ),
    'update_item' => _x( 'Update Project Type', 'project-types' ),
    'add_new_item' => _x( 'Add New Project Type', 'project-types' ),
    'new_item_name' => _x( 'New Project Type', 'project-types' ),
    'separate_items_with_commas' => _x( 'Separate project types with commas', 'project-types' ),
    'add_or_remove_items' => _x( 'Add or remove Project Types', 'project-types' ),
    'choose_from_most_used' => _x( 'Choose from most used Project Types', 'project-types' ),
    'menu_name' => _x( 'Project Types', 'project-types' ),
    );
    $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'hierarchical' => false,
    'rewrite' => true,
    'query_var' => true
    );
    register_taxonomy( 'project-types', array('project'), $args );
    } 
 	add_action( 'init', 'register_taxonomy_project_types' );
	?>