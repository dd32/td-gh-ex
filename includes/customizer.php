<?php
/**
 * BOXY Theme Customizer
 *
 * @package BOXY
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function boxy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'boxy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function boxy_customize_preview_js() {
	wp_enqueue_script( 'boxy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'boxy_customize_preview_js' );


if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_primary_custom_css' );

	function wbls_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#f94242'); 
			$style2_custom_css = get_theme_mod('color');

		if( $style2_custom_css == '3' || $style2_custom_css == '5' ) { ?>  
			<style type="text/css"> 
			  .flex-container .flex-caption a {
	               background-color: <?php echo esc_html($primary_color);?>;
			   }
			</style><?php 
		}

		if( $style2_custom_css == '3') { ?>  
			<style type="text/css"> 
			   .services .service-title h3,.services .service-title p i {
	               color: <?php echo esc_html($primary_color);?>;
			   }
			</style><?php 
		} ?> 

	<style type="text/css">

		.flex-recent-posts ul.slides li a.post-readmore:hover .rp-thumb {
			opacity: 0.7;
		}
		.site-footer .scroll-to-top:hover,.portfolioeffects .portfolio_overlay {
			opacity: 0.6;
		}

	</style>
<?php
	}
}



