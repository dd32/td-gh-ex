<?php

global $avis_themename;
global $avis_shortname;

/************************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/

//ENQUEUE STYLE FOR IE BROWSER
function avis_IE_enqueue_scripts() {
	global $is_IE;
	if($is_IE ) {
		if ( !is_admin() ) {
			wp_register_style( 'ie-style', get_template_directory_uri().'/css/ie-style.css', false, $theme->Version );
			wp_enqueue_style( 'ie-style' );
			wp_register_style( 'awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version );
			wp_enqueue_style( 'awesome-theme-stylesheet' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'avis_IE_enqueue_scripts' );

//ENQUEUE FRONT SCRIPTS
function avis_theme_stylesheet()
{
	global $avis_themename;
	global $avis_shortname;
	if ( !is_admin() ) 
	{
		$theme = wp_get_theme();
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script('avis_componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'),'1.0',1 );
		wp_enqueue_script("comment-reply");

		wp_enqueue_script('avis_superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true,'1.0');
		wp_enqueue_script('avis_AnimatedHeader', get_template_directory_uri().'/js/cbpAnimatedHeader.js',array('jquery'),true,'1.0');
		wp_enqueue_script('avis_waypoint', get_template_directory_uri().'/js/waypoints.js',array('jquery'),true,'1.0');
		
		wp_enqueue_style( 'avis-style', get_stylesheet_uri() );
		wp_enqueue_style('avis-animation-stylesheet', get_template_directory_uri().'/css/avis-animation.css', false, $theme->Version);
		wp_enqueue_style( 'avis-awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version);
		
		/*SUPERFISH*/
		wp_enqueue_style( 'avis-ddsmoothmenu-superfish-stylesheet', get_template_directory_uri().'/css/superfish.css', false, $theme->Version);
		wp_enqueue_style( 'avis-bootstrap-responsive-theme-stylesheet', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version);
		
		/*GOOGLE FONTS*/
		wp_enqueue_style( 'googleFontsraleway','//fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900', false, $theme->Version);

	}
}
add_action('wp_enqueue_scripts', 'avis_theme_stylesheet');

function avis_head() {
	global $avis_shortname;
	$avis_favicon = "";
	$avis_meta = '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">'."\n";

	if(avis_get_option($avis_shortname.'_favicon')) {
		$avis_favicon = avis_get_option($avis_shortname.'_favicon','bizstudio');
		$avis_meta .= "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$avis_favicon\"/>\n";
	}
	echo $avis_meta;

	if(!is_admin()) {
		require_once(get_template_directory().'/includes/avis-custom-css.php');
	}
}
add_action('wp_head', 'avis_head');

//ENQUEUE FOOTER SCRIPT 
function avis_footer_script() {
	global $avis_shortname;
	
}
add_action('wp_footer', 'avis_footer_script');