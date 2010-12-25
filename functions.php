<?php 
if ( ! isset( $content_width ) )
	$content_width = 850;

add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_editor_style('custom-editor-style.css');
	
load_theme_textdomain( 'nwc' );


// remove menu container div
function my_wp_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
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
  
function nwc_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">  
      
    <?php comment_text(); ?>
	
	<?php echo get_avatar( $comment, 40 ); ?>
	
    <?php comment_type(_x('Comment', 'noun'), __('Trackback'), __('Pingback')); ?> 
    <?php _e('by', 'nwc'); ?> 
    <?php comment_author_link() ?> &#8212; 
    <?php comment_date() ?> 
    <?php _e('@', 'nwc'); ?> 
    <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> <?php edit_comment_link(__("Edit This"), ' | '); ?>
                                                                                                          
	<?php if ( $comment->comment_approved == '0' ) : ?>
	<p><em><?php _e( 'Your comment is awaiting moderation.'); ?></em></p>
	<?php endif; ?>

	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>


	<?php
	break;
	case 'pingback'  :
	case 'trackback' :
	?>
	
	<li class="post pingback">
	<?php comment_type(_x('Comment', 'noun'), __('Trackback'), __('Pingback')); ?>
    <?php _e('by', 'nwc'); ?>
    <?php comment_author_link() ?> &#8212;
    <?php comment_date() ?>
    <?php _e('@', 'nwc'); ?>
    <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> <?php edit_comment_link(__("Edit This"), ' | '); ?></a>
	<?php
	break;
	endswitch;
    }

add_filter('gallery_style',
	create_function(
		'$css',
		'return preg_replace("#<style type=\'text/css\'>(.*?)</style>#s", "", $css);'
		)
	);
    
    
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