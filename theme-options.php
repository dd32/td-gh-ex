<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'babylog_options', 'babylog_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'babylogtheme' ), __( 'Theme Options', 'babylogtheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
} 
 
/**
 * Create arrays for our theme options
 */

$radio_options = array(
	'blue' => array(
		'value' => 'blue',
		'label' => __( 'Blue', 'babylogtheme' )
	),
	'pink' => array(
		'value' => 'pink',
		'label' => __( 'Pink', 'babylogtheme' )
	),
	'green' => array(
		'value' => 'green',
		'label' => __( 'Green', 'babylogtheme' )
	),
	'purple' => array(
		'value' => 'purple',
		'label' => __( 'Purple', 'babylogtheme' )
	)
);

$radio2_options = array(
	'light' => array(
		'value' => 'light',
		'label' => __( 'Light', 'babylogtheme' )
	),
	'medium' => array(
		'value' => 'medium',
		'label' => __( 'Medium', 'babylogtheme' )
	),
	'dark' => array(
		'value' => 'dark',
		'label' => __( 'Dark', 'babylogtheme' )
	)
);

$radio3_options = array(
	'brown' => array(
		'value' => 'brown',
		'label' => __( 'Brown', 'babylogtheme' )
	),
	'black' => array(
		'value' => 'black',
		'label' => __( 'Black', 'babylogtheme' )
	),
	'blonde' => array(
		'value' => 'blonde',
		'label' => __( 'Blonde', 'babylogtheme' )
	),
	'red' => array(
		'value' => 'red',
		'label' => __( 'Red', 'babylogtheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
		
	global $radio_options, $radio2_options, $radio3_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">

		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'babylogtheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'babylogtheme' ); ?></strong></p></div>
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
				<tr valign="top"><th scope="row"><strong><?php _e( 'Color Scheme', 'babylogtheme' ); ?></strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'babylogtheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="babylog_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
				
				<?php
				/**
				 * Skin Tone
				 */
				?>
				<tr valign="top"><th scope="row"><strong><?php _e( 'Skin Tone', 'babylogtheme' ); ?></strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Skin Tone', 'babylogtheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio2_options as $option ) {
								$radio_setting = $options['radioinput2'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput2'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="babylog_theme_options[radioinput2]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
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
				<tr valign="top"><th scope="row"><strong><?php _e( 'Hair Color', 'babylogtheme' ); ?></strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Hair Color', 'babylogtheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio3_options as $option ) {
								$radio_setting = $options['radioinput3'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput3'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="babylog_theme_options[radioinput3]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
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
				<tr valign="top"><th scope="row"><strong><?php _e( 'Custom CSS', 'babylogtheme' ); ?></strong></th>
					<td>
						<textarea id="babylog_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="babylog_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="babylog_theme_options[sometextarea]"><?php _e( 'Add any custom CSS here so it will persist through theme updates.', 'babylogtheme' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'babylogtheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $radio_options, $radio2_options, $radio3_options;

	// Our Color Scheme must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;
		
	// Our Skin Tone must actually be in our array of radio options
	if ( ! isset( $input['radioinput2'] ) )
		$input['radioinput2'] = null;
	if ( ! array_key_exists( $input['radioinput2'], $radio2_options ) )
		$input['radioinput2'] = null;
		
	// Our Hair Color must actually be in our array of radio options
	if ( ! isset( $input['radioinput3'] ) )
		$input['radioinput3'] = null;
	if ( ! array_key_exists( $input['radioinput3'], $radio3_options ) )
		$input['radioinput3'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/