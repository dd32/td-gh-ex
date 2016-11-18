<?php
/**
 * Add meta box
 *
 */
function optimizesingle_add_meta_boxes( $post ){
	add_meta_box( 'food_meta_box', __( '<span class="dashicons dashicons-layout"></span> Post Layout Select [Pro Only]', 'optimize' ), 'optimizesingle_build_meta_box', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'optimizesingle_add_meta_boxes' );
/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function optimizesingle_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'optimizesinglemeta_meta_box_nonce' );
	// retrieve the _food_optimizesinglemeta current value
	$current_optimizesinglemeta = get_post_meta( $post->ID, '_food_optimizesinglemeta', true );
$upgradetopro = 'Layout Select for current post only - for website layout please choose from theme options <a href="' . esc_url('http://www.insertcart.com/product/optimize-wp-theme/','optimize') . '" target="_blank">' . esc_attr__( 'Get Optimize Pro', 'optimize' ) . '</a>';

	?>
	<div class='inside'>

		<h4><?php echo $upgradetopro; ?></h4>
		<p>
			<input type="radio" name="optimizesinglemeta" value="rsd" <?php checked( $current_optimizesinglemeta, 'rsd' ); ?> /> <?php _e('Right Sidebar - Default','optimize'); ?><br />
			<input type="radio" name="optimizesinglemeta" value="ls" <?php checked( $current_optimizesinglemeta, 'ls' ); ?> /> <?php _e('Left Sidebar','optimize'); ?><br/>
			<input type="radio" name="optimizesinglemeta" value="lr" <?php checked( $current_optimizesinglemeta, 'lr' ); ?> /> <?php _e('Left - Right Sidebars','optimize'); ?> <br/>
			<input type="radio" name="optimizesinglemeta" value="fc" <?php checked( $current_optimizesinglemeta, 'fc' ); ?> /> <?php _e('Full Content - No Sidebar','optimize'); ?>
		</p>

		

	</div>
	<?php
}
/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function food_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['optimizesinglemeta_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['optimizesinglemeta_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	// store custom fields values
	// optimizesinglemeta string
	if ( isset( $_REQUEST['optimizesinglemeta'] ) ) {
		update_post_meta( $post_id, '_food_optimizesinglemeta', sanitize_text_field( $_POST['optimizesinglemeta'] ) );
	}

}
add_action( 'save_post', 'food_save_meta_box_data' );