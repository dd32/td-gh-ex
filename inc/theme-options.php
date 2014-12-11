<?php

/**
 * Default Options
 */
$zenzero_theme_options = array( 
	'hiderss' => '0',
	'hidesearch' => '0',
	'facebookurl' => '', 
	'twitterurl' => '', 
	'googleplusurl' => '', 
	'linkedinurl' => '', 
	'instagramurl' => '', 
	'youtubeurl' => '', 
	'pinteresturl' => '', 
	'tumblrurl' => ''
);

function zenzero_toolbar_link_to_mypage( $wp_admin_bar ) {
	$args = array(
		'id'    => 'zenzero_theme_options',
		'title' => __('Zenzero Theme Options', 'zenzero' ),
		'href'  => admin_url('themes.php?page=theme_options')
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'zenzero_toolbar_link_to_mypage', 999 );

if ( is_admin() ) : // Load only if we are viewing an admin page

add_action( 'admin_init', 'zenzero_options_init' );
add_action( 'admin_menu', 'zenzero_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function zenzero_options_init(){
	register_setting( 'zenzero_options_add_page', 'zenzero_theme_options', 'zenzero_options_validate' );
}

/**
 * Load up the menu page
 */
function zenzero_options_add_page() {
	add_theme_page( __( 'Zenzero Theme Options', 'zenzero' ), __( 'Zenzero Theme Options', 'zenzero' ), 'edit_theme_options', 'theme_options', 'zenzero_options_do_page' );
}

/**
 * Create the options page
 */
function zenzero_options_do_page() {
	global $zenzero_theme_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php echo "<h2>" . wp_get_theme() . __( ' Free Theme Options', 'zenzero' ) . "</h2>"; ?>
			
		<div class="updated" style="background:#E9F7DF;clear: both;display: table;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-left: 4px solid #1fa67a;">
			<h3><div class="dashicons dashicons-megaphone"></div> <?php _e( 'Need more features and options? Upgrade to PRO!', 'zenzero' ); ?></h3>
			<p><?php _e( 'Get', 'zenzero' ); ?> <b><?php _e( 'Zenzero PRO', 'zenzero' ); ?></b> <?php _e( 'WordPress Theme for only', 'zenzero' ); ?> <b>19,90&euro;</b> <i><?php _e( '(One Time Fee)', 'zenzero' ); ?></i></p>
			<div class="zenzeroLeft" style="float:left; width: 30%; text-align: center;">
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);margin: 40px 0 20px;" href="http://crestaproject.com/demo/zenzero-pro/" target="_blank"><div class="dashicons dashicons-visibility"></div> <?php _e( 'Demo (Zenzero PRO)', 'zenzero' ); ?></a>
				<br />
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);" href=" http://crestaproject.com/downloads/zenzero/" target="_blank"><div class="dashicons dashicons-heart"></div> <?php _e( 'Get The Pro Version', 'zenzero' ); ?></a>
			</div>
			<div class="zenzeroRight" style="float:right; width: 70%;">
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Advanced Theme Options</b> (Manage Loading Page, Additional Custom Code, Font switcher and much more...)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Logo and Favicon Upload</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Unlimited Colors and Skin</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Post views counter</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Breadcrumb</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Post format</b> (Standard, Gallery, Audio, Link, Video, Quote)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>7 Shortcodes</b> (Toggle, Tabs, Boxes, Columns, Highlights, Buttons and Drop Cap)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>5 Exclusive Widgets</b> (Latest Tweet, Instagram, Social Buttons, Recent Posts with Thumbnail and Most Commented Posts...)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Related Posts Box</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Information About Author Box</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>And much more...</b></li>
			<ul>
			</div>
		</div>	
		
		<p><?php _e( 'These options will let you setup the social icons at the bottom of the theme. You can enter the URLs of your profiles to have the icons show up.', 'zenzero' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'zenzero' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
		<?php $zenzero_options = get_option( 'zenzero_theme_options', $zenzero_theme_options ); ?>
		
		<?php settings_fields( 'zenzero_options_add_page' ); ?>
			
			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[hiderss]" name="zenzero_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $zenzero_options['hiderss'] ); ?> />
						<label class="description" for="zenzero_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Search Button
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide Search Button?', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[hidesearch]" name="zenzero_theme_options[hidesearch]" type="checkbox" value="1" <?php checked( '1', $zenzero_options['hidesearch'] ); ?> />
						<label class="description" for="zenzero_theme_options[hidesearch]"><?php _e( 'Hide the Search button?', 'zenzero' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Facebook URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[facebookurl]" class="regular-text" type="text" name="zenzero_theme_options[facebookurl]" value="<?php if( isset( $zenzero_options[ 'facebookurl' ] ) ) echo esc_url( $zenzero_options[ 'facebookurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[facebookurl]"><?php _e( 'Leave blank to hide Facebook Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Twitter URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[twitterurl]" class="regular-text" type="text" name="zenzero_theme_options[twitterurl]" value="<?php if( isset( $zenzero_options[ 'twitterurl' ] ) ) echo esc_url( $zenzero_options[ 'twitterurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[twitterurl]"><?php _e( 'Leave blank to hide Twitter Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Google +
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Google + URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[googleplusurl]" class="regular-text" type="text" name="zenzero_theme_options[googleplusurl]" value="<?php if( isset( $zenzero_options[ 'googleplusurl' ] ) ) echo esc_url( $zenzero_options[ 'googleplusurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[googleplusurl]"><?php _e( 'Leave blank to hide Google + Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Linkedin
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Linkedin URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[linkedinurl]" class="regular-text" type="text" name="zenzero_theme_options[linkedinurl]" value="<?php if( isset( $zenzero_options[ 'linkedinurl' ] ) ) echo esc_url( $zenzero_options[ 'linkedinurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[linkedinurl]"><?php _e( 'Leave blank to hide Linkedin Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Instagram
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Instagram URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[instagramurl]" class="regular-text" type="text" name="zenzero_theme_options[instagramurl]" value="<?php if( isset( $zenzero_options[ 'instagramurl' ] ) ) echo esc_url( $zenzero_options[ 'instagramurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[instagramurl]"><?php _e( 'Leave blank to hide Instagram Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * YouTube
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your YouTube URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[youtubeurl]" class="regular-text" type="text" name="zenzero_theme_options[youtubeurl]" value="<?php if( isset( $zenzero_options[ 'youtubeurl' ] ) ) echo esc_url( $zenzero_options[ 'youtubeurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[youtubeurl]"><?php _e( 'Leave blank to hide YouTube Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Pinterest
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Pinterest URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[pinteresturl]" class="regular-text" type="text" name="zenzero_theme_options[pinteresturl]" value="<?php if( isset( $zenzero_options[ 'pinteresturl' ] ) ) echo esc_url( $zenzero_options[ 'pinteresturl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[pinteresturl]"><?php _e( 'Leave blank to hide Pinterest Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Tumblr
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Tumblr URL', 'zenzero' ); ?></th>
					<td>
						<input id="zenzero_theme_options[tumblrurl]" class="regular-text" type="text" name="zenzero_theme_options[tumblrurl]" value="<?php if( isset( $zenzero_options[ 'tumblrurl' ] ) ) echo esc_url( $zenzero_options[ 'tumblrurl' ] ); ?>" />
						<label class="description" for="zenzero_theme_options[tumblrurl]"><?php _e( 'Leave blank to hide Tumblr Icon', 'zenzero' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'zenzero' ); ?>" />
			</p>
			
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function zenzero_options_validate( $input ) {
	global $zenzero_theme_options;
	
	$zenzero_options = get_option( 'zenzero_theme_options', $zenzero_theme_options );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hiderss'] ) )
		$input['hiderss'] = null;
		$input['hiderss'] = ( $input['hiderss'] == 1 ? 1 : 0 );
		
	if ( ! isset( $input['hidesearch'] ) )
		$input['hidesearch'] = null;
		$input['hidesearch'] = ( $input['hidesearch'] == 1 ? 1 : 0 );

	// Encode URLs
	if( isset( $zenzero_options[ 'twitterurl' ] ) )
		$input['twitterurl'] = esc_url_raw( $input['twitterurl'] );
	if( isset( $zenzero_options[ 'facebookurl' ] ) )
		$input['facebookurl'] = esc_url_raw( $input['facebookurl'] );
	if( isset( $zenzero_options[ 'googleplusurl' ] ) )
		$input['googleplusurl'] = esc_url_raw( $input['googleplusurl'] );
	if( isset( $zenzero_options[ 'linkedinurl' ] ) )
		$input['linkedinurl'] = esc_url_raw( $input['linkedinurl'] );
	if( isset( $zenzero_options[ 'instagramurl' ] ) )
		$input['instagramurl'] = esc_url_raw( $input['instagramurl'] );
	if( isset( $zenzero_options[ 'youtubeurl' ] ) )
		$input['youtubeurl'] = esc_url_raw( $input['youtubeurl'] );
	if( isset( $zenzero_options[ 'pinteresturl' ] ) )
		$input['pinteresturl'] = esc_url_raw( $input['pinteresturl'] );
	if( isset( $zenzero_options[ 'tumblrurl' ] ) )
		$input['tumblrurl'] = esc_url_raw( $input['tumblrurl'] );

	return $input;
}

endif;  // EndIf is_admin()