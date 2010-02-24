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
	#headimg {
	position: relative;
	padding: 45px 0px 0px 7px;
	height: 100px;
}

a{
	color: #34a0cc;
	text-decoration: none;
	}
#desc{
	padding-left:15px;
	padding-bottom:5px;
	border-left:1px solid #dcdcdc;
	width:140px;
	position: absolute;
	left: 160px;
	top:60px;
	font-size: 1em;
	height:30px;
}
    </style><?php
}

add_custom_image_header('header_style', 'admin_header_style');

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}
?>