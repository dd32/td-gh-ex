<?php

add_action( 'admin_init', 'bbl_theme_options_init' );
add_action( 'admin_menu', 'bbl_theme_options_add_page' );

/**
 * Init theme options to white list our options
 */
function bbl_theme_options_init(){
	register_setting( 'babylog_options', 'babylog_theme_options', 'bbl_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function bbl_theme_options_add_page() {
	add_theme_page( __( 'Theme Options' , 'babylog' ), __( 'Theme Options' , 'babylog' ), 'edit_theme_options', 'theme_options', 'bbl_theme_options_do_page' );
} 
 
/**
 * Create arrays for our theme options
 */

$bbl_blogcolor_options = array(
	'blue' => array(
		'value' => 'blue',
		'label' => __( 'Blue' , 'babylog' )
	),
	'pink' => array(
		'value' => 'pink',
		'label' => __( 'Pink' , 'babylog' )
	),
	'green' => array(
		'value' => 'green',
		'label' => __( 'Green' , 'babylog' )
	),
	'purple' => array(
		'value' => 'purple',
		'label' => __( 'Purple' , 'babylog' )
	)
);

$bbl_skincolor_options = array(
	'light' => array(
		'value' => 'light',
		'label' => __( 'Light' , 'babylog' )
	),
	'medium' => array(
		'value' => 'medium',
		'label' => __( 'Medium' , 'babylog' )
	),
	'dark' => array(
		'value' => 'dark',
		'label' => __( 'Dark' , 'babylog' )
	)
);

$bbl_haircolor_options = array(
	'brown' => array(
		'value' => 'brown',
		'label' => __( 'Brown' , 'babylog' )
	),
	'black' => array(
		'value' => 'black',
		'label' => __( 'Black' , 'babylog' )
	),
	'blonde' => array(
		'value' => 'blonde',
		'label' => __( 'Blonde' , 'babylog' )
	),
	'red' => array(
		'value' => 'red',
		'label' => __( 'Red' , 'babylog' )
	)
);

/**
 * Create the options page
 */
function bbl_theme_options_do_page() {
		
	global $bbl_blogcolor_options, $bbl_skincolor_options, $bbl_haircolor_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
	
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' , 'babylog' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' , 'babylog' ) ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'babylog_options' ); ?>
			<?php $options = get_option( 'babylog_theme_options' ); ?>
			
			<table class="form-table">

				<?php
				/**
				 * Color Scheme
				 */
				?>
				<tr valign="top"><th scope="row"><strong><?php _e( 'Color Scheme' , 'babylog' ) ?></strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme' , 'babylog' ) ?></span></legend>
						<?php
							
							foreach ( $bbl_blogcolor_options as $option ) {
								$radio_setting = $options['blogcolorinput'];
								
						?>
								<label class="description">
									<input id="color-<?php echo $option['value'] ?>" type="radio" name="babylog_theme_options[blogcolorinput]" value="<?php echo esc_attr_e( $option['value'] , 'babylog' ); ?>" <?php checked ( $option['value'], $options['blogcolorinput'] ); ?> /> <?php _e( $option['label'] , 'babylog' ); ?>
								</label><br />
								<?php
							}
						?>
						</fieldset>
						
					</td>
					<td><img id="preview-image" style="padding: 10px; border: 2px solid #333; position: relative; float: left;" src="" /></td>
				</tr>
				
				<?php
				/**
				 * Skin Tone
				 */
				?>
				<tr valign="top"><th scope="row"><strong><?php _e( 'Skin Tone' , 'babylog' ) ?></strong></th>
					<td colspan="2">
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Skin Tone' , 'babylog' ) ?></span></legend>
						<?php
							
							foreach ( $bbl_skincolor_options as $option ) {
								$radio_setting = $options['skincolorinput'];

								?>
								<label class="description"><input id="skin-<?php echo $option['value'] ?>" type="radio" name="babylog_theme_options[skincolorinput]" value="<?php echo esc_attr_e( $option['value'] , 'babylog' ); ?>" <?php checked ( $option['value'] , $options['skincolorinput'] ); ?> /> <?php _e( $option['label'] , 'babylog' ); ?></label><br />
						<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
				
				<?php
				/**
				 * Hair Color
				 */
				?>
				<tr valign="top"><th scope="row"><strong><?php _e( 'Hair Color' , 'babylog' ) ?></strong></th>
					<td colspan="2">
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Hair Color' , 'babylog' ) ?></span></legend>
						<?php
							
							foreach ( $bbl_haircolor_options as $option ) {
								$radio_setting = $options['haircolorinput'];

								?>
								<label class="description"><input id="hair-<?php echo $option['value'] ?>" type="radio" name="babylog_theme_options[haircolorinput]" value="<?php echo esc_attr_e( $option['value'] , 'babylog' ); ?>" <?php checked ( $option['value'] , $options['haircolorinput'] ); ?> /> <?php _e( $option['label'] , 'babylog' ); ?></label><br />
						<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
				<?php
				/**
				 * Custom CSS
				 */
				?>
				<tr valign="top"><th scope="row"><strong><?php _e( 'Custom CSS', 'babylog' ); ?></strong></th>
					<td colspan="2">
						<textarea id="babylog_theme_options[customcss]" class="large-text" cols="50" rows="10" name="babylog_theme_options[customcss]"><?php echo esc_textarea( $options['customcss'] ); ?></textarea>
						<label class="description" for="babylog_theme_options[customcss]">
							<?php _e( 'Add any custom CSS rules here so they will persist through theme updates.', 'babylog' ); ?>
						</label>
					</td>
				</tr>
			</table>
			<img id="preview-image" style="float: right;" src="" />
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Options' , 'babylog' ) ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function bbl_theme_options_validate( $input ) {
	global $bbl_blogcolor_options, $bbl_skincolor_options, $bbl_haircolor_options;

	// Our Color Scheme must actually be in our array of radio options
	if ( ! isset( $input['blogcolorinput'] ) )
		$input['blogcolorinput'] = null;
	if ( ! array_key_exists( $input['blogcolorinput'], $bbl_blogcolor_options ) )
		$input['blogcolorinput'] = null;
		
	// Our Skin Tone must actually be in our array of radio options
	if ( ! isset( $input['skincolorinput'] ) )
		$input['skincolorinput'] = null;
	if ( ! array_key_exists( $input['skincolorinput'], $bbl_skincolor_options ) )
		$input['skincolorinput'] = null;
		
	// Our Hair Color must actually be in our array of radio options
	if ( ! isset( $input['haircolorinput'] ) )
		$input['haircolorinput'] = null;
	if ( ! array_key_exists( $input['haircolorinput'], $bbl_haircolor_options ) )
		$input['haircolorinput'] = null;
		
	// Say our textarea option must be safe text with the allowed tags for posts
	$input['customcss'] = wp_filter_nohtml_kses( $input['customcss'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/

?>