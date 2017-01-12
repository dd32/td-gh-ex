<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Weaver Xtreme functions and definitions
 *
 *	>>>> DO NOT EDIT THIS FILE <<<<
 *
 * Warning! DO NOT EDIT THIS FILE, or any other theme file! If you edit ANY theme
 * file, all your changes will be LOST when you update the theme to a newer version.
 * Instead, if you need to change theme functionality, CREATE A CHILD THEME!
 *
 *	>>>> DO NOT EDIT THIS FILE <<<<
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, weaverx_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * This file formatted 4/8 on tabs
 *
 *	>>>> DO NOT EDIT THIS FILE <<<<
 */

add_action( 'after_setup_theme', 'weaverx_setup' );     // run weaverx_setup() when the 'after_setup_theme' hook is run

if ( ! function_exists( 'weaverx_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override weaverx_setup() in a child theme, add your own weaverx_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size
 * @uses add_theme_support( 'custom-header', $weaverx_header ) for WP 3.4+ custom header
 *
 *
 */
function weaverx_setup() {

	$GLOBALS['wvrx_timer'] = microtime(true);	// don't have options loaded, so just always get the current time.

	// Set the content width based on the theme's design and stylesheet.

	if ( ! isset( $content_width ) )
		$content_width = (int)(WEAVERX_THEME_WIDTH * .75);   // 1100 * .75 - default for content with a sidebar


	/* Make Weaver Xtreme available for translation.
	 *
	 * We will first allow the possibility that the user has a private translation in
	 * wp-content/languages/ (to avoid the update overwrite problem), then load the theme's files.
	*/

	load_theme_textdomain('weaver-xtreme' , get_template_directory() . '/languages' );		// now theme's translations as fallback

	add_editor_style();	// editor-style
	add_editor_style( WEAVERX_GOOGLE_FONTS_URL ); // from settings.php - in %7C format


	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


	// html5 for search

	add_theme_support( 'html5', array(  'search-form' ) );

	// Weaver Xtreme supports two main nav menus
	register_nav_menus( array(
		'primary' => __('Primary Navigation: if specified, used instead of Default menu', 'weaver-xtreme' /*adm*/),
		'secondary' => __('Secondary Navigation: if specified, adds 2nd menu bar', 'weaver-xtreme' /*adm*/),
		'header-mini' => __('Header Mini Menu: if specified, adds horizontal mini-menu to header', 'weaver-xtreme' /*adm*/)
	) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'gallery',  'image', 'link', 'quote', 'status','video') );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'title-tag' );


	// now, need Weaver Xtreme settings available for everything else

	weaverx_init_opts('functions');

	$width = weaverx_getopt_default('theme_width_int',WEAVERX_THEME_WIDTH);

	$height = weaverx_getopt_default('header_image_height_int',188);		// now that everything is responsive, we can just set this to an arbitrary height.

		// Enable support for custom logo.

	add_theme_support( 'custom-logo', array(
		'height'      => $height,
		'width'       => $width,
		'flex-height' => true,
	) );

	$weaverx_header = array(
		'default-image' => '%s/assets/images/headers/beckwith-mtn.jpg',
		'random-default' => true,
		'width' => $width,
		'height' => $height,
		'flex-height' => true,
		'flex-width' => true,
		'default-text-color' => '',
		'header-text' => false,
		'uploads' => true,
		'video' => true,
		'wp-head-callback' => '',
		'admin-head-callback' => 'weaverx_admin_header_style',
		'admin-preview-callback' => '',
	);


		global $content_width;
		$content_width = $width;    // let the WP $content_width be the same as theme width, and let our responsive CSS make it work.


	if (function_exists('get_custom_header')) {
		add_theme_support( 'custom-header', $weaverx_header);
		add_theme_support( 'custom-background');
	}

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	// CHANGE NOTE: This call was removed from Weaver Xtreme 1.1. The semantics of WP have changed
	// since this was first added and was causing the unnecessary auto-generation of a pretty large
	// file for each and every image added to the media library.

	// set_post_thumbnail_size( $weaverx_header['width'], $weaverx_header['height'], true );


	// ... and thus ends the changeable header business.
	weaverx_register_header_images();

}
} // weaverx_setup
//--



if ( ! function_exists('weaverx_init_opts')) {
function weaverx_init_opts($who='') {
	// this sets either the current settings, or the default values.
		weaverx_clear_opt_cache('weaverx_init_opts');



	$themename = weaverx_getopt('themename'); // load the theme from the db if there (weaverx_getopt loads the options if there)
	if ($themename === false) {
		require_once('includes/get-default-settings.php');  // load a set of defaults
		weaverx_get_default_settings();
	}

	do_action('weaverx_init_opts');
}
}
//--


if (! function_exists( 'weaverx_register_header_images')) {
function weaverx_register_header_images() {
	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(

	'maroon-bells' => array(
		'url' => '%s/assets/images/headers/maroon-bells.jpg',
		'thumbnail_url' => '%s/assets/images/headers/maroon-bells-thumbnail.jpg',
		/* translators: header image description */
		'description' => __( 'Maroon Bells', 'weaver-xtreme' /*adm*/)
		),
	'beckwith-mtn' => array(
		'url' => '%s/assets/images/headers/beckwith-mtn.jpg',
		'thumbnail_url' => '%s/assets/images/headers/beckwith-mtn-thumbnail.jpg',
		/* translators: header image description */
		'description' => __( 'Colorado Autumn', 'weaver-xtreme' /*adm*/)
		)

	) );
}
}
//--


if ( ! function_exists( 'weaverx_admin_header_style' ) ) {
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 * @since Weaver Xtreme 1.0
 */
function weaverx_admin_header_style() {
?>
	<style type="text/css">
	#headimg img {
		width: <?php echo weaverx_getopt_default('theme_width_int',WEAVERX_THEME_WIDTH);
; ?>px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
} // weaverx_admin_header_style
//--


add_action( 'widgets_init', 'weaverx_widgets_init' );
function weaverx_widgets_init() {
/**
 * Register our sidebars and widgetized areas.
 *
 * @since Weaver Xtreme 1.0
 */

	// Top located at the top of the sidebar.
	weaverx_register_sidebar( __( 'Primary Sidebar', 'weaver-xtreme' /*adm*/),
		'primary-widget-area',
		__( 'Primary sidebar widget area, displays on top, or left side for split sidebars', 'weaver-xtreme' /*adm*/ ));

	weaverx_register_sidebar( __( 'Secondary Sidebar', 'weaver-xtreme' /*adm*/),
		'secondary-widget-area',
		__( 'Secondary sidebar widget area, displays on bottom, or right side for split sidebars', 'weaver-xtreme' /*adm*/ ));


		## Site-wide top area
	weaverx_register_sidebar(__( 'Sitewide Top Widget Area', 'weaver-xtreme' /*adm*/),
		'sitewide-top-widget-area',
		 __( 'This widget area appears at the top of the content area on all site static pages and post pages (including special post pages) EXCEPT pages using the blank or iframe page templates.', 'weaver-xtreme' /*adm*/));

	## Site-wide bottom area
	weaverx_register_sidebar(__( 'Sitewide Bottom Widget Area', 'weaver-xtreme' /*adm*/),
		'sitewide-bottom-widget-area',
		__( 'This widget area appears at the bottom of the content area on all site static pages and post pages (including special post pages) EXCEPT pages using the blank or iframe page templates.', 'weaver-xtreme' /*adm*/));

	## page top widget area
	weaverx_register_sidebar(__( 'Pages Top Widget Area', 'weaver-xtreme' /*adm*/),
		'page-top-widget-area',
		 __( 'The top widget area appears above the content area of pages. It is not displayed on archive-like post pages (archives, etc.).', 'weaver-xtreme' /*adm*/));

	## page bottom widget area
	weaverx_register_sidebar(__( 'Pages Bottom Widget Area', 'weaver-xtreme' /*adm*/),
		'page-bottom-widget-area', __( 'The bottom widget area appears below the content area. It is not displayed on archive-like post pages.', 'weaver-xtreme' /*adm*/));

	## posts top widget area
	weaverx_register_sidebar(__( 'Blog Top Widget Area', 'weaver-xtreme' /*adm*/),
		'blog-top-widget-area',
		 __( 'The blog top widget area appears above the content area of blog pages, including page with posts templates, and post single page. It is not displayed on archive-like post pages.', 'weaver-xtreme' /*adm*/));

	## posts blog bottom widget area
	weaverx_register_sidebar(__( 'Blog Bottom Widget Area', 'weaver-xtreme' /*adm*/),
		'blog-bottom-widget-area', __( 'The blog bottom widget area appears below the content area of blog pages, including page with posts templates, and post single page. It is not displayed on archive-like post pages.', 'weaver-xtreme' /*adm*/));


	## Special Post Pages Top Widget area
	weaverx_register_sidebar(__( 'Archive-like Pages Top Widget Area', 'weaver-xtreme' /*adm*/),
		'postpages-widget-area',
		__( 'This widget area will appear at the top of archive-like post pages (date archives, author, category, tag, search).', 'weaver-xtreme' /*adm*/));


	// located in the header. Empty by default.
	weaverx_register_sidebar( __( 'Header Widget Area', 'weaver-xtreme' /*adm*/),
		'header-widget-area',
		 __( 'The header widget area. Widgets in this area can be displayed horizontally.', 'weaver-xtreme' /*adm*/));

	// located in the footer. Empty by default.
	weaverx_register_sidebar( __( 'Footer Widget Area', 'weaver-xtreme' /*adm*/),
		'footer-widget-area',
		 __( 'The footer widget area. Widgets in this area can be displayed horizontally.', 'weaver-xtreme' /*adm*/));

	$extra_areas = weaverx_getopt('_perpagewidgets');	// create extra areas?
	if (strlen($extra_areas) > 0) {
		$extra_list = explode(',', $extra_areas);
		foreach ($extra_list as $area) {
			weaverx_register_sidebar( __('Per Page Area ', 'weaver-xtreme' /*adm*/) . $area,
				'per-page-'.$area,
				__('This widget area can be added using "', 'weaver-xtreme' /*adm*/ ) .
			   $area . __('" as the name for Per Page options or the Weaver Xtreme Plus [widget_area] shortcode. Style it using: ', 'weaver-xtreme' /*adm*/ ) .
			   '".per-page-' . $area .'".'
			);
		}
	}

}


if ( ! function_exists('weaverx_register_sidebar')) {
/**
 * Register widgetized areas
 */
function weaverx_register_sidebar($name, $id, $desc, $altclass='') {
	if ($altclass != '') $altclass .= ' ';
	register_sidebar( array(
		'name' => $name,
		'id' => $id,
		'description' => $desc,
		'before_widget' => '<aside id="%1$s" class="widget ' . $altclass . '%2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
}
//--


// ================================ Weaver Xtreme admin ================================

add_action('wp_head', 'weaverx_wp_head');

function weaverx_wp_head() {	// action definition
	require_once('includes/wphead.php');
	weaverx_generate_wphead();
}
//--


if (!function_exists('weaverx_enqueue_styles')) {
function weaverx_enqueue_styles() {
	// Add stylesheets
	$sheet = get_template_directory_uri() . '/assets/css/fonts'.WEAVERX_MINIFY.'.css';
	wp_enqueue_style('weaverx-font-sheet',$sheet,array(),WEAVERX_VERSION,'all');

	// Start with the "real" stylesheet (so child theme style.css can override)

	$sheet = get_template_directory_uri() . '/assets/css/style-weaverx'.WEAVERX_MINIFY.'.css';

	wp_enqueue_style('weaverx-style-sheet',$sheet,array('weaverx-font-sheet'),WEAVERX_VERSION,'all');

	// Only add style.css if a child theme

	if ( is_child_theme() ) {  // don't bother with empty main style.css
		$sheet_dev = get_stylesheet_directory_uri() . '/style.css';	// get style.css
		$sheet = str_replace('.css', WEAVERX_MINIFY.'.css',$sheet_dev); // default sheet
		$sheet_file = get_stylesheet_directory() . '/style' . WEAVERX_MINIFY . '.css';
		if (! @file_exists($sheet_file))
			$sheet = $sheet_dev;		            // no style.min.css available (need this check for child themes)

		wp_enqueue_style( 'weaverx-root-style-sheet', $sheet, array('weaverx-style-sheet'), WEAVERX_VERSION, 'all');
	}
}
}


//--


add_action('wp_enqueue_scripts', 'weaverx_enqueue_scripts' );

function weaverx_enqueue_scripts() {	// action definition

	weaverx_enqueue_styles();	// add the styles

	// need to know the page template for some conditional script inclusion
	global $weaverx_cur_template;

	$weaverx_cur_template = (is_page()) ? get_page_template() : 'nonpage';

	$vers = weaverx_getopt('style_version');
	if (!$vers) $vers = '1';
	else $vers = sprintf("%d",$vers);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	//-- Weaver Xtreme js lib - requires jQuery...

	// put this one in <head> to enhance performance slightly for menu fix-up

	wp_enqueue_script('weaverxJSLib', get_template_directory_uri().'/assets/js/weaverxjslib'.WEAVERX_MINIFY.'.js',array('jquery'), WEAVERX_VERSION);

	$useSM = weaverx_getopt('use_smartmenus') && function_exists('weaverxplus_plugin_installed') ? '1' : '0';

	$altsw = weaverx_getopt('mobile_alt_switch');
	if ($useSM == '0' || $altsw < 10 )
		$altsw = '767';
	$altLabel = weaverx_getopt('mobile_alt_label');

	global $weaverx_cur_page_ID;
	global $post;

	if (!$weaverx_cur_page_ID && is_object($post))
		$weaverx_cur_page_ID = get_the_ID();			// this must go before weaverx_get_video_render() call

	$local = array(
		'useSmartMenus' => $useSM,
		'menuAltswitch' => $altsw,
		'mobileAltLabel' => $altLabel,
		'primaryScroll' => weaverx_getopt('m_primary_fixedtop'),
		'secondaryScroll' => weaverx_getopt('m_secondary_fixedtop'),
		'headerVideoClass' => weaverx_get_video_render()
	);

	wp_localize_script('weaverxJSLib', 'wvrxOpts', $local );

	wp_enqueue_script('weaverxJSLibEnd', get_template_directory_uri().'/assets/js/weaverxjslib-end'.WEAVERX_MINIFY.'.js',array('jquery'), WEAVERX_VERSION,true);

	weaverx_masonry('enqueue-script');
}
//--

// Load files required to make the theme work!

require_once(get_template_directory() . '/settings.php');	                // settings stay in theme root directory
require_once(get_template_directory() . '/includes/lib-content.php');	    // page/post display support
require_once(get_template_directory() . '/includes/lib-layout.php'); 	    // content layout support
require_once(get_template_directory() . '/includes/lib-runtime.php');	    // standard runtime library
require_once(get_template_directory() . '/includes/filters.php');	        // other filter and action definitions

if (is_user_logged_in() ) {
	require_once(get_template_directory() . WEAVERX_ADMIN_DIR . '/load-admin-core.php');	// load admin files
	require_once( trailingslashit( get_template_directory() ) . 'admin/customizer/trt-customize-pro/trt-customize-pro-top.php' );

}

do_action('weaver_xtreme_load_admin');		// now load the tradtional admin from plugin if loaded, otherwise basic info
do_action('weaver_xtreme_load_customizer');	// load the customizer based option inteface.


// ============================== MORE WEAVER THEME ACTIONS ===================

// Allow HTML descriptions in WordPress Menu
remove_filter( 'nav_menu_description', 'strip_tags' );
add_filter( 'wp_setup_nav_menu_item', 'weaverx_wp_setup_nav_menu_item' );
function weaverx_wp_setup_nav_menu_item( $menu_item ) {
     $menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
     return $menu_item;
}

add_action( 'after_setup_theme', 'weaverx_infinite_scroll_init' );

function weaverx_infinite_scroll_init() {
/**
 * Add theme support for infinite scroll
 *
 * @uses add_theme_support
 * @action after_setup_theme
 * @return null
 */
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'type' => 'click',
		'render' => 'weaverx_render_infinite_scroll',

	) );
}

add_filter( 'infinite_scroll_js_settings', 'weaverx_infinite_scroll_settings');

function weaverx_infinite_scroll_settings($js_settings) {
	$js_settings['text'] = __('Load more posts&hellip;', 'weaver-xtreme');
	return $js_settings;
}

function weaverx_render_infinite_scroll() {
	$GLOBALS['weaverx_page_who'] = 'blog';
	$num_cols = weaverx_getopt('blog_cols');
	if (!$num_cols || $num_cols > 3) $num_cols = 1;

	$col = 0;
	$masonry_wrap = false;	// need this for one-column posts


	/* Start the Loop */

	weaverx_post_count_clear();
	echo ("<div class=\"wvrx-posts\">\n");

	while ( have_posts() ) {
		the_post();
		weaverx_post_count_bump();

		if (!$masonry_wrap) {
			$masonry_wrap = true;
			if (weaverx_masonry('begin-posts'))	// wrap all posts
				$num_cols = 1;		// force to 1 cols
		}
		weaverx_masonry('begin-post');	// wrap each post
		switch ($num_cols) {
			case 1:
				get_template_part( 'templates/content', get_post_format() );
				$sticky_one = false;
				break;

			case 2:
				$col++;
				echo ('<div class="content-2-col clearfix">' . "\n");

				get_template_part( 'templates/content', get_post_format() );
				echo ("</div> <!-- content-2-col -->\n");

				$sticky_one = false;
				break;

			case 3:
				$col++;
				echo ('<div class="content-3-col clearfix">' . "\n");
				get_template_part( 'templates/content', get_post_format() );
				echo ("</div> <!-- content-3-col -->\n");

				$sticky_one = false;
				break;

			default:
				get_template_part( 'templates/content', get_post_format() );
				$sticky_one = false;
		}   // end switch num cols
		weaverx_masonry('end-post');
	}	// end while have posts
	weaverx_masonry('end-posts');
	echo ("</div>\n");

}

/**
 * Increase the maximum image width to be included in a 'srcset' attribute.
 *
 * @param int $max_width The maximum image width to be included in the 'srcset'. Default '1600'.
 * @return int Filtered maximum image width.
 */
if (!function_exists('weaverx_increase_max_srcset_image_width')) {
function weaverx_increase_max_srcset_image_width( $max_width ) {
	return ($max_width <= 1920) ? 1920 : $max_width;
}
add_filter( 'max_srcset_image_width', 'weaverx_increase_max_srcset_image_width' );
}

 /*	Support for Woo Commerece
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'weaverx_woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'weaverx_woo_wrapper_end', 10);

function weaverx_woo_wrapper_start() {
  echo '<div id="container" class="container"><div id="content" class="weaver-woo" role="main">';
}


function weaverx_woo_wrapper_end() {
	echo '</div></div> <!-- end weaver-woo -->';
}

add_theme_support( 'woocommerce' );

// THE END OF functions.php
?>
