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

//Theme Customizer
require_once( $template_directory . '/includes/customizer.php' );

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

function acool_more_link($more_link, $more_link_text)
{
	return str_replace($more_link_text, __( 'Read More...', 'acool' ), $more_link);
}
add_filter('the_content_more_link', 'acool_more_link', 10, 2); 
