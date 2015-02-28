<?php
/**
 * storto functions and dynamic template
 *
 * @package storto
 */

 /**
 * Register All Colors
 */
function storto_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
	'slug'=>'color_primary', 
	'default' => '#aaaaaa',
	'label' => __('Primary Color ', 'semplicemente')
	);
	
	$colors[] = array(
	'slug'=>'color_link', 
	'default' => '#e08557',
	'label' => __('Link Color ', 'semplicemente')
	);
	
	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'colors',
			'settings' => $color['slug'])
		)
	);
	}
	
}
add_action( 'customize_register', 'storto_color_primary_register' );

/**
 * Add Custom CSS to Header 
 */
function storto_custom_css_styles() { 
	$color_primary = get_option('color_primary');
	$color_link = get_option('color_link');
?>

<style type="text/css">
	<?php if (!empty($color_primary)) : ?>
	body,
	button,
	input,
	select,
	textarea,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	textarea:focus {
		color: <?php echo $color_primary; ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($color_link)) : ?>
	blockquote {
		border-left: 5px solid <?php echo $color_link; ?>;
		border-right: 2px solid <?php echo $color_link; ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	textarea:focus,
	#wp-calendar tbody td#today,
	.readMoreLink a:hover, 
	.dataBottom a:hover,
	#toTop:hover	{
		border: 1px solid <?php echo $color_link; ?>;
	}
	a, a:hover, a:focus, a:active, .main-navigation ul li .indicator, .content-area .sticky:before {
		color: <?php echo $color_link; ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'storto_custom_css_styles');