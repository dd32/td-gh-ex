<?php
/**
 * Create Custom post type gallery
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */

add_action( 'init', 'attitude_custom_post' );
/**
 * Register custom post type.
 *
 * We register a new custom post type to show the gallery.
 */
function attitude_custom_post() {
   
	$labels = array(
		'name'                  => _x( 'Gallery', 'attitude_custom_post', 'attitude' ),
		'singular_name'         => _x( 'Gallery', 'attitude_custom_post', 'attitude' ),
		'all_items'             => _x( 'All Galleries', 'attitude_custom_post', 'attitude' ),
		'add_new'               => _x( 'Add New Item', 'attitude_custom_post', 'attitude' ),
		'add_new_item'          => _x( 'Add New Gallery Item', 'attitude_custom_post', 'attitude' ),
		'edit_item'             => _x( 'Edit Gallery', 'attitude_custom_post', 'attitude' ),
		'new_item'              => _x( 'New Gallery', 'attitude_custom_post', 'attitude' ),
		'view_item'             => _x( 'View Gallery', 'attitude_custom_post', 'attitude' ),
		'search_items'          => _x( 'search Gallery', 'attitude_custom_post', 'attitude' ),
		'not_found'             => _x( 'No Gallery Found', 'attitude_custom_post', 'attitude' ),
		'not_found_in_trash'    => _x( 'No Gallery found in Trash', 'attitude_custom_post', 'attitude' ),
		'parent_item_colon'     => _x( 'Parent Gallery:', 'attitude_custom_post', 'attitude' ),
		'menu_name'             => _x( 'Galleries', 'attitude_custom_post', 'attitude' )
	);
	$args = array(
		'labels'                => $labels,
		'hierarchical'          => false,
		'description'           => __( 'Custom Gallery Posts', 'attitude' ),
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'custom-fields' ),
		'taxonomies'            => array( 'post_tag' ),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => ATTITUDE_ADMIN_IMAGES_URL . '/backend-theme-horse-icon.png',
		'show_in_nav_menus'     => true,
		'publicly_queryable'    => true,
		'exclude_from_search'   => false,
		'has_archive'           => true,
		'query_var'             => true,
		'can_export'            => true,
		'rewrite'               => true,
		'capability_type'       => 'post'
	);

	register_post_type( 'gallery', $args );       

}

add_filter( 'manage_edit-gallery_columns', 'attitude_add_thumbnail_column', 10, 1 );
/**
 * Add Columns to Portfolio Edit Screen
 */
function attitude_add_thumbnail_column( $columns ) {

	$column_thumbnail = array( 'thumbnail' => __('Thumbnail','attitude' ) );
	$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	return $columns;
}

add_action( 'manage_posts_custom_column', 'attitude_display_thumbnail', 10, 1 );
/**
 * Adds thumbnails to column view
 */
function attitude_display_thumbnail( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, array(35, 35) );
			break;
	}
}
?>