<?php

// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation'),
                'secondary' => __( 'Secondary Navigation'),
                'tertiary' => __( 'Tertiary Navigation'),
	) );


if ( function_exists('register_sidebar') )
    register_sidebar();    

define('HEADER_IMAGE', '%s/images/headers/header.jpg');
define('HEADER_IMAGE_WIDTH', 860);
define('HEADER_IMAGE_HEIGHT', 162);
define('HEADER_TEXTCOLOR', '444444');

function header_style() {
?>
<style type="text/css">
header{
background: url(<?php header_image(); ?>)  no-repeat;
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
header h1 a{color:#<?php header_textcolor();?>;}
</style>
<?php
}
function admin_header_style() {
?>
<style type="text/css">
#headimg{
background:#ffffff url(<?php header_image() ?>) bottom center no-repeat;
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
text-align:center;
text-transform:uppercase;
}
#headimg h1{font-size:2.5em; padding:25px 0 0 0; margin:0 0 15px 0;}
#headimg h1 a{border-bottom:1px solid #dddddd; color:#444444; text-decoration:none;}
#headimg p{color:#777777; font-size:1.2em;}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
add_custom_image_header('header_style', 'admin_header_style');
add_custom_background();

} 
 
if(function_exists('add_theme_support')) {  
add_theme_support('automatic-feed-links');  
add_theme_support('editor_style'); 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'hp-post-thumbnail', 200, 200, true ); // Homepage thumbnail size
add_image_size( 'single-post-thumbnail', 300, 9999 ); // Permalink t
add_theme_support( 'menus' );
add_theme_support('nav-menus');
} 

$content_width = 500;
?>
<?php
function my_own_gravatar( $avatar_defaults ) {
    $myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';
    $avatar_defaults[$myavatar] = 'RPD_GRAVATAR';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'my_own_gravatar' );

?>