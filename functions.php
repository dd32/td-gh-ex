<?php
$template_directory = get_template_directory();
global $themename;

//define 
define( 'CT_THEME_PRO_USED', false );

if( defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED ){
define( 'CT_SHORTCODES_USED', true );//false true
define( 'CT_FEATURED_HOMEPAGE_USED', true );//Homepage Slider
define( 'CT_HOMEPAGE_SLIDER_USED', true );
define( 'CT_VIDEO_BACKGROUND_USED', true );
define( 'CT_GOOGLE_FONTS_USED', true );
define( 'CT_PAGE_BUILDER_USED', false );//  --delete
}
//define( 'CT_ACOOL_FREE', true );
define( 'CT_ACOOL_VERSION', '1.3.1' );
define( 'CT_ACOOL_COOTHEMES', false );

add_action( 'wp_enqueue_scripts', 'jquery_register' );
function jquery_register()
{
	if ( !is_admin() )
	{
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( get_template_directory_uri() .'/js/jquery-2.1.4.min.js' ), false, '2.1.4', true );
		//replace   google url: https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js
		wp_enqueue_script( 'jquery' );
	}
}

require_once( $template_directory . '/includes/theme-setup.php' );

if ( defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED ){
	require_once( $template_directory . '/includes/pro-theme-setup.php');
}
if ( defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED ){
	require_once( $template_directory . '/includes/widgets.php');
}
/**
 * Theme functions
 //include comment.php 
 */
require_once( $template_directory . '/includes/custom-functions.php' );

if ( defined( 'CT_SHORTCODES_USED' ) && CT_SHORTCODES_USED ){
	require_once( $template_directory . '/includes/shortcodes/shortcodes.php');
}


//auto active_plugins  --delete
if ( defined( 'CT_PAGE_BUILDER_USED' ) && CT_PAGE_BUILDER_USED === true ){
			
	$plugins = get_option('active_plugins');
	$puginsToActiv = array('so-widgets-bundle/so-widgets-bundle.php');//'siteorigin-panels/siteorigin-panels.php',
	foreach ($puginsToActiv as $key => $value)
	{
		if (!in_array($value, $plugins))
		{
			array_push($plugins,$value);
			update_option('active_plugins',$plugins);
		}
	}		
}

if( !class_exists("Mobile_Detect") ) 
require_once( $template_directory . '/includes/Mobile_Detect.php' );

/*
 * Loads the Options Panel    theme options
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if (!function_exists('optionsframework_init'))
{
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/options-framework/' );
	require_once( $template_directory . '/includes/options-framework/options-framework.php');	
}





	
	
/**
 * Theme functions
 */

// set support  "Featured Image"
add_theme_support('post-thumbnails'); 
add_image_size('s475', 475, 475);

//Theme Customizer

//-------------- Customizer add css ---------------
function acool_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'ct_acool[header_bgcolor]', array(//ct_style_options[header_bgcolor]
        'default'        => '#ffffff',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor_html_id', array(
        'label'        => __( 'Header Background Color', 'Acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[header_bgcolor]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[content_link_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#03a325',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_color_id', array(
        'label'        => __( 'Content links color', 'Acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[content_link_color]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[content_link_hover_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#0c8432',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_hover_color_id', array(
        'label'        => __( 'Content links hover color', 'Acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[content_link_hover_color]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[other_link_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#3a3a3a',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'other_link_color_id', array(
        'label'        => __( 'Other links color', 'Acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[other_link_color]',
    ) ) );


    $wp_customize->add_setting( 'ct_acool[other_link_hover_color]', array(//ct_style_options[header_bgcolor]
        'default'        => '#0c8432',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'other_link_hover_color_id', array(
        'label'        => __( 'Other links hover color', 'Acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[other_link_hover_color]',
    ) ) );

	//fonts	
	
	if ( defined( 'CT_GOOGLE_FONTS_USED' ) && CT_GOOGLE_FONTS_USED )
	{	
		$google_fonts = ct_get_google_fonts();
	
		$font_choices = array();
		$font_choices['none'] = 'Default Theme Font';
		foreach ( $google_fonts as $google_font_name => $google_font_properties ) 
		{
			$font_choices[ $google_font_name ] = $google_font_name;
		}	
		
		$wp_customize->add_section( 'ct_google_fonts' , array(
			'title'		=> __( 'Fonts', 'Acool' ),
			'priority'	=> 50,
		) );
	
		$wp_customize->add_setting( 'ct_acool[heading_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[heading_font]', array(
			'label'		=> __( 'Header Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[heading_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
	
	
		$wp_customize->add_setting( 'ct_acool[menu_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[menu_font]', array(
			'label'		=> __( 'Menu Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[menu_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
	
		$wp_customize->add_setting( 'ct_acool[title_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[title_font]', array(
			'label'		=> __( 'Title Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[title_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );	
		$wp_customize->add_setting( 'ct_acool[body_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_callback_re',
			'transport'		=> 'postMessage'
		) );
		$wp_customize->add_control( 'ct_acool[body_font]', array(
			'label'		=> __( 'Body Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[body_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
		
	}	
	

	//Theme Settings section
	$wp_customize->add_section( 'ct_acool_settings' , array(
		'title'		=> __( 'Theme Settings', 'Acool' ),
		'priority'	=> 40,	
         'description' => '<p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('1. Documentation for Very Simple Start can be found <a target="_blank" href="https://www.coothemes.com/doc/acool-manual.php">here</a>', 'Acool') . '</p><p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('2. A full theme demo can be found <a target="_blank" href="https://www.coothemes.com/themes/acool.php">here</a>', 'Acool') . '</p>',  			
	) );
	$wp_customize->add_setting( 'ct_acool[show_search_icon]', array(
		'default'       => '1',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[show_search_icon]', array(
		'label'		=> __( 'Show Search Icon', 'Acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );
		
	$wp_customize->add_setting( 'ct_acool[box_header_center]', array(
		'default'       => 'on',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_callback_re',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[box_header_center]', array(
		'label'		=> __( 'Box Header Center', 'Acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );


/**
 * footer info add
 */
	$wp_customize->add_section('ct_footer_add_info' , array(
		'title' => __('Footer text', 'Acool'),
		'priority' => 120,
	));
		

	$wp_customize->add_setting( 'ct_acool[footer_info]', array(
		'default' => __('Copyright 2015', 'Acool'),
		'sanitize_callback' => 'sanitize_callback_re',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'type' => 'option'
	) );

	$wp_customize->add_control( 'ct_acool[footer_info]', array(
		'section'	=> 'ct_footer_add_info',
		'settings'	=> 'ct_acool[footer_info]',
		'type'		=> 'textarea',
	) );

	
}
add_action( 'customize_register', 'acool_customize_register' );


function sanitize_callback_re( $str ) {
	return $str ;
}


/*
add to head
<link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
*/

if( defined( 'CT_GOOGLE_FONTS_USED' ) && CT_GOOGLE_FONTS_USED )
{
	function acool_google_fonts_scripts(){
		$ct_gf_heading_font_arr =  get_option( 'ct_acool');
		@$ct_gf_heading_font     = sanitize_text_field($ct_gf_heading_font_arr['heading_font'],'');				
		@$ct_gf_body_font        = sanitize_text_field($ct_gf_heading_font_arr['body_font'],'');
		@$ct_gf_title_font       = sanitize_text_field($ct_gf_heading_font_arr['title_font'],'');	
		@$ct_gf_menu_font        = sanitize_text_field($ct_gf_heading_font_arr['menu_font'],'');	
		
					if ( '' != $ct_gf_heading_font ){
						$str_name = str_replace(' ','-',$ct_gf_heading_font);
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_heading_font)) );
					}				
					if ( '' != $ct_gf_title_font ){
						$str_name = str_replace(' ','-',$ct_gf_title_font);						
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_title_font)), false, '', false);				
					}					
					if ( '' != $ct_gf_menu_font ){
						$str_name = str_replace(' ','-',$ct_gf_menu_font);
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_menu_font)) );
					}
					if ( '' != $ct_gf_body_font ){
						$str_name = str_replace(' ','-',$ct_gf_body_font);						
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_body_font)), false, '', false);				
					}
	}
	
	add_action( 'wp_enqueue_scripts', 'acool_google_fonts_scripts' );
}



//real time show
function acool_load_scripts(){
	global $wp_styles;

	$template_dir = get_template_directory_uri();

	$theme_version = '1.1.0';

	wp_enqueue_script( 
		  'acool-customizer',			//Give the script an ID
		  get_template_directory_uri().'/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);


}

//footer.php add <?php wp_footer(); ?->
add_action( 'customize_preview_init', 'acool_load_scripts' );

// --delete
function ct_customizer_color_scheme_class( $body_class ) {
	$color_scheme        = get_option( 'ct_acool' );
	$color_scheme_prefix = 'ct_color_scheme_';

	if ( 'none' !== $color_scheme[color_schemes] ) $body_class[] = $color_scheme_prefix . $color_scheme[color_schemes];

	return $body_class;
}
//add_filter( 'body_class', 'ct_customizer_color_scheme_class' );

//-------------- add css end---------------




function acool_more_link($more_link, $more_link_text) {
return str_replace($more_link_text, __( 'Read More...', 'Acool' ), $more_link);
}
add_filter('the_content_more_link', 'acool_more_link', 10, 2); 





?>