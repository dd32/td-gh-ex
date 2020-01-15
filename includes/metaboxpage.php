<?php
/**
 * Add meta box
 *
 */
function promaxpage_add_meta_boxes( $post ){
	add_meta_box( 'food_meta_box', __( '<span class="dashicons dashicons-layout"></span> Page Layout Select [Pro Only]', 'promax' ), 'promaxpage_build_meta_box', 'page', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'promaxpage_add_meta_boxes' );
/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function promaxpage_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'promaxpagemeta_meta_box_nonce' );
	// retrieve the _food_promaxpagemeta current value
	$current_promaxpagemeta = get_post_meta( $post->ID, '_food_promaxpagemeta', true );
	
	$upgradetopro = 'Layout Select for current page only - for website layout please choose from theme options <a href="' . esc_url('http://www.insertcart.com/product/promax-wordpress-theme/','promax') . '" target="_blank">' . esc_attr__( 'Get ProMax Pro', 'promax' ) . '</a>';

	?>
	<div class='inside'>

		<h4><?php echo $upgradetopro; ?></h4>
		<p>
			<input type="radio" name="promaxpagemeta" value="rsd" <?php checked( $current_promaxpagemeta, 'rsd' ); ?> /> <?php esc_attr_e('Right Sidebar - Default','promax'); ?><br />
			<input type="radio" name="promaxpagemeta" value="ls" <?php checked( $current_promaxpagemeta, 'ls' ); ?> /> <?php esc_attr_e('Left Sidebar','promax'); ?><br/>
			<input type="radio" name="promaxpagemeta" value="lr" <?php checked( $current_promaxpagemeta, 'lr' ); ?> />  <?php esc_attr_e('Left - Right Sidebars','promax'); ?> <br/>
			<input type="radio" name="promaxpagemeta" value="fc" <?php checked( $current_promaxpagemeta, 'fc' ); ?> /> <?php esc_attr_e('Full Content - No Sidebar','promax'); ?>
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
function promaxpage_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['promaxpagemeta_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['promaxpagemeta_meta_box_nonce'], basename( __FILE__ ) ) ){
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
	// promaxpagemeta string
	if ( isset( $_REQUEST['promaxpagemeta'] ) ) {
		update_post_meta( $post_id, '_food_promaxpagemeta', sanitize_text_field( $_POST['promaxpagemeta'] ) );
	}

}
add_action( 'save_post', 'promaxpage_save_meta_box_data' );