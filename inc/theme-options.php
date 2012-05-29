<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'd5smartia_options', 'd5smartia_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'd5smartia' ), __( 'D5 Smartia Options', 'd5smartia' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'd5smartia' ) . "</h2>"; ?>
		<h3>You can customize the settings of D5 Smartia Theme</h3>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'd5smartia_options' ); ?>
			<?php $options = get_option( 'd5smartia_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * Logo URL input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Logo URL', 'd5smartia' ); ?></th>
					<td>
						<input id="d5smartia_theme_options[d5smartia_logourl]" class="regular-text" type="text" name="d5smartia_theme_options[d5smartia_logourl]" value="<?php esc_attr_e( $options['d5smartia_logourl'] ); ?>" />
						
					</td>
				</tr>

				
				<?php
				/**
				 * Banner Ad Code (180 X 150) Left Side
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Banner Ad Code (180 X 150) Left Side', 'd5smartia' ); ?></th>
					<td>
						<textarea id="d5smartia_theme_options[d5smartia_bannerad1]" class="large-text" cols="30" rows="5" name="d5smartia_theme_options[d5smartia_bannerad1]"><?php echo esc_textarea( $options['d5smartia_bannerad1'] ); ?></textarea>
						
					</td>
				</tr>
                
                <?php
				/**
				 * Banner Ad Code (180 X 150) Right Side
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Banner Ad Code (180 X 150) Right Side', 'd5smartia' ); ?></th>
					<td>
						<textarea id="d5smartia_theme_options[d5smartia_bannerad2]" class="large-text" cols="30" rows="5" name="d5smartia_theme_options[d5smartia_bannerad2]"><?php echo esc_textarea( $options['d5smartia_bannerad2'] ); ?></textarea>
						
					</td>
				</tr>
                
                <?php
				/**
				 * Page Top Ad Code (728 X 90)
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Page Top Ad Code (728 X 90)', 'd5smartia' ); ?></th>
					<td>
						<textarea id="d5smartia_theme_options[d5smartia_pagetopad]" class="large-text" cols="30" rows="5" name="d5smartia_theme_options[d5smartia_pagetopad]"><?php echo esc_textarea( $options['d5smartia_pagetopad'] ); ?></textarea>
						
					</td>
				</tr>
                
                <?php
				/**
				 * Custom Code within HEAD Tag
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Custom Code within HEAD Tag', 'd5smartia' ); ?></th>
					<td>
						<textarea id="d5smartia_theme_options[d5smartia_headcode]" class="large-text" cols="30" rows="5" name="d5smartia_theme_options[d5smartia_headcode]"><?php echo esc_textarea( $options['d5smartia_headcode'] ); ?></textarea>
						
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'd5smartia' ); ?>" />
			</p>
		</form>
        
    <h3>If You Like This Theme Useful for You Please Consider a Small Donation for Continuing Our Free Initiatives from http://d5creation.com/donate/</h3>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	
	// Say our logourl option must be safe text with no HTML tags
	$input['d5smartia_logourl'] = wp_filter_nohtml_kses( $input['d5smartia_logourl'] );

	
	// Say our Banner Ad Code (180 X 150) Left Side option must be safe text with the allowed tags for posts
	$input['d5smartia_bannerad1'] = wp_filter_post_kses( $input['d5smartia_bannerad1'] );


	// Say our Banner Ad Code (180 X 150) Right Side option must be safe text with the allowed tags for posts
	$input['d5smartia_bannerad2'] = wp_filter_post_kses( $input['d5smartia_bannerad2'] );
	
	// Say our Page Top Ad Code (728 X 90) option must be safe text with the allowed tags for posts
	$input['d5smartia_pagetopad'] = wp_filter_post_kses( $input['d5smartia_pagetopad'] );
	
	// Say our Custom Code within HEAD Tag option must be safe text with the allowed tags for posts
	$input['d5smartia_headcode'] = wp_filter_post_kses( $input['d5smartia_headcode'] );

	return $input;
}

