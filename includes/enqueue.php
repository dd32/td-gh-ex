<?php
/**
* Enqueue scripts and styles.  
*/
function abaya_scripts() {
	wp_enqueue_script('bootstrap_min_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'',true); 
	wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr.js', array(),true ); 
	wp_enqueue_script('jquery_animateSlider_js', get_template_directory_uri() . '/js/jquery.animateSlider.js', array('jquery'),'',true); 
	wp_enqueue_script('flexslider_min_js', get_template_directory_uri() . '/js/flexslider.min.js', array('jquery'),'',true);
	wp_enqueue_script('comment-reply');
	wp_enqueue_style('bootstrap_min', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('responsive_css', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_style('jquery_animateSlider_css', get_template_directory_uri().'/css/jquery.animateSlider.css');
	wp_enqueue_style('font_awesome_min_css', get_template_directory_uri().'/css/font-awesome.min.css', array(), '4.1.0', 'all' );
	wp_enqueue_style('flexslider_css', get_template_directory_uri().'/css/flexslider.css');
	wp_enqueue_style('animate_min_css', get_template_directory_uri().'/css/animate.min.css');
	// Load the HTML5 Shiv.
	wp_enqueue_script('comley-html5', get_template_directory_uri().'/js/html5shiv.min.js', array(), '3.7.2' );
	wp_script_add_data('comley-html5', 'conditional', 'lt IE 9' );
	//Respond.js for IE8 support of HTML5 elements and media queries
	wp_enqueue_script('comley-ie8supportofhtml5', get_template_directory_uri().'/js/respond.min.js', array(), '1.4.2' );
	wp_script_add_data('comley-ie8supportofhtml5', 'conditional', 'lt IE 8');
	wp_enqueue_style('wpb-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false);
	wp_enqueue_style('wpb-google-roboto-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,500italic,700,700italic,900,900italic', false);
    wp_register_script('custum_js', get_template_directory_uri().'/js/custom.js', array(),'',true);
    wp_enqueue_script('custum_js');
	
}
add_action('wp_enqueue_scripts', 'abaya_scripts');
?>