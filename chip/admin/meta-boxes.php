<?php
/** Chip Life Post Layout Meta Box */
add_action('add_meta_boxes', 'chip_life_post_layout_metabox_init');
function chip_life_post_layout_metabox_init() {

	$chip_life_post_layout_metabox_type = array( 'post', 'page' );	
	foreach ( $chip_life_post_layout_metabox_type as $type ) {
			$chip_life_post_layout_metabox_title = 'Chip Life '.ucfirst( $type ).' Layout Settings';
			add_meta_box( 'chip_life_post_layout_metabox', $chip_life_post_layout_metabox_title, 'chip_life_post_layout_metabox_cb', $type, 'normal', 'high' );
	}

}

/** Chip Life Post Layout Meta Box Callback */
function chip_life_post_layout_metabox_cb() { 

	/** Global Data */
	global $post;	
	
	/** Use nonce for verification */
	wp_nonce_field( plugin_basename(__FILE__), 'chip_life_post_layout_meta_nonce' );
	
	/** Post Layout Logic */
	$chip_life_post_layout_meta = get_post_meta( $post->ID, 'chip_life_post_layout_meta', TRUE );
	$chip_life_post_layout_meta = ( ! empty( $chip_life_post_layout_meta ) )? $chip_life_post_layout_meta : 'content-sidebar';
	$items = Chip_Life_Options::chip_life_layout_style_pd();
	
	/** Let Print the Meta Box */
	?>
    <div class="wrap">
    <?php
	foreach( $items as $key => $val ):

	?>
		<div class="chip-life-image-radio-option">
		  <label><input type="radio" id="chip_life_post_layout_meta" name="chip_life_post_layout_meta" value="<?php echo $key; ?>" <?php checked( $key, $chip_life_post_layout_meta ); ?> />
		    <span><img src="<?php echo CHIP_LIFE_PARENT_URL; ?>/images/<?php echo $key; ?>.png" width="136" height="122" alt="" /> <?php echo $val; ?> </span>
		  </label>        
        </div>		
		
<?php endforeach; ?>
	<div class="chip-life-clear"></div>
    </div>
<?php
}

add_action( 'save_post', 'chip_life_post_layout_metabox_save_init' );
function chip_life_post_layout_metabox_save_init( $post_id ) {

	/**
	 * Verify if this is an auto save routine. 
	 * If it is our form has not been submitted, so we dont want to do anything
	 */
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
	}
	
	/** Other Autosave */
	if ( defined('DOING_AJAX') && DOING_AJAX ) { 
		return;
	}
	if ( defined('DOING_CRON') && DOING_CRON ) { 
		return;
	}	
	
	/** 
	 * Verify this came from the our screen and with proper authorization,
	 * because save_post can be triggered at other times
	 */
	if ( !isset( $_POST['chip_life_post_layout_meta_nonce'] ) || !wp_verify_nonce( $_POST['chip_life_post_layout_meta_nonce'], plugin_basename(__FILE__) ) ) {
		return $post_id;
	}

	/** Check permissions */
	if ( 'page' == $_POST['post_type'] ) {
		
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	
	} else {
		
		if ( !current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	
	/** OK, we're authenticated: we need to find and save the data */
	$chip_life_post_layout_meta = $_POST['chip_life_post_layout_meta'];

	if( get_post_meta( $post_id, 'chip_life_post_layout_meta', TRUE ) ) { 
		update_post_meta( $post_id, 'chip_life_post_layout_meta', $chip_life_post_layout_meta );
	} else {
		add_post_meta( $post_id, 'chip_life_post_layout_meta', $chip_life_post_layout_meta );
	}

}
?>