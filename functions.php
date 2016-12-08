<?php
/**
 * Simple Catch functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, simplecatch_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * @package Catch Themes
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 642;


/**
 * Tell WordPress to run simplecatch_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'simplecatch_setup' );

if ( !function_exists( 'simplecatch_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @uses load_theme_textdomain() For localization support.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Simple Catch 1.0
 */
function simplecatch_setup() {

	/* Simple Catch is now available for translation.
	 * Add your files into /languages/ directory.
	 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'simple-catch', get_template_directory() . '/languages' );

	$locale = get_locale();
    $locale_file = get_template_directory().'/languages/$locale.php';
    if (is_readable( $locale_file))
		require_once( $locale_file);

	// Load up theme options defaults
	require( get_template_directory() . '/functions/simplecatch_themeoptions_defaults.php' );

	// Load up our theme options page and related code.
	require( get_template_directory() . '/functions/panel/theme_options.php' );

	// Grab Simple Catch's Custom Tags widgets.
	require( get_template_directory() . '/functions/widgets.php' );

	// Load up our Simple Catch's Functions
	require( get_template_directory() . '/functions/simplecatch_functions.php' );

	// Load up our Simple Catch's metabox
	require( get_template_directory() . '/functions/simplecatch_metabox.php' );

	/**
     * This feature enables Jetpack plugin Infinite Scroll
     */
    add_theme_support( 'infinite-scroll', array(
		'type'          => 'click',
        'container'     => 'content',
		'render'    	=> 'simplecatch_infinite_scroll_render',
        'footer'        => 'page'
    ) );


	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' );

	/* We'll be using post thumbnails for custom features images on posts under blog category.
	 * Larger images will be auto-cropped to fit.
	 */
	set_post_thumbnail_size( 210, 210 );

	// Add Simple Catch's custom image sizes
	add_image_size( 'featured', 210, 210, true); // uses on homepage featured image
	add_image_size( 'slider', 976, 313, true); // uses on Featured Slider on Homepage Header

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Setup title support for theme
	 * Supported from WordPress version 4.1 onwards
	 * More Info: https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 */
	add_theme_support( 'title-tag' );

	// remove wordpress version from header for security concern
	remove_action( 'wp_head', 'wp_generator' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'simple-catch' ) );

	// Add support for custom backgrounds
	add_theme_support( 'custom-background' );

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '444' );

	// Add support for custom header
	add_theme_support( 'custom-header', array(
		// Header image random rotation default
		'random-default'			=> false,
		// Header image flex width
		'flex-width'   				=> true,
		// Recommended Header width
		'width'                  	=> 978,
		// Header image flex height
		'flex-height'				=> true,
		// Recommended Header height
		'height'       				=> 200,
		// Template header style callback
		'wp-head-callback'			=> 'simplecatch_header_style',
		// Admin header style callback
		'admin-head-callback'		=> 'simplecatch_admin_header_style',
		// Admin preview style callback
		'admin-preview-callback'	=> 'simplecatch_admin_header_image'
	) );

	//@remove Remove check when WordPress 4.8 is released
	if ( function_exists( 'has_custom_logo' ) ) {
		/**
		* Setup Custom Logo Support for theme
		* Supported from WordPress version 4.5 onwards
		* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
		*/
		add_theme_support( 'custom-logo' );
	}

} // simplecatch_setup
endif;


if ( ! function_exists( 'simplecatch_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Simple Catch 2.7
 */
function simplecatch_header_style() {

	$text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( $text_color == HEADER_TEXTCOLOR )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $text_color ) :
	?>
		#site-details {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php

		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // simplecatch_header_style


if ( ! function_exists( 'simplecatch_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Simple Catch 2.7
 */
function simplecatch_admin_header_style() {

			$color = get_header_textcolor();
?>
	<style type="text/css">
		/* Logo Tile */
		#header .logo-wrap {
			padding-left:20px;
			float:left;
			margin-top:54px;
			min-width: 610px;
		}
		#site-logo {
			display: inline-block;
			float: left;
			margin: 0;
			padding-bottom: 0;
		}
		#site-logo a img {
			float: left;
			height: auto;
			max-width: 958px;
			padding-right: 20px;
		}
		#site-details {
			display: inline-block;
			float: left;
			max-width: 958px;
			padding-right: 20px;
		}
		#site-title {
			font-size: 45px;
			font-family: 'Lobster';
			font-weight: normal;
			line-height: 54px;
			margin: 0;
			padding-bottom:0px;
		}
		#site-title a {
			color: #444444;
			text-decoration: none;
		}
		#site-title a:hover {
			color: #444444;
		}
		#site-description {
			font:14px Arial, Helvetica, sans-serif;
			color:#666;
			padding:8px 0 0 0;
		}
		<?php
		$text_color = get_header_textcolor();
		// Has the text been hidden?
		if ( 'blank' == $text_color ) : ?>
			#site-details {
				position: absolute !important;
				clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php elseif ( $text_color != HEADER_TEXTCOLOR ) : ?>
			#site-title a,
			#site-description {
				color: #<?php echo get_header_textcolor(); ?>;
			}
		<?php endif; ?>

		.appearance_page_custom-header #headimg {
			border: none;
			clear: both;
			overflow: hidden;
			width: 70%;
		}
		#headimg img {
			height: auto;
			padding-top: 20px;
			max-width: 100%;
		}
	</style>
<?php
}
endif; // simplecatch_admin_header_style


if ( ! function_exists( 'simplecatch_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
*
 * @since Simple Catch 2.7
 */
function simplecatch_admin_header_image() {

	if ( function_exists( 'simplecatch_headerdetails' ) ):
		simplecatch_headerdetails();
	endif;

	if ( get_header_image() ) : ?>
    	<div id="headimg">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
       	</div><!-- #headimg -->
	<?php endif;
}
endif; // simplecatch_admin_header_image


if ( ! function_exists( 'simplecatch_custom_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @since Simple Catch 2.7
 */
function simplecatch_custom_header_image() {

	if ( get_header_image() ) : ?>
    	<div id="headimg">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
       	</div><!-- #headimg -->
	<?php endif;
}
endif; // simplecatch_custom_header_image

// Load Customizer
require( get_template_directory() . '/functions/panel/customizer/customizer.php' );


/**
 * Migrate Logo to New WordPress core Custom Logo
 *
 *
 * Runs if version number saved in theme_mod "logo_version" doesn't match current theme version.
 */
function simplecatch_logo_migrate() {
	$ver = get_theme_mod( 'logo_version', false );

	// Return if update has already been run
	if ( version_compare( $ver, '3.3' ) >= 0 ) {
		return;
	}

	/**
	 * Get Theme Options Values
	 */
	global $simplecatch_options_settings;
   	$options = $simplecatch_options_settings;

   	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'the_custom_logo' ) ) {
		if( isset( $options['featured_logo_header'] ) && '' != $options['featured_logo_header'] ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$logo = attachment_url_to_postid( $options['featured_logo_header'] );

			if ( is_int( $logo ) ) {
				set_theme_mod( 'custom_logo', $logo );
			}
		}

  		// Update to match logo_version so that script is not executed continously
		set_theme_mod( 'logo_version', '3.3' );
	}
}
add_action( 'after_setup_theme', 'simplecatch_logo_migrate' );


/**
 * Migrate Custom Favicon to WordPress core Site Icon
 *
 * Runs if version number saved in theme_mod "site_icon_version" doesn't match current theme version.
 */
function simplecatch_site_icon_migrate() {
	$ver = get_theme_mod( 'site_icon_version', false );

	//Return if update has already been run
	if ( version_compare( $ver, '3.3' ) >= 0 ) {
		return;
	}

	/**
	 * Get Theme Options Values
	 */
	global $simplecatch_options_settings;
   	$options = $simplecatch_options_settings;

   	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'has_site_icon' ) ) {
		if( isset( $options['fav_icon'] ) && '' != $options['fav_icon'] ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$site_icon = attachment_url_to_postid( $options['fav_icon'] );

			if ( is_int( $site_icon ) ) {
				update_option( 'site_icon', $site_icon );
			}
		}

	  	// Update to match site_icon_version so that script is not executed continously
		set_theme_mod( 'site_icon_version', '3.3' );
	}
}
add_action( 'after_setup_theme', 'simplecatch_site_icon_migrate' );

function wpb_disable_comment_url($fields) {
    if ( isset( $fields['url'] ) ){
		unset( $fields['url'] );
    }
	if ( isset( $fields['fields']['url'] ) ){
		unset( $fields['fields']['url'] );
	}
    return $fields;
}
add_filter('comment_form_defaults','wpb_disable_comment_url');

function wpb_disable_comment_email($fields)
{
	if ( isset( $fields['email'] ) ){
		unset( $fields['email'] );
    }
	if ( isset( $fields['fields']['email'] ) ){
		unset( $fields['fields']['email'] );
	}
    return $fields;
}
add_filter('comment_form_defaults','wpb_disable_comment_email');


/**
 * Add Support for WPML, qTranslate X & Polylang Plugin
 */
if ( defined( 'ICL_SITEPRESS_VERSION' ) || defined( 'QTX_VERSION' ) || class_exists( 'Polylang' ) ) {
	require trailingslashit( get_template_directory() ) . 'functions/simplecatch-wpml.php';
}


/**
 * Migrate Custom CSS to WordPress core Custom CSS
 *
 * Runs if version number saved in theme_mod "custom_css_version" doesn't match current theme version.
 */
function simplecatch_custom_css_migrate(){
	$ver = get_theme_mod( 'custom_css_version', false );

	// Return if update has already been run
	if ( version_compare( $ver, '4.7' ) >= 0 ) {
		return;
	}

	if ( function_exists( 'wp_update_custom_css_post' ) ) {
	    // Migrate any existing theme CSS to the core option added in WordPress 4.7.

	    /**
		 * Get Theme Options Values
		 */
		global $simplecatch_options_settings;
	   	$options = $simplecatch_options_settings;

	    if ( '' != $options['custom_css'] ) {
			$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
			$return   = wp_update_custom_css_post( $core_css . $options['custom_css'] );

	        if ( ! is_wp_error( $return ) ) {
	            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
	            unset( $options['custom_css'] );
	            update_option( 'simplecatch_options', $options );

	            // Update to match custom_css_version so that script is not executed continously
				set_theme_mod( 'custom_css_version', '4.7' );
	        }
	    }
	}
}
add_action( 'after_setup_theme', 'simplecatch_custom_css_migrate' );