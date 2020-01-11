<?php 
/**
 * The template for functions 
 *
 * @version    0.0.05
 * @package    axis-magazine
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.tumblr.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */


if ( ! defined( 'ABSPATH' ) ) { exit; }

require get_template_directory() . "/inc/axis-magazine-layout-customizer.php";
require get_template_directory() . "/inc/axis-magazine-options.php";
require get_template_directory() . "/inc/axis-magazine-adm-style-options.php";
require get_template_directory() . "/inc/axis-magazine-customizer-pro-btn.php";


function axis_magazine_setup(){


	// ADD THEME SUPPORT
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support('woocommerce');

	

	register_nav_menus(
	    array(
	      'primary-menu' => esc_attr__( 'Primary Menu', 'axis-magazine' ),
	    )
	  );


	// SET CONTENT WIDTH
	if ( ! isset( $content_width ) ) $content_width = 600;

}

add_action('after_setup_theme', 'axis_magazine_setup');

// Load styles
function axis_magazine_load_styles_scripts(){
	// NOTE:   SOME OF THESE SCRIPTS ARE HOSTED ON A CDN AND ARE NOT STORED LOCALLY... SO THIS THEME MAY NOT RENDER PROPERLY IF YOU ARE NOT CONNECTED TO THE INTERNET
	
		wp_enqueue_style( 'axis-magazine-style', get_template_directory_uri() . '/style.css');

		wp_enqueue_style( 'axis-magazine-google-noto-font', 'https://fonts.googleapis.com/css?family=Noto+Sans');

		wp_enqueue_script('axis-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js' );
		
		if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
	
}

add_action('wp_enqueue_scripts', 'axis_magazine_load_styles_scripts');

function axis_magazine_pingback_wrap(){

		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}

}
add_action( 'wp_head', 'axis_magazine_pingback_wrap');



// Creating the sidebar
function axis_magazine_menu_init() {


register_sidebar(
		array(
                'name' 			=> esc_html__('Sidebar Widgets', 'axis-magazine'),
                'id'    		=> 'sidebar_id',
                'class'       	=> '',
				'description' 	=> esc_html__('Add sidebar widgets here', 'axis-magazine'),
				'before_widget' => '<div class="sidebar-items">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));

	register_sidebar(array(
                'name' 			=> esc_html__('Main Footer', 'axis-magazine'),
                'id'    		=> 'main_footer',
                'class' 		=> '',
				'description' 	=> esc_html__('Add widgets here', 'axis-magazine'),
				'before_widget' => '<li>',
				'after_widget' 	=> '</li>',
				'before_title' 	=> '<h2>',
				'after_title' 	=> '</h2>',
	));
	

}
add_action('widgets_init', 'axis_magazine_menu_init');

// this increases or decreaes the length of the excerpt on the index page
function axis_magazine_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 20;
}
add_filter( 'excerpt_length', 'axis_magazine_excerpt_length', 999 );

function axis_magazine_excerpt_more( $more ) {
    //return 'More';
    return ' <a class="read-more" href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . esc_html('Read More', 'axis-magazine') . '</a>';
}
add_filter( 'excerpt_more', 'axis_magazine_excerpt_more' );


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function axis_magazine_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'axis_magazine_skip_link_focus_fix' );


