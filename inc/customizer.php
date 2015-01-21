<?php
/**
 * 
 *
 * @package mwsmall
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mwsmall_customize_register($wp_customize){

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    $wp_customize->add_section('mwsmall_logo', array(
        'title'    => __('Logo', 'mwsmall'),
        'priority' => 40,
    ));
	
    $wp_customize->add_setting('logo_mwsmall', array(
        //'capability'        => 'edit_theme_options',
        'type'           => 'theme_mod',
		'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_image', array(
        'label'    => __('Upload logo', 'mwsmall'),
        'section'  => 'mwsmall_logo',
        'settings' => 'logo_mwsmall',
    )));
	
	$wp_customize->add_section('mwsmall_social', array(
        'title'    => __('Social icon profiles', 'mwsmall'),
        'priority' => 40,
    ));
	
    $wp_customize->add_setting('icon_facebook', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('mwsmall_icon_facebook', array(
        'label'      => __('Facebook', 'mwsmall'),
        'section'    => 'mwsmall_social',
        'settings'   => 'icon_facebook',
    ));
	
	$wp_customize->add_setting('icon_twitter', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('mwsmall_icon_twitter', array(
        'label'      => __('Twitter', 'mwsmall'),
        'section'    => 'mwsmall_social',
        'settings'   => 'icon_twitter',
    ));	
	
	$wp_customize->add_setting('icon_google', array(
        'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	   
	$wp_customize->add_control('mwsmall_icon_google', array(
        'label'      => __('Google+', 'mwsmall'),
        'section'    => 'mwsmall_social',
        'settings'   => 'icon_google',
    ));
	
    $wp_customize->add_setting('header_bg_color', array(
        'default'           => '#3E4A57',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'   => 'postMessage',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header Background Color', 'mwsmall'),
        'section'  => 'colors',
        'settings' => 'header_bg_color',
    )));

	// Info Theme 
	$wp_customize->add_section('mwsmall_info', array(
        'title'    => __('Info Theme', 'mwsmall'),
		'description' => sprintf( __( '<a target="_blank" href="%1$s">%2$s</a><br/><br/><a target="_blank" href="%3$s" class="button button-primary">Facebook</a> | <a target="_blank" href="%4$s" class="button button-primary">Twitter</a><br/><br/><a target="_blank" href="%5$s" class="button button-primary">Donate</a>', 'mwsmall' ), 
		__( 'http://mwthemes.net', 'mwsmall' ), 
		__('If you need assistance, please do not hesitate to contact us', 'mwsmall'), 
		__('http://facebook.com/mwthemes', 'mwsmall'), 
		__('https://twitter.com/mwthemes', 'mwsmall'), 
		__('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UEV9GM57HQUHA', 'mwsmall') ),
        'priority' => 110,		
    ));
	
	$wp_customize->add_setting( 
		'more_info_mwthemes',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
		
	);
	$wp_customize->add_control( 'more_info_mwthemes', array(
		'section' => 'mwsmall_info'
	) );
}

add_action('customize_register', 'mwsmall_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mwsmall_customize() {
	wp_enqueue_script( 'js_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'mwsmall_customize' );

function mwsmall_css() {
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
add_action( 'wp_head', 'mwsmall_css');

function promo_info_none(){
	?>
	<style type="text/css">
		#customize-control-more_info_mwthemes input{
			display: none;
		}
		#customize-theme-controls #accordion-section-mwsmall_info .accordion-section-title {
			background-color: #8CBEDD;
		}
	</style>
	<?php
}
add_action('customize_controls_print_styles', 'promo_info_none');