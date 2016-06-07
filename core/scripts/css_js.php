<?php
if ( ! function_exists( 'bhumi_fonts_url' ) ) :
/**
 * Register Google fonts for Bhumi.
 *
 * Create your own bhumi_fonts_url() function to override in a child theme.
 *
 *
 */
function bhumi_fonts_url() {
    $fonts_url = '';
    $fonts     = array();

    /* translators: If there are characters in your language that are not supported by Open San, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Open Sans Regular font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Open+Sans';
    }

    /* translators: If there are characters in your language that are not supported by Open San, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Open Sans Bold font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Open+Sans:700';
    }

    /* translators: If there are characters in your language that are not supported by Open San, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Open Sans Semi Bold font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Open+Sans:600';
    }
      /* translators: If there are characters in your language that are not supported by Roboto Regular, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Roboto Regular font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Roboto';
    }

    /* translators: If there are characters in your language that are not supported by Roboto Bold, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Roboto Bold font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Roboto:700';
    }

    /* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Raleway:600';
    }

    /* translators: If there are characters in your language that are not supported by Courgette, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Courgette font: on or off', 'bhumi' ) ) {
        $fonts[] = 'Courgette';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw($fonts_url);
}
endif;

function bhumi_scripts()
        {
                wp_enqueue_style( 'bhumi-fonts', bhumi_fonts_url() , array(), null);
                wp_enqueue_style('bhumi_bootstrap', BHUMI_TEMPLATE_DIR_URI .'/assets/css/bootstrap.css');
                wp_enqueue_style('bhumi_default', BHUMI_TEMPLATE_DIR_URI . '/assets/css/default.css');
                wp_enqueue_style('bhumi_theme', BHUMI_TEMPLATE_DIR_URI . '/assets/css/bhumi-theme.css');
                wp_enqueue_style('bhumi_media_responsive', BHUMI_TEMPLATE_DIR_URI . '/assets/css/media-responsive.css');
                wp_enqueue_style('bhumi_animations', BHUMI_TEMPLATE_DIR_URI . '/assets/css/animations.css');
                wp_enqueue_style('bhumi_theme-animtae', BHUMI_TEMPLATE_DIR_URI . '/assets/css/theme-animtae.css');
                wp_enqueue_style('bhumi_font_awesome', BHUMI_TEMPLATE_DIR_URI . '/assets/css/font-awesome-4.3.0/css/font-awesome.css');
                 wp_enqueue_style( 'bhumi_style', get_stylesheet_uri());
                 $cpm_theme_options = bhumi_get_options();
                 $bhumi_custom_css = $cpm_theme_options['custom_css'];
                 $custom_css = "
                        $bhumi_custom_css;
                        ";
                wp_add_inline_style( 'bhumi_style', $custom_css );

                // Js
                wp_enqueue_script('bhumi_menu', BHUMI_TEMPLATE_DIR_URI .'/assets/js/menu.js', array('jquery'));
                wp_enqueue_script('bhumi_bootstrap_script', BHUMI_TEMPLATE_DIR_URI .'/assets/js/bootstrap.js');
                wp_enqueue_script('bhumi_theme_script', BHUMI_TEMPLATE_DIR_URI .'/assets/js/bhumi_theme_script.js');
                if(is_front_page()){
                        //Footer JS//
                		wp_enqueue_script('bhumi_footer_script', BHUMI_TEMPLATE_DIR_URI .'/assets/js/bhumi-footer-script.js','','',true);
                		wp_enqueue_script('bhumi_waypoints', BHUMI_TEMPLATE_DIR_URI .'/assets/js/waypoints.js','','',true);
                		wp_enqueue_script('bhumi_scroll', BHUMI_TEMPLATE_DIR_URI .'/assets/js/scroll.js','','',true);
        		}
                if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        }
        add_action('wp_enqueue_scripts', 'bhumi_scripts');