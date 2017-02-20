<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Enqueue scripts and stylesheets
 */

function ascend_scripts() {
    global $ascend; 

    wp_enqueue_style('ascend_main', get_template_directory_uri() . '/assets/css/ascend.css', false, ASCEND_VERSION);
    if(class_exists('woocommerce')) {
    	wp_enqueue_style('ascend_woo', get_template_directory_uri() . '/assets/css/ascend_woo.css', false, ASCEND_VERSION);
    }
    if(is_rtl()) {
        wp_enqueue_style('kadence_rtl', get_template_directory_uri() . '/assets/css/rtl.css', false, ASCEND_VERSION);
    }
    if (is_child_theme()) {
      	$child_theme = wp_get_theme();
      	$child_version = $child_theme->get( 'Version' );
        wp_enqueue_style('kadence_child', get_stylesheet_uri(), false, $child_version);
    } 
  
  	if (is_single() && comments_open() && get_option('thread_comments')) {
    	wp_enqueue_script('comment-reply');
  	}

  	wp_register_script('kadence_plugins', get_template_directory_uri() . '/assets/js/kt_plugins.js', false, ASCEND_VERSION, true);
  	wp_register_script('kadence_main', get_template_directory_uri() . '/assets/js/kt-main.js', false, ASCEND_VERSION, true);
  	wp_enqueue_script('jquery');
  	wp_enqueue_script('masonry');
  	wp_enqueue_script('kadence_plugins');
  	wp_enqueue_script('kadence_main');

  	if(class_exists('woocommerce')) {
       		wp_register_script( 'kt-wc-add-to-cart-variation', get_template_directory_uri() . '/assets/js/min/kt-add-to-cart-variation-min.js' , array( 'jquery' ), false, ASCEND_VERSION, true );
       		wp_enqueue_script( 'kt-wc-add-to-cart-variation');
    	if(isset($ascend['product_quantity_input']) && $ascend['product_quantity_input'] == 1) {
        		wp_register_script( 'wcqi-js', get_template_directory_uri() . '/assets/js/min/wc-quantity-increment-min.js' , array( 'jquery' ), false, ASCEND_VERSION, true );
        		wp_enqueue_script( 'wcqi-js' );
    	}
  	}
}
add_action('wp_enqueue_scripts', 'ascend_scripts', 100);

function ascend_lightbox_text() {
  	global $ascend; 
  	if(!empty($ascend['lightbox_of_text'])) {$of_text = $ascend['lightbox_of_text'];} else {$of_text = __('of', 'ascend');}
  	if(!empty($ascend['lightbox_error_text'])) {$error_text = $ascend['lightbox_error_text'];} else {$error_text = __('The image could not be loaded.', 'ascend');}
  	echo  '<script type="text/javascript">var light_error = "'.$error_text.'", light_of = "%curr% '.$of_text.' %total%";</script>';
}
add_action('wp_head', 'ascend_lightbox_text');

/**
 * Add Respond.js for IE8 support of media queries
 */
function ascend_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/vendor/html5shiv.min.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/vendor/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
    echo '<!--[if IE]>'. "\n";
    echo '<link rel="stylesheet" id="ascend_ie_fallback" href="' . esc_url( get_template_directory_uri() . '/assets/css/ie_fallback.css').'" type="text/css" media="all">'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'ascend_ie_support_header', 15 );

