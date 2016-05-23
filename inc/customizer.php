<?php
/**
 * The Box Theme Customizer
 *
 * @package thebox
 * @since thebox 1.0
 */


/**
 * The Box Theme Customizer
 *
 */
function thebox_theme_customizer( $wp_customize ) {
	
	// Add postMessage support for site title and description for the Theme Customizer.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Accent Color
	$wp_customize->add_setting( 'color_primary', array(
		'default' => '#0fa5d9',
		'type' => 'option', 
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
		
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_primary', array(
		'label' => __( 'Accent Color', 'thebox' ),
		'section' => 'colors',
		'settings' => 'color_primary',
	) ) );
	
	// Footer Background
	$wp_customize->add_setting( 'color_footer', array(
		'default' => '#353535',
		'type' => 'option', 
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_footer', array(
		'label' => __( 'Footer Background', 'thebox' ),
		'section' => 'colors',
		'settings' => 'color_footer',
	) ) );
	
	// The Box Panel
	$wp_customize->add_panel( 'thebox_panel', array(
    	'title' => __( 'Theme Settings', 'thebox' ),
		'priority' => 20,
	) );
	
	// Post Section
	$wp_customize->add_section( 'thebox_post_section' , array(
		'title' => __( 'Post', 'thebox' ),
		'priority' => 10,
		'panel' => 'thebox_panel',
	) );
	
	// Enable Featured Image
	$wp_customize->add_setting( 'thebox_enable_featured_image', array(
        'default' => '',
        'capability' => 'edit_theme_options',
		'type'       => 'option',
		'sanitize_callback' => 'thebox_sanitize_checkbox',
    ) );
   	
	$wp_customize->add_control( 'thebox_enable_featured_image', array(
	    'label'    		=> __( 'Enable Featured Image', 'thebox' ),
	    'section'  		=> 'thebox_post_section',
	    'settings' 		=> 'thebox_enable_featured_image',
	    'type'     		=> 'checkbox',
	) );
	
	// Page Section
	$wp_customize->add_section( 'thebox_page_section' , array(
		'title' => __( 'Page', 'thebox' ),
		'priority' => 15,
		'panel' => 'thebox_panel',
	) );
	
	// Enable Featured Image
	$wp_customize->add_setting( 'thebox_page_featured_image', array(
		'default' => '',
        'capability' => 'edit_theme_options',
		'type'       => 'option',
		'sanitize_callback' => 'thebox_sanitize_checkbox',
    ) );
   	
	$wp_customize->add_control( 'thebox_page_featured_image', array(
	    'label'    		=> __( 'Enable Featured Image', 'thebox' ),
	    'section'  		=> 'thebox_page_section',
	    'settings' 		=> 'thebox_page_featured_image',
	    'type'     		=> 'checkbox',
	) );
	
}
add_action('customize_register', 'thebox_theme_customizer');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function thebox_customize_preview_js() {
	wp_enqueue_script( 'thebox_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'thebox_customize_preview_js' );


/**
 * Upgrade Link
 *
 */
function the_box_plus_customize_js() { ?>
	<script>
		jQuery('#customize-info').prepend('<div class="the-box-upgrade" style="background-color:#40a149;text-align:center;"><a style="display:block;color:#fff;padding:10px 14px" href="http://www.designlabthemes.com/the-box-plus-wordpress-theme/" target="_blank"><?php _e('View the Box Plus Upgrade', 'thebox'); ?> <span>&rarr;</span></a></div>');
	</script>
<?php }
add_action( 'customize_controls_print_footer_scripts', 'the_box_plus_customize_js' );


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
 * Get Contrast
 *
 */
function get_brightness($hex) {
 // returns brightness value from 0 to 255
 // strip off any leading #
 $hex = str_replace('#', '', $hex);

 $c_r = hexdec(substr($hex, 0, 2));
 $c_g = hexdec(substr($hex, 2, 2));
 $c_b = hexdec(substr($hex, 4, 2));

 return (($c_r * 299) + ($c_g * 587) + ($c_b * 114)) / 1000;
}


/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 */
function add_color_styles() { ?>

<?php
	$color_primary = get_option('color_primary'); 
	$color_footer = get_option('color_footer');
	?>

	<style type="text/css">
	<?php
	/* Accent Color */
	if ( $color_primary != '' ) { ?>
		.main-navigation > div > ul,
		#main input#submit,
		#main button,
		#main input[type="button"],
		#main input[type="reset"],
		#main input[type="submit"],
		#content .page-numbers.current,
		#content .page-numbers.current:hover,
		#content .page-numbers a:hover {
		background-color: <?php echo $color_primary; ?>;	
		}
		#main input#submit:hover,
		#main button:hover,
		#main input[type="button"]:hover,
		#main input[type="reset"]:hover,
		#main input[type="submit"]:hover {
		background-color: rgba(<?php echo hex2rgb( $color_primary ); ?>, 0.9);		
		}
		.entry-time {
		background-color: rgba(<?php echo hex2rgb( $color_primary ); ?>, 0.7);		
		}
		.site-header .main-navigation ul ul a:hover,
	    .site-header .main-navigation ul ul a:focus,
	    .site-header .site-title a:hover,
	    .site-header .site-title a:focus,
	    .page-title a:hover,
	    .entry-title a:hover,
	    .entry-content a,
	    .entry-content a:hover,
	    .entry-summary a,
	    .entry-summary a:hover,
		.entry-footer a,
	    .entry-footer a:hover,
	    .entry-footer .icon-font,
	    .entry-meta a,
	    .author-bio a,
	    .comments-area a,
	    .page-title span,
		#tertiary td a,
		.more-link,
		#nav-above a,
	    #nav-below a,
		#secondary a,
		#secondary a:hover,
		#secondary .widget_recent_comments a.url { 
	    color: <?php echo $color_primary; ?>;
	    }
	    .edit-link a {
		border-color: <?php echo $color_primary; ?>;
	    }
	<?php }
	    
	/* Footer Background */
	if ( $color_footer != '' ) { ?>
	    .site-footer {
		background-color: <?php echo $color_footer; ?>;	
		}
	    <?php 
		/* Footer Link Color */
		if ( get_brightness($color_footer) > 155) { ?>
			.site-footer,
			.site-footer a,
			.site-footer a:hover {
			color: rgba(0,0,0,.9);
			}
			#tertiary {
			border-bottom-color: rgba(0,0,0,.05);
			}
		<?php } else { ?>		
			.site-footer,
			.site-footer a,
			.site-footer a:hover {
			color: #fff;
			}
			#tertiary {
			border-bottom-color: rgba(255,255,255,.1);
			}
		<?php } 
	} ?>
	
	</style>

<?php
}
add_action('wp_head', 'add_color_styles');


/**
 * Sanitizes Checkbox
 */ 
function thebox_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

