<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Options
 *
 *
 * @file           theme-options.php
 * @package        themingstrap
 * @license        license.txt
 * @version        Release: 1.9.6
 */

/**
 * Call the options class
 */
require( get_template_directory() . '/framework/admin/themingstrap_Options.php' );

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function themingstrap_admin_enqueue_scripts( $hook_suffix ) {
	$template_directory_uri = get_template_directory_uri();

	wp_enqueue_style( 'themingstrap-theme-options', $template_directory_uri . '/framework/admin/theme-options.css', false, '1.0' );
	wp_enqueue_script( 'themingstrap-theme-options', $template_directory_uri . '/framework/admin/theme-options.js', array( 'jquery' ), '1.0' );
}

add_action( 'admin_print_styles-appearance_page_theme_options', 'themingstrap_admin_enqueue_scripts' );

/**
 * Init plugin options to white list our options
 */
function themingstrap_theme_options_init() {
	register_setting( 'themingstrap_options', 'themingstrap_theme_options', 'themingstrap_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function themingstrap_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'themingstrap' ), __( 'Theme Options', 'themingstrap' ), 'edit_theme_options', 'theme_options', 'themingstrap_theme_options_do_page' );
}

function themingstrap_inline_css() {
	global $themingstrap_options;
	if( !empty( $themingstrap_options['themingstrap_inline_css'] ) ) {
		echo '<!-- Custom CSS Styles -->' . "\n";
		echo '<style type="text/css" media="screen">' . "\n";
		echo $themingstrap_options['themingstrap_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action( 'wp_head', 'themingstrap_inline_css', 110 );

function themingstrap_inline_js_head() {
	global $themingstrap_options;
	if( !empty( $themingstrap_options['themingstrap_inline_js_head'] ) ) {
		echo '<!-- Custom Scripts -->' . "\n";
		echo $themingstrap_options['themingstrap_inline_js_head'];
		echo "\n";
	}
}

add_action( 'wp_head', 'themingstrap_inline_js_head' );

function themingstrap_inline_js_footer() {
	global $themingstrap_options;
	if( !empty( $themingstrap_options['themingstrap_inline_js_footer'] ) ) {
		echo '<!-- Custom Scripts -->' . "\n";
		echo $themingstrap_options['themingstrap_inline_js_footer'];
		echo "\n";
	}
}

add_action( 'wp_footer', 'themingstrap_inline_js_footer' );

/**
 * Create the options page
 */
function themingstrap_theme_options_do_page() {

	if( !isset( $_REQUEST['settings-updated'] ) ) {
		$_REQUEST['settings-updated'] = false;
	}

	// Set confirmaton text for restore default option as attributes of submit_button().
	$attributes['onclick'] = 'return confirm("' . __( 'Do you want to restore? \nAll theme settings will be lost! \nClick OK to Restore.', 'themingstrap' ) . '")';
	?>

	<div class="wrap">
	<?php $theme_name = wp_get_theme() ?>
	<?php screen_icon();
	//echo "<h2 class='themename'>" . $theme_name . " " . __( 'Options', 'themingstrap' ) . "</h2>"; ?>


	<?php if( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options Saved', 'themingstrap' ); ?></strong></p></div>
	<?php endif; ?>

	<?php themingstrap_theme_options(); // Theme Options Hook ?>	
	<?php

	/**
	 * Create array of option sections
	 *
	 * @Title The display title
	 * @id The id that the option array references so the options display in the correct section
	 */
	$sections = apply_filters( 'themingstrap_option_sections_filter', array(
																	  array(
																		  'title' => __( 'Theme Elements', 'themingstrap' ),
																		  'id'    => 'theme_elements'
																	  ),

																	  array(
																		  'title' => __( 'Logo and Fav icon Upload', 'themingstrap' ),
																		  'id'    => 'logo_upload'
																	  ),
																	
																	  array(
																		  'title' => __( 'Social Icons', 'themingstrap' ),
																		  'id'    => 'social'
																	  ),
																	  array(
																		  'title' => __( 'CSS Styles', 'themingstrap' ),
																		  'id'    => 'css'
																	  ),
																	  array(
																		  'title' => __( 'Scripts', 'themingstrap' ),
																		  'id'    => 'scripts'
																	  )

																  )

	);

	/**
	 * Creates and array of options that get added to the relevant sections
	 *
	 * @key This must match the id of the section you want the options to appear in
	 *
	 * @title Title on the left hand side of the options
	 * @subtitle Displays underneath main title on left hand side
	 * @heading Right hand side above input
	 * @type The type of input e.g. text, textarea, checkbox
	 * @id The options id
	 * @description Instructions on what to enter in input
	 * @placeholder The placeholder for text and textarea
	 * @options array used by select dropdown lists
	 */
	$options = apply_filters( 'themingstrap_options_filter', array(
															 'theme_elements' => array(
																 array(
																	 'title'       => __( 'Enable header menu?', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'headermenu',
																	 'description' => __( 'check to enable', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																
																 array(
																	 'title'       => __( 'Enable footer menu?', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'footermenu',
																	 'description' => __( 'check to enable', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 
																 array(
																	 'title'       => __( 'Enable footer social icon?', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'checkbox',
																	 'id'          => 'footersocial',
																	 'description' => __( 'check to enable', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
													
																 array(
																	 'title'       => __( 'Footer Copy right Text', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'textarea',
																	 'id'          => 'footer_copy',
																	 'description' => '',
																	 'placeholder' => __( 'Footer Copiright Text', 'themingstrap' )
																 )
															 ),
															 'logo_upload'    => array(
																
																 array(
																	 'title'       => __( 'Upload custom logo image', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'upload',
																	 'id'          => 'headerlogo-upload',
																	 'description' => __( 'Upload image logo prefer JPG, GIF and PNG', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 
																 array(
																	 'title'       => __( 'Upload custom Fav icon', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'upload',
																	 'id'          => 'favicon-upload',
																	 'description' => __( 'Upload fav icon image prefer size 16 x 16px', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 
																 ),
															 
															 'social'         => array(
																 array(
																	 'title'       => __( 'Twitter', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'twitter_uid',
																	 'description' => __( 'Enter your Twitter URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'Facebook', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'facebook_uid',
																	 'description' => __( 'Enter your Facebook URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'LinkedIn', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'linkedin_uid',
																	 'description' => __( 'Enter your LinkedIn URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'YouTube', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'youtube_uid',
																	 'description' => __( 'Enter your YouTube URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'RSS Feed', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'rss_uid',
																	 'description' => __( 'Enter your RSS Feed URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'Google+', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'google_plus_uid',
																	 'description' => __( 'Enter your Google+ URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),
																 array(
																	 'title'       => __( 'Pinterest', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => '',
																	 'type'        => 'text',
																	 'id'          => 'pinterest_uid',
																	 'description' => __( 'Enter your Pinterest URL', 'themingstrap' ),
																	 'placeholder' => ''
																 ),												
															 ),
															 'css'            => array(
																 array(
																	 'title'       => __( 'Custom CSS Styles', 'themingstrap' ),
																	 'heading'     => '',
																	 'type'        => 'textarea',
																	 'id'          => 'themingstrap_inline_css',
																	 'description' => __( 'Enter your custom CSS styles.', 'themingstrap' ),
																	 'placeholder' => ''
																 )
															 ),
															 'scripts'        => array(							
																	
																  array(
																	 'title'       => __( 'Custom Scripts for Footer', 'themingstrap' ),
																	 'subtitle'    => '',
																	 'heading'     => __( 'Embeds to footer.php &darr;', 'themingstrap' ),
																	 'type'        => 'textarea',
																	 'id'          => 'themingstrap_inline_js',
																	 'description' => __( 'Enter your custom footer script.', 'themingstrap' ),
																	 'placeholder' => ''
																 )
															 )
														 )
	);
	if( class_exists( 'themingstrap_Pro_Options' ) ) {
		$display = new themingstrap_Pro_Options( $sections, $options );
	}
	else {
		$display = new themingstrap_Options( $sections, $options );
	}

	?>
	<form method="post" action="options.php">
		<?php settings_fields( 'themingstrap_options' ); ?>
		<?php global $themingstrap_options; ?>

		<div id="rwd" class="grid col-940">
			<?php
			$display->render_display();
			?>
		</div>
		<!-- end of .grid col-940 -->
	</form>
	</div><!-- wrap -->
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function themingstrap_theme_options_validate( $input ) {

	global $themingstrap_options;
	$defaults = themingstrap_get_option_defaults();

	if( isset( $input['reset'] ) ) {

		$input = $defaults;

	}
	else {

		// checkbox value is either 0 or 1
		foreach( array(
					 'breadcrumb',
					 'cta_button',
					 'front_page'
				 ) as $checkbox ) {
			if( !isset( $input[$checkbox] ) ) {
				$input[$checkbox] = null;
			}
			$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
		}
		
		foreach( array(
					 'home_headline',
					 'home_subheadline',
					 'home_content_area',
					 'cta_text',
					 'cta_url',
					 'featured_content',
				 ) as $content ) {
			$input[$content] = ( in_array( $input[$content], array( $defaults[$content], '' ) ) ? $defaults[$content] : wp_kses_stripslashes( $input[$content] ) );
		}
		$input['google_site_verification']    = ( isset( $input['google_site_verification'] ) ) ? wp_filter_post_kses( $input['google_site_verification'] ) : null;
		$input['bing_site_verification']      = ( isset( $input['bing_site_verification'] ) ) ? wp_filter_post_kses( $input['bing_site_verification'] ) : null;
		$input['yahoo_site_verification']     = ( isset( $input['yahoo_site_verification'] ) ) ? wp_filter_post_kses( $input['yahoo_site_verification'] ) : null;
		$input['site_statistics_tracker']     = ( isset( $input['site_statistics_tracker'] ) ) ? wp_kses_stripslashes( $input['site_statistics_tracker'] ) : null;
		$input['twitter_uid']                 = esc_url_raw( $input['twitter_uid'] );
		$input['facebook_uid']                = esc_url_raw( $input['facebook_uid'] );
		$input['linkedin_uid']                = esc_url_raw( $input['linkedin_uid'] );
		$input['youtube_uid']                 = esc_url_raw( $input['youtube_uid'] );
		$input['stumble_uid']                 = esc_url_raw( $input['stumble_uid'] );
		$input['rss_uid']                     = esc_url_raw( $input['rss_uid'] );
		$input['google_plus_uid']             = esc_url_raw( $input['google_plus_uid'] );
		$input['instagram_uid']               = esc_url_raw( $input['instagram_uid'] );
		$input['pinterest_uid']               = esc_url_raw( $input['pinterest_uid'] );
		$input['yelp_uid']                    = esc_url_raw( $input['yelp_uid'] );
		$input['vimeo_uid']                   = esc_url_raw( $input['vimeo_uid'] );
		$input['foursquare_uid']              = esc_url_raw( $input['foursquare_uid'] );
		$input['themingstrap_inline_css']       = wp_kses_stripslashes( $input['themingstrap_inline_css'] );
		$input['themingstrap_inline_js_head']   = wp_kses_stripslashes( $input['themingstrap_inline_js_head'] );
		$input['themingstrap_inline_js_footer'] = wp_kses_stripslashes( $input['themingstrap_inline_js_footer'] );

		$input = apply_filters( 'themingstrap_options_validate', $input );
	}

	return $input;
}

