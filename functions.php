<?php
function best_classifieds_setup() {
	load_theme_textdomain( 'best-classifieds',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'best-classifieds-blog-image', $width = 750, $height = 500, true );
	
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'best-classifieds' ),
	) );
	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',));
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-header');
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'best_classifieds_setup' );
function best_classifieds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_classifieds_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_classifieds_content_width', 0 );

add_filter('get_custom_logo','best_classifieds_change_logo_class');
function best_classifieds_change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $html);
	$html = str_replace('width=', 'original-width=', $html);
	$html = str_replace('height=', 'original-height=', $html);
	$html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $html);
	return $html;
}

include get_template_directory().'/inc/breadcumbs.php';
include get_template_directory().'/inc/fonts.php';
include get_template_directory().'/inc/fontawasome.php';
include get_template_directory().'/inc/template-setup.php';
include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/theme-customization.php';