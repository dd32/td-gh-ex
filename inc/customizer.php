<?php
/**
 * The Box Theme Customizer
 *
 * @package thebox
 * @since thebox 1.0
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 */
function thebox_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'thebox_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thebox_customize_preview_js() {
	wp_enqueue_script( 'thebox_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'thebox_customize_preview_js' );


/**
 * The Box Customizer
 *
 */
function thebox_theme_customizer( $wp_customize ) {
		
	// Accent Color
	$wp_customize->add_setting( 'color_primary', array(
		'default' => '#0fa5d9',
		'type' => 'option', 
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_primary', array(
		'label' => __( 'Accent Color', 'thebox' ),
		'section' => 'colors',
		'settings' => 'color_primary'
	) ) );
	
}
add_action('customize_register', 'thebox_theme_customizer');


/**
 * Convert hex to rgb
 *
 */
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
}


/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 */
function add_color_styles() { ?>

<?php

	$color_primary = get_option('color_primary'); 
	
	if ( $color_primary != '' ) {
	?>

	<style type="text/css">

		.main-navigation > div > ul,
		#main button,
		#main input[type="button"],
		#main input[type="reset"],
		#main input[type="submit"],
		#content .page-numbers.current,
		#content .page-numbers.current:hover,
		#content .page-numbers a:hover {
		background-color: <?php echo $color_primary; ?>;	
		}
		#main button:hover,
		#main input[type="button"]:hover,
		#main input[type="reset"]:hover,
		#main input[type="submit"]:hover {
		background-color: rgba(<?php echo hex2rgb( $color_primary ); ?>, 0.9);		
		}
		#content .entry-time {
		background-color: rgba(<?php echo hex2rgb( $color_primary ); ?>, 0.7);		
		}
		.site-header .main-navigation ul ul a:hover,
	    .site-header .main-navigation ul ul a:focus,
	    .site-header h1.site-title a:hover,
	    #nav-below a,
	    .entry-summary a,
	    .entry-content a,
	    #content .entry-title a:hover,
	    #content .entry-title a:focus,
	    #content .entry-title a:active,
	    #content .cat-links .icon-font,
	    #content .tags-links .icon-font,
	    #content .more-link,
	    #content .entry-content a,
	    #content .entry-meta a,
	    #content .comments-area a,
	    #content .page-title span,
		#content #tertiary td a,
		#secondary a,
		#secondary .widget_recent_comments a.url { 
	    color: <?php echo $color_primary; ?>;
	    }
	    #content .edit-link a {
		border-color: <?php echo $color_primary; ?>;
	    }
	    
	</style>

<?php
	}
}
add_action('wp_head', 'add_color_styles');
