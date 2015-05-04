<?php

/**
 * Default Options
 */
$storto_theme_options = array( 
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
	'vkurl' => '#'
);

if ( current_user_can('manage_options') ) {
	function storto_toolbar_link_to_mypage( $wp_admin_bar ) {
		$args = array(
			'id'    => 'storto_theme_options',
			'title' => __('Storto Theme Options', 'storto' ),
			'href'  => admin_url('themes.php?page=theme_options')
		);
		$wp_admin_bar->add_node( $args );
	}
	add_action( 'admin_bar_menu', 'storto_toolbar_link_to_mypage', 999 );
}

if ( is_admin() ) : // Load only if we are viewing an admin page

add_action( 'admin_init', 'storto_options_init' );
add_action( 'admin_menu', 'storto_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function storto_options_init(){
	register_setting( 'storto_options_add_page', 'storto_theme_options', 'storto_options_validate' );
}

/**
 * Load up the menu page
 */
function storto_options_add_page() {
	add_theme_page( __( 'Theme Options', 'storto' ), __( 'Storto Theme Options', 'storto' ), 'edit_theme_options', 'theme_options', 'storto_options_do_page' );
}

/**
 * Create the options page
 */
function storto_options_do_page() {
	global $storto_theme_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'storto' ) . "</h2>"; ?>
			
		<div class="updated" style="background:#E9F7DF;clear: both;display: table;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-left: 4px solid #1fa67a;">
			<h3><div class="dashicons dashicons-megaphone"></div> Need more features and options? Upgrade to Gigante WordPress Theme!</h3>
			<p>Get <b>Gigante</b> WordPress Theme for only <b>24,90&euro;</b> <i>(One Time Fee)</i></p>
			<div class="blogghiamoLeft" style="float:left; width: 30%; text-align: center;">
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);margin: 40px 0 20px;" href="http://crestaproject.com/demo/gigante/" target="_blank"><div class="dashicons dashicons-visibility"></div> Watch the demo</a>
				<br />
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);" href=" http://crestaproject.com/downloads/gigante/" target="_blank"><div class="dashicons dashicons-heart"></div> Get Gigante Theme</a>
			</div>
			<div class="blogghiamoRight" style="float:right; width: 70%;">
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Advanced Theme Options</b> (Choose Sidebar position, Manage Loading Page, Additional Custom Code, Font switcher and much more...)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Logo and Favicon Upload</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Unlimited Colors and Skin</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Post views counter</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Post format</b> (Standard, Gallery, Audio, Link, Video, Quote)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>7 Shortcodes</b> (Toggle, Tabs, Boxes, Columns, Highlights, Buttons and Drop Cap)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>12 Exclusive Widgets</b> (Latest Tweet, Instagram, Random Posts, Social Counter, Posts with Thumbnail, News in Pictures, and much more...)</li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Related Posts Box</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>Information About Author Box</b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b>And much more...</b></li>
			<ul>
			</div>
		</div>	
		
		<p><?php _e( 'These options will let you setup the social icons at the top of the theme. You can enter the URLs of your profiles to have the icons show up.', 'storto' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'storto' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
		<?php $se_options = get_option( 'storto_theme_options', $storto_theme_options ); ?>
		
		<?php settings_fields( 'storto_options_add_page' ); ?>
			
			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[hiderss]" name="storto_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $se_options['hiderss'] ); ?> />
						<label class="description" for="storto_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Search Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide Search Icon?', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[hidesearch]" name="storto_theme_options[hidesearch]" type="checkbox" value="1" <?php checked( '1', $se_options['hidesearch'] ); ?> />
						<label class="description" for="storto_theme_options[hidesearch]"><?php _e( 'Hide the Search icon?', 'storto' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Facebook URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[facebookurl]" class="regular-text" type="text" name="storto_theme_options[facebookurl]" value="<?php if( isset( $se_options[ 'facebookurl' ] ) ) echo esc_url( $se_options[ 'facebookurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[facebookurl]"><?php _e( 'Leave blank to hide Facebook Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Twitter URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[twitterurl]" class="regular-text" type="text" name="storto_theme_options[twitterurl]" value="<?php if( isset( $se_options[ 'twitterurl' ] ) ) echo esc_url( $se_options[ 'twitterurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[twitterurl]"><?php _e( 'Leave blank to hide Twitter Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Google +
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Google + URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[googleplusurl]" class="regular-text" type="text" name="storto_theme_options[googleplusurl]" value="<?php if( isset( $se_options[ 'googleplusurl' ] ) ) echo esc_url( $se_options[ 'googleplusurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[googleplusurl]"><?php _e( 'Leave blank to hide Google + Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Linkedin
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Linkedin URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[linkedinurl]" class="regular-text" type="text" name="storto_theme_options[linkedinurl]" value="<?php if( isset( $se_options[ 'linkedinurl' ] ) ) echo esc_url( $se_options[ 'linkedinurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[linkedinurl]"><?php _e( 'Leave blank to hide Linkedin Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Instagram
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Instagram URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[instagramurl]" class="regular-text" type="text" name="storto_theme_options[instagramurl]" value="<?php if( isset( $se_options[ 'instagramurl' ] ) ) echo esc_url( $se_options[ 'instagramurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[instagramurl]"><?php _e( 'Leave blank to hide Instagram Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * YouTube
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your YouTube URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[youtubeurl]" class="regular-text" type="text" name="storto_theme_options[youtubeurl]" value="<?php if( isset( $se_options[ 'youtubeurl' ] ) ) echo esc_url( $se_options[ 'youtubeurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[youtubeurl]"><?php _e( 'Leave blank to hide YouTube Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Pinterest
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Pinterest URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[pinteresturl]" class="regular-text" type="text" name="storto_theme_options[pinteresturl]" value="<?php if( isset( $se_options[ 'pinteresturl' ] ) ) echo esc_url( $se_options[ 'pinteresturl' ] ); ?>" />
						<label class="description" for="storto_theme_options[pinteresturl]"><?php _e( 'Leave blank to hide Pinterest Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Tumblr
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Tumblr URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[tumblrurl]" class="regular-text" type="text" name="storto_theme_options[tumblrurl]" value="<?php if( isset( $se_options[ 'tumblrurl' ] ) ) echo esc_url( $se_options[ 'tumblrurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[tumblrurl]"><?php _e( 'Leave blank to hide Tumblr Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * VK
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your VK URL', 'storto' ); ?></th>
					<td>
						<input id="storto_theme_options[vkurl]" class="regular-text" type="text" name="storto_theme_options[vkurl]" value="<?php if( isset( $se_options[ 'vkurl' ] ) ) echo esc_url( $se_options[ 'vkurl' ] ); ?>" />
						<label class="description" for="storto_theme_options[vkurl]"><?php _e( 'Leave blank to hide VK Icon', 'storto' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'storto' ); ?>" />
			</p>
			
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function storto_options_validate( $input ) {
	global $storto_theme_options;
	
	$se_options = get_option( 'storto_theme_options', $storto_theme_options );

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
	if( isset( $se_options[ 'vkurl' ] ) )
		$input['vkurl'] = esc_url_raw( $input['vkurl'] );

	return $input;
}

endif;  // EndIf is_admin()