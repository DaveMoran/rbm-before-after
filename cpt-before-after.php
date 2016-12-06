<?php
/*
 * This file holds all of the information for the gallery custom post type
 */

add_action('init', 'create_rbm_before_after');

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook(__FILE__, 'create_rbm_staff');

function create_rbm_before_after() {
  register_post_type( 'rbm_before_after',
    array(
      'labels' => array(
        'name' => 'RBM Before and Afters',
        'singular_name' => 'RBM Before and After',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Before and After',
        'edit' => 'Edit',
        'edit_item' => 'Edit Before and After',
        'new_item' => 'New Before and After',
        'view' => 'View',
        'view_item' => 'View Before and After',
        'search_items' => 'Search Before and After',
        'not_found' => 'No Before and Afters found',
        'not_found_in_trash' => 'No Before and Afters found in Trash',
        'parent' => 'Parent Before and After',
      ),
      'rewrite' => array(
        'slug' => 'rbm_before_after',
        'with_front' => false
      ),
      'public' => true,
      'menu_position' => 15,
      'supports' => array(
        'title',
        'thumbnail',
      ),
      'taxonomies' => array('rbm_gallery'),
      'menu_icon' => 'dashicons-arrow-up-alt2',
      'has_archive' => true
    )
  );
  flush_rewrite_rules();
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_book_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Galleries', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Gallery', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Galleries', 'textdomain' ),
		'all_items'         => __( 'All Galleries', 'textdomain' ),
		'parent_item'       => __( 'Parent Gallery', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Gallery:', 'textdomain' ),
		'edit_item'         => __( 'Edit Gallery', 'textdomain' ),
		'update_item'       => __( 'Update Gallery', 'textdomain' ),
		'add_new_item'      => __( 'Add New Gallery', 'textdomain' ),
		'new_item_name'     => __( 'New Gallery Name', 'textdomain' ),
		'menu_name'         => __( 'Gallery', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery' ),
	);

	register_taxonomy( 'rbm_gallery', array( 'rbm_before_after' ), $args );
}
?>
