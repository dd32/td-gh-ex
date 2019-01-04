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
define( 'BATOURSLIGHT_VERSION', '1.0.3' );
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
	$image_sizes = BAT_Settings::$image_sizes;
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
    
        wp_enqueue_style( 'batourslight-fontawesome' , BATOURSLIGHT_URI . '/fonts/fontawesome-free/css/all.min.css', false, '5.6.3' );
    
        wp_enqueue_style('dashicons');
        
        // Output Google fonts if set.
        $google_fonts = BAT_Settings::google_font_styles();
        if ( $google_fonts ) {
            wp_enqueue_style( 'batourslight-gfonts', esc_url( $google_fonts ), false );
        }
    
        $styles = array(
			'normalize' => 'normalize.css',
			'bootstrap-reboot' => 'bootstrap-reboot.min.css',
			'bootstrap-popovers' => 'bootstrap-popovers.css',
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
        wp_add_inline_style( 'batourslight-main', BAT_Settings::inline_styles() );
        
        //Load comment reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
        $scripts = array(
			'html5' => 'html5.js',
			'navigation' => 'navigation.js',
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

///////////admin_enqueue_scripts

add_action( 'admin_enqueue_scripts', 'batourslight_admin_enqueue_scripts', 10, 1 );
/**
 * Loads admin styles and scripts.
 *
 */
function batourslight_admin_enqueue_scripts(){
    
    global $pagenow, $typenow;
    
        wp_enqueue_style( 'batourslight-fontawesome' , BATOURSLIGHT_URI . '/fonts/fontawesome-free/css/all.min.css', false, '5.5.0' );
    
        //Load color picker for categories
        if ( in_array( $pagenow, array('edit-tags.php', 'term.php') ) && isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'category' ) {
            wp_enqueue_style( 'wp-color-picker' );
        }
        
        if ( $typenow == 'page' && ($pagenow == 'post.php' || $pagenow == 'post-new.php') ) {
            wp_enqueue_style ( 'wp-jquery-ui-dialog' );
        }
    
        $styles = array(
			'admin' => 'admin.css',
		);

		foreach ( $styles as $id => $style ) {
			wp_enqueue_style( 'batourslight-' . $id, BATOURSLIGHT_URI . '/admin/css/' . $style, false, BATOURSLIGHT_VERSION );
		}      
    
}

//////////////////////////////////

add_action( 'widgets_init', 'batourslight_widgets_init', 10 );

function batourslight_widgets_init(){
      
     foreach (BAT_Settings::$sidebars as $id => $sidebar){   
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

// Add shortcodes support for widgets.
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

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
