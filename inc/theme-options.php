<?php

/**
 * Default Options
 */
$blogghiamo_theme_options = array( 
	'hiderss' => '0',
	'hidesearch' => '0',
	'showfullpost' => '0',
	'facebookurl' => '#', 
	'twitterurl' => '#', 
	'googleplusurl' => '#', 
	'linkedinurl' => '#', 
	'instagramurl' => '#', 
	'youtubeurl' => '#', 
	'pinteresturl' => '#', 
	'tumblrurl' => '#',
	'emailurl' => '#'
);

if ( current_user_can('manage_options') ) {
	function blogghiamo_toolbar_link_to_mypage( $wp_admin_bar ) {
		$args = array(
			'id'    => 'blogghiamo_theme_options',
			'title' => __('Blogghiamo Theme Options', 'blogghiamo' ),
			'href'  => admin_url('themes.php?page=theme_options')
		);
		$wp_admin_bar->add_node( $args );
	}
	add_action( 'admin_bar_menu', 'blogghiamo_toolbar_link_to_mypage', 999 );
}

if ( is_admin() ) : // Load only if we are viewing an admin page

add_action( 'admin_init', 'blogghiamo_options_init' );
add_action( 'admin_menu', 'blogghiamo_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function blogghiamo_options_init(){
	register_setting( 'blogghiamo_options_add_page', 'blogghiamo_theme_options', 'blogghiamo_options_validate' );
}

/**
 * Load up the menu page
 */
function blogghiamo_options_add_page() {
	add_theme_page( __( 'Blogghiamo Theme Options', 'blogghiamo' ), __( 'Blogghiamo Theme Options', 'blogghiamo' ), 'edit_theme_options', 'theme_options', 'blogghiamo_options_do_page' );
}

/**
 * Create the options page
 */
function blogghiamo_options_do_page() {
	global $blogghiamo_theme_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php echo "<h2>" . wp_get_theme() . __( ' Free Theme Options', 'blogghiamo' ) . "</h2>"; ?>
			
		<div class="updated" style="background:#E9F7DF;clear: both;display: table;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-left: 4px solid #1fa67a;">
			<h3><div class="dashicons dashicons-megaphone"></div> <?php _e( 'Need more features and options? Upgrade to PRO!', 'blogghiamo' ); ?></h3>
			<p><?php _e( 'Get', 'blogghiamo' ); ?> <b><?php _e( 'Blogghiamo PRO', 'blogghiamo' ); ?></b> <?php _e( 'WordPress Theme for only', 'blogghiamo' ); ?> <b>24,90&euro;</b></p>
			<div class="blogghiamoLeft" style="float:left; width: 30%; text-align: center;">
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);margin: 40px 0 20px;" href="http://crestaproject.com/demo/blogghiamo-pro/" target="_blank"><div class="dashicons dashicons-visibility"></div> <?php _e( 'Demo (Blogghiamo PRO)', 'blogghiamo' ); ?></a>
				<br />
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);" href=" http://crestaproject.com/downloads/blogghiamo/" target="_blank"><div class="dashicons dashicons-heart"></div> <?php _e( 'Get The Pro Version', 'blogghiamo' ); ?></a>
			</div>
			<div class="blogghiamoRight" style="float:right; width: 70%;">
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Advanced Theme Options', 'blogghiamo' ); ?></b> <?php _e( '(Choose Sidebar position, Manage Loading Page, Additional Custom Code, Font switcher and much more...)', 'blogghiamo' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Logo and Favicon Upload', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Unlimited Colors and Skin', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Beautiful Slider', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Breaking News', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Post views counter', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Breadcrumb', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Post format', 'blogghiamo' ); ?></b> <?php _e( '(Standard, Gallery, Audio, Link, Video, Quote)', 'blogghiamo' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( '7 Shortcodes', 'blogghiamo' ); ?></b> <?php _e( '(Toggle, Tabs, Boxes, Columns, Highlights, Buttons and Drop Cap)', 'blogghiamo' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( '12 Exclusive Widgets', 'blogghiamo' ); ?></b> <?php _e( '(Latest Tweet, Instagram, Random Posts, Social Counter, Posts with Thumbnail, News in Pictures, and much more...)', 'blogghiamo' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Related Posts Box', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Information About Author Box', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Advertising System', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'And much more...', 'blogghiamo' ); ?></b></li>
			<ul>
			</div>
		</div>	
		
		<p><?php _e( 'These options will let you setup the social icons at the top of the theme. You can enter the URLs of your profiles to have the icons show up.', 'blogghiamo' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'blogghiamo' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
		<?php $se_options = get_option( 'blogghiamo_theme_options', $blogghiamo_theme_options ); ?>
		
		<?php settings_fields( 'blogghiamo_options_add_page' ); ?>
			
			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[hiderss]" name="blogghiamo_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $se_options['hiderss'] ); ?> />
						<label class="description" for="blogghiamo_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Search Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide Search Icon?', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[hidesearch]" name="blogghiamo_theme_options[hidesearch]" type="checkbox" value="1" <?php checked( '1', $se_options['hidesearch'] ); ?> />
						<label class="description" for="blogghiamo_theme_options[hidesearch]"><?php _e( 'Hide the Search icon?', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Content text
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Content text', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[showfullpost]" name="blogghiamo_theme_options[showfullpost]" type="checkbox" value="1" <?php checked( '1', $se_options['showfullpost'] ); ?> />
						<label class="description" for="blogghiamo_theme_options[showfullpost]"><?php _e( 'Check if you want to show full content, uncheck if you want to show the excerpt', 'blogghiamo' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Facebook URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[facebookurl]" class="regular-text" type="text" name="blogghiamo_theme_options[facebookurl]" value="<?php if( isset( $se_options[ 'facebookurl' ] ) ) echo esc_url( $se_options[ 'facebookurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[facebookurl]"><?php _e( 'Leave blank to hide Facebook Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Twitter URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[twitterurl]" class="regular-text" type="text" name="blogghiamo_theme_options[twitterurl]" value="<?php if( isset( $se_options[ 'twitterurl' ] ) ) echo esc_url( $se_options[ 'twitterurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[twitterurl]"><?php _e( 'Leave blank to hide Twitter Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Google +
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Google + URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[googleplusurl]" class="regular-text" type="text" name="blogghiamo_theme_options[googleplusurl]" value="<?php if( isset( $se_options[ 'googleplusurl' ] ) ) echo esc_url( $se_options[ 'googleplusurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[googleplusurl]"><?php _e( 'Leave blank to hide Google + Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Linkedin
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Linkedin URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[linkedinurl]" class="regular-text" type="text" name="blogghiamo_theme_options[linkedinurl]" value="<?php if( isset( $se_options[ 'linkedinurl' ] ) ) echo esc_url( $se_options[ 'linkedinurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[linkedinurl]"><?php _e( 'Leave blank to hide Linkedin Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Instagram
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Instagram URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[instagramurl]" class="regular-text" type="text" name="blogghiamo_theme_options[instagramurl]" value="<?php if( isset( $se_options[ 'instagramurl' ] ) ) echo esc_url( $se_options[ 'instagramurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[instagramurl]"><?php _e( 'Leave blank to hide Instagram Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * YouTube
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your YouTube URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[youtubeurl]" class="regular-text" type="text" name="blogghiamo_theme_options[youtubeurl]" value="<?php if( isset( $se_options[ 'youtubeurl' ] ) ) echo esc_url( $se_options[ 'youtubeurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[youtubeurl]"><?php _e( 'Leave blank to hide YouTube Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Pinterest
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Pinterest URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[pinteresturl]" class="regular-text" type="text" name="blogghiamo_theme_options[pinteresturl]" value="<?php if( isset( $se_options[ 'pinteresturl' ] ) ) echo esc_url( $se_options[ 'pinteresturl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[pinteresturl]"><?php _e( 'Leave blank to hide Pinterest Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Tumblr
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Tumblr URL', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[tumblrurl]" class="regular-text" type="text" name="blogghiamo_theme_options[tumblrurl]" value="<?php if( isset( $se_options[ 'tumblrurl' ] ) ) echo esc_url( $se_options[ 'tumblrurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[tumblrurl]"><?php _e( 'Leave blank to hide Tumblr Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Email
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Email', 'blogghiamo' ); ?></th>
					<td>
						<input id="blogghiamo_theme_options[emailurl]" class="regular-text" type="text" name="blogghiamo_theme_options[emailurl]" value="<?php if( isset( $se_options[ 'emailurl' ] ) ) echo sanitize_email( $se_options[ 'emailurl' ] ); ?>" />
						<label class="description" for="blogghiamo_theme_options[emailurl]"><?php _e( 'Leave blank to hide Email Icon', 'blogghiamo' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'blogghiamo' ); ?>" />
			</p>
			
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function blogghiamo_options_validate( $input ) {
	global $blogghiamo_theme_options;
	
	$se_options = get_option( 'blogghiamo_theme_options', $blogghiamo_theme_options );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hiderss'] ) )
		$input['hiderss'] = null;
		$input['hiderss'] = ( $input['hiderss'] == 1 ? 1 : 0 );
		
	if ( ! isset( $input['hidesearch'] ) )
		$input['hidesearch'] = null;
		$input['hidesearch'] = ( $input['hidesearch'] == 1 ? 1 : 0 );
		
	if ( ! isset( $input['showfullpost'] ) )
		$input['showfullpost'] = null;
		$input['showfullpost'] = ( $input['showfullpost'] == 1 ? 1 : 0 );

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
	if( isset( $se_options[ 'emailurl' ] ) )
		$input['emailurl'] = sanitize_email( $input['emailurl'] );

	return $input;
}

endif;  // EndIf is_admin()