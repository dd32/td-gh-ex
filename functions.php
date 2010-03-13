<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$content_width = 450;

define('HEADER_TEXTCOLOR', '34a0cc');
define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 760); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 163);

function register_scripts() {
wp_register_script('livesearch',
	get_bloginfo('template_directory') . '/js/livesearch.js',
	array('jquery'), K2_CURRENT, true);
			
wp_register_script('functions',
	get_bloginfo('template_directory') . '/js/functions.js',
	array('jquery'), K2_CURRENT);
			
wp_enqueue_script('livesearch');
wp_enqueue_script('functions');
wp_enqueue_script('jquery');
}
add_action('init', 'register_scripts');

//remove recent comments style
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

// gets included in the site header
function header_style() {
    ?><style type="text/css">
        #content-head {
            background:url(<?php header_image(); ?>) no-repeat 90% 90%;
			position: relative;
			padding:0px;
			height:170px;
        }
    </style><?php
}

// gets included in the admin header
function admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
			}
		#headimg{
	        position: relative;
	        padding: 35px 0px 0px 7px;
	        height: 100px;
        }
        #headimg h1 {
			float:left;
			margin-right:10px;
			margin-top:23px;
		}
		#headimg a{
			color: #41add9;
			text-decoration: none;
		}
		#desc{
			width:165px;
			border-left:1px solid #dcdcdc;
			float:left;
			font-size: 1em;
			height:30px;
			margin-top:18px;
			padding-left:10px;
			padding-bottom:3px;
		}
    </style><?php
}

add_custom_image_header('header_style', 'admin_header_style');

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
?>
