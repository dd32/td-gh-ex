<?php
/**
 * 
 *
 * @package MWBlog
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mwblog_customize_register($wp_customize){

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    $wp_customize->add_section('mwblog_logo', array(
        'title'    => __('Logo', 'mwblog'),
        'priority' => 40,
    ));
	
    $wp_customize->add_setting('logo_mwblog', array(
        //'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_image', array(
        'label'    => __('Upload logo', 'mwblog'),
        'section'  => 'mwblog_logo',
        'settings' => 'logo_mwblog',
    )));
	
	$wp_customize->add_section('mwblog_social', array(
        'title'    => __('Social icon profiles', 'mwblog'),
        'priority' => 40,
    ));
	
    $wp_customize->add_setting('icon_facebook', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod', 
    ));
 
    $wp_customize->add_control('mwblog_icon_facebook', array(
        'label'      => __('Facebook', 'mwblog'),
        'section'    => 'mwblog_social',
        'settings'   => 'icon_facebook',
    ));
	
	$wp_customize->add_setting('icon_twitter', array(
		'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
	));
	   
	$wp_customize->add_control('mwblog_icon_twitter', array(
        'label'      => __('Twitter', 'mwblog'),
        'section'    => 'mwblog_social',
        'settings'   => 'icon_twitter',
    ));	
	
	$wp_customize->add_setting('icon_google', array(
		'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
	));
	   
	$wp_customize->add_control('mwblog_icon_google', array(
        'label'      => __('Google+', 'mwblog'),
        'section'    => 'mwblog_social',
        'settings'   => 'icon_google',
    ));
	
    $wp_customize->add_setting('header_bg_color', array(
        'default'           => '#3E4A57',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'   => 'postMessage',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header Background Color', 'mwblog'),
        'section'  => 'colors',
        'settings' => 'header_bg_color',
    )));

	// Info Theme 
	$wp_customize->add_section('mwblog_info', array(
        'title'    => __('Info Theme', 'mwblog'),
		'description' => sprintf( __( '<a target="_blank" href="%1$s">%2$s</a><br/><br/><a target="_blank" href="%3$s" class="button button-primary">Facebook</a> | <a target="_blank" href="%4$s" class="button button-primary">Twitter</a><br/><br/><a target="_blank" href="%5$s" class="button button-primary">Donate</a>', 'mwblog' ), 
		__( 'http://mwthemes.net', 'mwblog' ), 
		__('If you need assistance, please do not hesitate to contact us', 'mwblog'), 
		__('http://facebook.com/mwthemes', 'mwblog'), 
		__('https://twitter.com/mwthemes', 'mwblog'), 
		__('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UEV9GM57HQUHA', 'mwblog') ),
        'priority' => 110,
    ));
	
	$wp_customize->add_setting( 
		'more_info_mwthemes'
	);
	$wp_customize->add_control( 'more_info_mwthemes', array(
		'section' => 'mwblog_info',
		'type' => 'info',
	) );
}

add_action('customize_register', 'mwblog_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mwblog_customize() {
	wp_enqueue_script( 'js_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'mwblog_customize' );


function mw_css() {
	$header_text_color = get_header_textcolor();
    ?>
		<style type="text/css">
			#masthead,
			header .search-box-wrapper { 
				background-color: <?php echo get_theme_mod('header_bg_color'); ?>; 
			}
			.mw_header_image h2 {
				color: #<?php echo $header_text_color; ?>;
			}
		</style>
    <?php
}
add_action( 'wp_head', 'mw_css');