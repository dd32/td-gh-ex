<?php
/**
 * Theme's functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

////////////////////////////////////////////////////////////
//// Theme setup section.
////////////////////////////////////////////////////////////

/**
 * System defines.
 */
define( 'BATOURSLIGHT', __FILE__ );
define( 'BATOURSLIGHT_VERSION', '1.0.9' );
define( 'BATOURSLIGHT_NAME', 'BA Tours light' );
define( 'BATOURSLIGHT_URI', get_template_directory_uri() );
define( 'BATOURSLIGHT_DIR', untrailingslashit( dirname( BATOURSLIGHT ) ) );
define( 'BATOURSLIGHT_TEXTDOMAIN', 'ba-tours-light' );
define( 'BATOURSLIGHT_AUTHOR', 'Booking Algorythms' );
define( 'BATOURSLIGHT_AUTHOR_URL', 'https://ba-booking.com/' );

//////////////////////////////////////

add_action( 'after_setup_theme', 'batourslight_setup', 10 );

function batourslight_setup(){
    
    /* Add thumbnails support */
	add_theme_support( 'post-thumbnails' );

	/* Add theme support for title tag */
	add_theme_support( 'title-tag' );
    
    /* Add post formats support */
	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'video' ) );
    
    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Support for HTML5 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	/* Automatic Feed Links */
	add_theme_support( 'automatic-feed-links' );
    
    add_theme_support(
		'custom-logo', apply_filters(
			'batourslight_custom_logo_args', array(
				'height'      => 80,
                'width'       => 200,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ),
			)
		)
	);
    
    /* Add image sizes */
	$image_sizes = batourslight_Settings::$image_sizes;
	if ( !empty( $image_sizes ) ) {
		foreach ( $image_sizes as $id => $size ) {
			add_image_size( $id, $size['width'], $size['height'], $size['crop'] );
		}
	}
    
    // Register navigation menus.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu (header)', 'ba-tours-light' )
		)
	);
    
    return;
}

//////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'batourslight_enqueue_scripts', 10, 1 );
/**
 * Loads required styles and scripts.
 *
 */
function batourslight_enqueue_scripts(){
    
        wp_enqueue_style('dashicons');
        
        // Output Google fonts if set.
        $google_fonts = batourslight_Settings::google_font_styles();
        if ( $google_fonts ) {
            wp_enqueue_style( 'batourslight-gfonts', esc_url( $google_fonts ), false );
        }
    
        $styles = array(
			'normalize' => 'normalize.css',
            'bootstrap' => 'bootstrap.min.css',
		);

		foreach ( $styles as $id => $style ) {
			wp_enqueue_style( 'batourslight-' . $id, BATOURSLIGHT_URI . '/css/' . $style, false, BATOURSLIGHT_VERSION );
		}
        
        wp_enqueue_style( 'batourslight-slick' , BATOURSLIGHT_URI . '/js/slick/slick.css', false, BATOURSLIGHT_VERSION );
        
        wp_enqueue_style( 'batourslight-slick-theme' , BATOURSLIGHT_URI . '/js/slick/slick-theme.css', false, BATOURSLIGHT_VERSION );
        
        //// main styles file
        wp_enqueue_style( 'batourslight-main' , BATOURSLIGHT_URI . '/style.css', false, BATOURSLIGHT_VERSION );
        
        //// custom styles
        wp_add_inline_style( 'batourslight-main', batourslight_Settings::inline_styles() );
        
        //Load comment reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
        $scripts = array(
			'html5' => 'html5.js',
			'skip-link-focus-fix' => 'skip-link-focus-fix.js',
            'popper' => 'popper.min.js',
			'bootstrap' => 'bootstrap.min.js',
            'slick' => 'slick/slick.min.js',
			'theme' => 'theme.js'
		);

		foreach ( $scripts as $id => $script ) {
			wp_enqueue_script( 'batourslight-'.$id, BATOURSLIGHT_URI .'/js/'. $script, array( 'jquery' ), BATOURSLIGHT_VERSION, true );
		}
        
        wp_script_add_data( 'batourslight-html5', 'conditional', 'lt IE 9' );        
    
}

///////////////////////////////

add_filter('script_loader_tag', 'batourslight_async_defer_scripts', 10, 3);
/**
 * Loads scripts as async or defer to improve site perfomance.
 *
 */
function batourslight_async_defer_scripts($tag, $handle, $src) {
   
   $scripts = array(
			'html5' => 1,
			'skip-link-focus-fix' => 1,
            'popper' => 1,
			'bootstrap' => 1,
   );
   
   if (isset($scripts[$handle])) {
       return str_replace(' src', ' async="async" src', $tag);
   }
     
   return $tag;
}

//////////////////////////////////

add_action( 'widgets_init', 'batourslight_widgets_init', 10 );

function batourslight_widgets_init(){
      
     foreach (batourslight_Settings::$sidebars as $id => $sidebar){   
        register_sidebar(
			array(
				'id' => $id,
				'name' => esc_html( $sidebar['name'] ),
				'description' => (isset($sidebar['desc']) ? esc_html($sidebar['desc']) : ''),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>'
			)
		);
     }   
        
     return;
}

if ( ! isset( $content_width ) ) $content_width = 900;

//////////////////////////////////////////////////

add_filter( 'wp_get_attachment_image_attributes', 'batourslight_post_thumbnail_sizes_attr', 10, 1 );

/**
 * Add custom sizes attribute to responsive image functionality for post thumbnails.
 *
 * @param array $attr  Attributes for the image markup.
 * @return string Value for use in post thumbnail 'sizes' attribute.
 */
function batourslight_post_thumbnail_sizes_attr( $attr ) {

	if ( is_admin() ) {
		return $attr;
	}

	if ( ! is_singular() ) {
		$attr['sizes'] = '(max-width: 34.9rem) calc(100vw - 2rem), (max-width: 53rem) calc(8 * (100vw / 12)), (min-width: 53rem) calc(6 * (100vw / 12)), 100vw';
	}

	return $attr;
}


//////////////////////////////////////////////////

include_once BATOURSLIGHT_DIR . '/includes/class-settings.php';

include_once BATOURSLIGHT_DIR . '/includes/class-page-options.php';

include_once BATOURSLIGHT_DIR . '/includes/class-nav-menu.php';

/**
 * Recommended plugins.
 */
include_once BATOURSLIGHT_DIR . '/includes/functions-plugins.php';

/**
 * Theme administration.
 */
if ( is_admin() ) {
	
	include_once BATOURSLIGHT_DIR . '/includes/class-redux.php';
	include_once BATOURSLIGHT_DIR . '/includes/class-cmb2-admin.php';
    
    include_once BATOURSLIGHT_DIR . '/includes/customizer.php';
}

////////////////////////////////////////////////////////////
//// Functions section.
////////////////////////////////////////////////////////////

include_once BATOURSLIGHT_DIR . '/includes/template-functions.php';     
