<?php // Advanced Custom Fields

if ( false == ( is_admin() || function_exists( 'get_field' ) ) ) {
	// if plugin is not active
	function get_field() {
		return false;
	}

	return;
}


// Enqueue Metabox UI
function ashe_metabox_ui( $hook ) {
    global $post;

    // check if it is a post
    if ( ($hook == 'post-new.php' || $hook == 'post.php') && 'post' === $post->post_type ) {
        wp_enqueue_script( 'ashe-metabox-ui', get_theme_file_uri( '/inc/metaboxes/js/metabox-ui.js' ), array( 'jquery' ), false, true );
    }


}

add_action( 'admin_enqueue_scripts', 'ashe_metabox_ui' );