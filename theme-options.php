<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init theme options to white list our options
 */
function theme_options_init(){
	register_setting( 'babylog_options', 'babylog_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
} 
 
/**
 * Create arrays for our theme options
 */

$blogcolor_options = array(
	'blue' => array(
		'value' => 'blue',
		'label' => 'Blue'
	),
	'pink' => array(
		'value' => 'pink',
		'label' => 'Pink'
	),
	'green' => array(
		'value' => 'green',
		'label' => 'Green'
	),
	'purple' => array(
		'value' => 'purple',
		'label' => 'Purple'
	)
);

$skincolor_options = array(
	'light' => array(
		'value' => 'light',
		'label' => 'Light'
	),
	'medium' => array(
		'value' => 'medium',
		'label' => 'Medium'
	),
	'dark' => array(
		'value' => 'dark',
		'label' => 'Dark'
	)
);

$haircolor_options = array(
	'brown' => array(
		'value' => 'brown',
		'label' => 'Brown'
	),
	'black' => array(
		'value' => 'black',
		'label' => 'Black'
	),
	'blonde' => array(
		'value' => 'blonde',
		'label' => 'Blonde'
	),
	'red' => array(
		'value' => 'red',
		'label' => 'Red'
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
		
	global $blogcolor_options, $skincolor_options, $haircolor_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">

		<?php screen_icon(); echo "<h2>" . get_current_theme() . ' Theme Options' . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong>Options saved</strong></p></div>
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
				<tr valign="top"><th scope="row"><strong>Color Scheme</strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span>Color Scheme</span></legend>
						<?php
							
							foreach ( $blogcolor_options as $option ) {
								$radio_setting = $options['blogcolorinput'];
								
						?>
								<label class="description"><input type="radio" name="babylog_theme_options[blogcolorinput]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked ( $option['value'], $options['blogcolorinput'] ); ?> /> <?php echo $option['label']; ?></label><br />
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
				<tr valign="top"><th scope="row"><strong>Skin Tone</strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span>Skin Tone</span></legend>
						<?php
							
							foreach ( $skincolor_options as $option ) {
								$radio_setting = $options['skincolorinput'];

								?>
								<label class="description"><input type="radio" name="babylog_theme_options[skincolorinput]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked ( $option['value'] , $options['skincolorinput'] ); ?> /> <?php echo $option['label']; ?></label><br />
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
				<tr valign="top"><th scope="row"><strong>Hair Color</strong></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span>Hair Color</span></legend>
						<?php
							
							foreach ( $haircolor_options as $option ) {
								$radio_setting = $options['haircolorinput'];

								?>
								<label class="description"><input type="radio" name="babylog_theme_options[haircolorinput]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked ( $option['value'] , $options['haircolorinput'] ); ?> /> <?php echo $option['label']; ?></label><br />
						<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Options" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $blogcolor_options, $skincolor_options, $haircolor_options;

	// Our Color Scheme must actually be in our array of radio options
	if ( ! isset( $input['blogcolorinput'] ) )
		$input['blogcolorinput'] = null;
	if ( ! array_key_exists( $input['blogcolorinput'], $blogcolor_options ) )
		$input['blogcolorinput'] = null;
		
	// Our Skin Tone must actually be in our array of radio options
	if ( ! isset( $input['skincolorinput'] ) )
		$input['skincolorinput'] = null;
	if ( ! array_key_exists( $input['skincolorinput'], $skincolor_options ) )
		$input['skincolorinput'] = null;
		
	// Our Hair Color must actually be in our array of radio options
	if ( ! isset( $input['haircolorinput'] ) )
		$input['haircolorinput'] = null;
	if ( ! array_key_exists( $input['haircolorinput'], $haircolor_options ) )
		$input['haircolorinput'] = null;

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/