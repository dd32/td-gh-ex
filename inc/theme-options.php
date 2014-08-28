<?php

/**
 * Default Options
 */
$semplicemente_theme_options = array( 
	'hiderss' => '0',
	'hidesearch' => '0',
	'facebookurl' => '#', 
	'twitterurl' => '#', 
	'googleplusurl' => '#', 
	'linkedinurl' => '#', 
	'instagramurl' => '#', 
	'youtubeurl' => '#', 
	'pinteresturl' => '#', 
	'tumblrurl' => '#',
	'trackingcode' => ''
);

if ( is_admin() ) : // Load only if we are viewing an admin page

add_action( 'admin_init', 'semplicemente_options_init' );
add_action( 'admin_menu', 'semplicemente_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function semplicemente_options_init(){
	register_setting( 'semplicemente_options_add_page', 'semplicemente_theme_options', 'semplicemente_options_validate' );
}

/**
 * Load up the menu page
 */
function semplicemente_options_add_page() {
	add_theme_page( __( 'Theme Options', 'semplicemente' ), __( 'Theme Options', 'semplicemente' ), 'edit_theme_options', 'theme_options', 'semplicemente_options_do_page' );
}

/**
 * Create arrays for sidebar position
 */
$sidebar_position = array(
	'sidebar_right' => array(
		'value' => 'sidebar_right',
		'label' => __( 'Sidebar Right', 'semplicemente' )
	),
	'sidebar_left' => array(
		'value' => 'sidebar_left',
		'label' => __( 'Sidebar Left', 'semplicemente' )
	),
	'sidebar_no' => array(
		'value' => 'sidebar_no',
		'label' => __( 'No Sidebar', 'semplicemente' )
	)
);

/**
 * Create the options page
 */
function semplicemente_options_do_page() {
	global $semplicemente_theme_options, $sidebar_position;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'semplicemente' ) . "</h2>"; ?>
		<p><?php _e( 'These options will let you setup the social icons at the top of the theme and tracking code. You can enter the URLs of your profiles to have the icons show up.', 'semplicemente' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'semplicemente' ); ?></strong></p></div>
		<?php endif; ?>
			
		<div class="updated" style="background:#E9F7DF;">
			<table class="form-table">
				<tr valign="top"><th scope="row"><strong><?php _e( 'Support Semplicemente Theme', 'semplicemente' ); ?></strong></th>
					<td>
						<p><?php _e( 'If you enjoy <strong>Semplicemente Theme</strong>, please consider making a secure <strong>donation</strong> using the PayPal button. Anything is appreciated!', 'semplicemente' ); ?></p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="KLXV5HUDPJK5W">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>
					</td>
				</tr>
			</table>		
		</div>	

		<form method="post" action="options.php">
		<?php $se_options = get_option( 'semplicemente_theme_options', $semplicemente_theme_options ); ?>
		
		<?php settings_fields( 'semplicemente_options_add_page' ); ?>
			
			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[hiderss]" name="semplicemente_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $se_options['hiderss'] ); ?> />
						<label class="description" for="semplicemente_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Search Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide Search Icon?', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[hidesearch]" name="semplicemente_theme_options[hidesearch]" type="checkbox" value="1" <?php checked( '1', $se_options['hidesearch'] ); ?> />
						<label class="description" for="semplicemente_theme_options[hidesearch]"><?php _e( 'Hide the Search icon?', 'semplicemente' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Facebook URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[facebookurl]" class="regular-text" type="text" name="semplicemente_theme_options[facebookurl]" value="<?php if( isset( $se_options[ 'facebookurl' ] ) ) echo esc_url( $se_options[ 'facebookurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[facebookurl]"><?php _e( 'Leave blank to hide Facebook Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Twitter URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[twitterurl]" class="regular-text" type="text" name="semplicemente_theme_options[twitterurl]" value="<?php if( isset( $se_options[ 'twitterurl' ] ) ) echo esc_url( $se_options[ 'twitterurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[twitterurl]"><?php _e( 'Leave blank to hide Twitter Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Google +
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Google + URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[googleplusurl]" class="regular-text" type="text" name="semplicemente_theme_options[googleplusurl]" value="<?php if( isset( $se_options[ 'googleplusurl' ] ) ) echo esc_url( $se_options[ 'googleplusurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[googleplusurl]"><?php _e( 'Leave blank to hide Google + Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Linkedin
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Linkedin URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[linkedinurl]" class="regular-text" type="text" name="semplicemente_theme_options[linkedinurl]" value="<?php if( isset( $se_options[ 'linkedinurl' ] ) ) echo esc_url( $se_options[ 'linkedinurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[linkedinurl]"><?php _e( 'Leave blank to hide Linkedin Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Instagram
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Instagram URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[instagramurl]" class="regular-text" type="text" name="semplicemente_theme_options[instagramurl]" value="<?php if( isset( $se_options[ 'instagramurl' ] ) ) echo esc_url( $se_options[ 'instagramurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[instagramurl]"><?php _e( 'Leave blank to hide Instagram Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * YouTube
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your YouTube URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[youtubeurl]" class="regular-text" type="text" name="semplicemente_theme_options[youtubeurl]" value="<?php if( isset( $se_options[ 'youtubeurl' ] ) ) echo esc_url( $se_options[ 'youtubeurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[youtubeurl]"><?php _e( 'Leave blank to hide YouTube Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Pinterest
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Pinterest URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[pinteresturl]" class="regular-text" type="text" name="semplicemente_theme_options[pinteresturl]" value="<?php if( isset( $se_options[ 'pinteresturl' ] ) ) echo esc_url( $se_options[ 'pinteresturl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[pinteresturl]"><?php _e( 'Leave blank to hide Pinterest Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Tumblr
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Tumblr URL', 'semplicemente' ); ?></th>
					<td>
						<input id="semplicemente_theme_options[tumblrurl]" class="regular-text" type="text" name="semplicemente_theme_options[tumblrurl]" value="<?php if( isset( $se_options[ 'tumblrurl' ] ) ) echo esc_url( $se_options[ 'tumblrurl' ] ); ?>" />
						<label class="description" for="semplicemente_theme_options[tumblrurl]"><?php _e( 'Leave blank to hide Tumblr Icon', 'semplicemente' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Tracking Code
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Tracking Code', 'semplicemente' ); ?></th>
					<td>
						<label class="description" for="semplicemente_theme_options[trackingcode]"><?php _e( 'Enter your analytics tracking code', 'semplicemente' ); ?></label>
						<br />
						<textarea id="semplicemente_theme_options[trackingcode]" name="semplicemente_theme_options[trackingcode]" rows="5" cols="36"><?php echo esc_attr( $se_options['trackingcode'] ); ?></textarea>
					</td>
				</tr>

				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'semplicemente' ); ?>" />
			</p>
			
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function semplicemente_options_validate( $input ) {
	global $semplicemente_theme_options, $sidebar_position;
	
	$se_options = get_option( 'semplicemente_theme_options', $semplicemente_theme_options );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hiderss'] ) )
		$input['hiderss'] = null;
		$input['hiderss'] = ( $input['hiderss'] == 1 ? 1 : 0 );
		
	if ( ! isset( $input['hidesearch'] ) )
		$input['hidesearch'] = null;
		$input['hidesearch'] = ( $input['hidesearch'] == 1 ? 1 : 0 );
	
	// Encode URLs
	if( isset( $se_options[ 'twitterurl' ] ) )
		$input['twitterurl'] = esc_url_raw( $input['twitterurl'] );
	if( isset( $se_options[ 'facebookurl' ] ) )
		$input['facebookurl'] = esc_url_raw( $input['facebookurl'] );
	if( isset( $se_options[ 'googleplusurl' ] ) )
		$input['googleplusurl'] = esc_url_raw( $input['googleplusurl'] );
	if( isset( $se_options[ 'linkedinurl' ] ) )
		$input['linkedinurl'] = esc_url_raw( $input['linkedinurl'] );
	if( isset( $se_options[ 'instagramurl' ] ) )
		$input['instagramurl'] = esc_url_raw( $input['instagramurl'] );
	if( isset( $se_options[ 'youtubeurl' ] ) )
		$input['youtubeurl'] = esc_url_raw( $input['youtubeurl'] );
	if( isset( $se_options[ 'pinteresturl' ] ) )
		$input['pinteresturl'] = esc_url_raw( $input['pinteresturl'] );
	if( isset( $se_options[ 'tumblrurl' ] ) )
		$input['tumblrurl'] = esc_url_raw( $input['tumblrurl'] );

	// Tracking Code
	if( isset( $se_options[ 'trackingcode' ] ) )
		$input['trackingcode'] = wp_kses_stripslashes( $input['trackingcode'] );

	return $input;
}

endif;  // EndIf is_admin()