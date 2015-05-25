<?php
/**
 * Customizer Options
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
 
/**
 * Customizer Sanitization
 *
 * @since Agama v1.0
 */
function agama_sanitize_upload( $input ) {
	$output = '';
	$filetype = wp_check_filetype($input);
	if ( $filetype["ext"] ) {
		$output = $input;
	}
	return $output;
}
add_filter( 'agama_sanitize_upload', 'agama_sanitize_upload' );
 
/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0
 */
function agama_customize_register( $wp_customize ) {
	
	// Register postMessage support
	// Add postMessage support for site title and description for the Customizer.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Add "General Settings" section
	$wp_customize->add_section( 'agama_skin_section', array(
		'title'		=> __( 'Agama Skin', AGAMA_DOMAIN ),
		'priority'	=> 30,
	) );
	
	// Agama primary color setting
	$wp_customize->add_setting( 'agama_primary_color', array(
		'default'			=> '#21759b',
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	// Agama primary color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'agama_primary_color', array(
		'label'		=> __( 'Primary Color', AGAMA_DOMAIN ),
		'section'	=> 'agama_skin_section',
		'settings'	=> 'agama_primary_color'
	) ) );
	
	// Agama skin setting
	$wp_customize->add_setting( 'agama_skin', array(
		'default'			=> 'dark',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Agama skin control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_skin', array(
		'label'		=> __( 'Skin', AGAMA_DOMAIN ),
		'section'	=> 'agama_skin_section',
		'settings'	=> 'agama_skin',
		'type'		=> 'select',
		'choices'	=> array(
			'light' => __( 'Light', AGAMA_DOMAIN ),
			'dark'	=> __( 'Dark', AGAMA_DOMAIN )
		)
	) ) );
	
	// Add "Agama Header" section
	$wp_customize->add_section( 'agama_header_section', array(
		'title'		=> __( 'Agama Header', AGAMA_DOMAIN ),
		'priority'  => 30,
	) );
	
	// Header top margin setting
	$wp_customize->add_setting( 'header_top_margin', array(
		'default' 			=> '0px',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Header top margin control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_top_margin', array(
		'label'		=> __( 'Top Margin', AGAMA_DOMAIN ),
		'section'	=> 'agama_header_section',
		'settings'	=> 'header_top_margin',
		'type'		=> 'select',
		'choices'	=> array(
			'0px' 	=> '0px',
			'1px' 	=> '1px',
			'2px'	=> '2px',
			'3px'	=> '3px',
			'4px'	=> '4px',
			'5px'	=> '5px',
			'10px'	=> '10px',
			'15px'	=> '15px',
			'20px'	=> '20px',
			'25px'	=> '25px',
			'50px'	=> '50px',
			'100px'	=> '100px'
		)
	) ) );
	
	// Header top border size
	$wp_customize->add_setting( 'header_top_border_size', array(
		'default' 			=> '3px',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	
	// Header top border size control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_top_border_size', array(
		'label'		=> __( 'Top Border Size', AGAMA_DOMAIN ),
		'section'	=> 'agama_header_section',
		'settings'	=> 'header_top_border_size',
		'type'		=> 'select',
		'choices'	=> array(
			'1px'	=> '1px',
			'2px'	=> '2px',
			'3px'	=> '3px',
			'4px'	=> '4px',
			'5px'	=> '5px',
			'6px'	=> '6px',
			'7px'	=> '7px',
			'8px'	=> '8px',
			'9px'	=> '9px',
			'10px'	=> '10px'
		)
	) ) );
	
	// Header top border color
	$wp_customize->add_setting( 'header_top_border_color', array(
		'default' 			=> '#21759b',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_hex_color',
	) );
	
	// Header top border color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_top_border_color', array(
		'label'      => __( 'Top Border Color', AGAMA_DOMAIN ),
		'section'    => 'agama_header_section',
		'settings'   => 'header_top_border_color',
	) ) );
	
	// Header logo setting
	$wp_customize->add_setting( 'header_logo', array(
		'default'			=> '',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'agama_sanitize_upload',
	) );
	
	// Header logo control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'		=> __( 'Upload Logo', AGAMA_DOMAIN ),
		'section'	=> 'agama_header_section',
		'settings'	=> 'header_logo',
		'context'	=> '',
		'priority'	=> 1,
	) ) );
	
	// Top navigation, enable / disable setting
	$wp_customize->add_setting( 'agama_top_navigation', array(
		'default'			=> 1,
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	
	// Top navigation enable / disable control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'agama_top_navigation', array(
		'label' 	=> __( 'Enable Top Navigation', AGAMA_DOMAIN ),
		'section'	=> 'nav',
		'settings'	=> 'agama_top_navigation',
		'type'		=> 'checkbox',
		'priority'	=> 1,
	) ) );
	
	// Rename default customizer "Colors" section
	$wp_customize->add_section( 'colors', array(
		'title'		=> __( 'Agama Colors', AGAMA_DOMAIN ),
		'priority'	=> 40,
	) );
	
	// Rename default customizer "Background Image" section
	$wp_customize->add_section( 'background_image', array(
		'title'		=> __( 'Agama Body', AGAMA_DOMAIN ),
		'priority'	=> 0,
	) );
}
add_action( 'customize_register', 'agama_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Agama 1.0
 */
function agama_customize_preview_js() {
	wp_register_script( 'agama-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), uniqid(), true );
	$localize = array(
		'skin_url' 			=> esc_url( get_stylesheet_directory_uri() . '/assets/css/skins/' ),
		'top_nav_enable'	=> get_theme_mod( 'agama_top_navigation' )
	);
	wp_localize_script( 'agama-customizer', 'agama', $localize );
	wp_enqueue_script( 'agama-customizer' );
}
add_action( 'customize_preview_init', 'agama_customize_preview_js' );

/**
 * Generating Live CSS
 *
 * @since Agama 1.0
 */
function agama_customize_css() 
{ ?>
	<style type="text/css" id="agama-customize-css">
	a, 
	a:hover,
	.site-header h1 a:hover, 
	.site-header h2 a:hover,
	a.comment-reply-link:hover, 
	a.comment-edit-link:hover,
	.comments-area article header a:hover,
	.widget-area .widget a:hover,
	.comments-link a:hover, 
	.entry-meta a:hover,
	footer[role="contentinfo"] a:hover {
		color: <?php echo get_theme_mod( 'agama_primary_color' ); ?>; 
	}
	
	#main-wrapper { 
		margin-top: <?php echo get_theme_mod( 'header_top_margin' ); ?>;
		border-top-width: <?php echo get_theme_mod( 'header_top_border_size', '3px' ); ?>; 
		border-top-color: <?php echo get_theme_mod( 'header_top_border_color', '#f72459' ); ?>;
		border-top-style: solid;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'agama_customize_css' );