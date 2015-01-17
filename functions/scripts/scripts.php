<?php
function elegance_scripts()
{	
	$current_options = get_option('elegance_lite_options');
	$webriti_stylesheet = $current_options['webriti_stylesheet'];
	wp_enqueue_style('elegance-bootstrap', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	wp_enqueue_style('elegance-default', WEBRITI_TEMPLATE_DIR_URI . '/css/'.$webriti_stylesheet);
	wp_enqueue_style('elegance-theme-menu', WEBRITI_TEMPLATE_DIR_URI . '/css/theme-menu.css');
	wp_enqueue_style('elegance-media-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	wp_enqueue_style('elegance-font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css');	
	wp_enqueue_style('elegance-font-awesome-min', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
	//wp_enqueue_style('elegance-tool-tip', WEBRITI_TEMPLATE_DIR_URI . '/css/css-tooltips.css');

	wp_enqueue_script('elegance-menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
	wp_enqueue_script('bootstrap', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');	
}
add_action('wp_enqueue_scripts', 'elegance_scripts');

if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
?>