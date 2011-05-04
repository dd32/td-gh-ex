<?php 


$content_width = 400;  

    
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

// remove menu container div
function my_wp_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} 
// function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );


register_sidebar(array('name'=>'Topmenu',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 1',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 2',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 3',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

register_sidebar(array('name'=>'Footer-Sidebar 4',
'before_widget' => '<li>',
'after_widget' => '</li>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
  


add_filter( 'use_default_gallery_style', '__return_false' );
    
    
    
/*
* Fix the extra 10 pixel width issue for image captions
*/
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' ) return $output;
	extract(shortcode_atts(array(
		'id'=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''), $attr));
	if ( 1 > (int) $width || empty($caption) )
	return $content;
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . ((int) $width) . 'px">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">'
	. $caption . '</p></div>';
}
 ?>