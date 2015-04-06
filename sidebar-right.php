<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Accesspress Basic
 */
 
global $apbasic_options;
$apbasic_settings = get_option('apbasic_options',$apbasic_options);
/*
if(is_page()){
    $default_page_layout = $apbasic_settings['default_page_layout'];
    $single_page_layout = get_post_meta( $post->ID, 'apbasic_page_layout', true);
    $def_layout = ($single_page_layout == 'default_layout') ? $default_page_layout : $single_page_layout;
}elseif(is_single()){
    $default_post_layout = $apbasic_settings['default_post_layout'];
    $single_post_layout = get_post_meta($post->ID,'apbasic_page_layout', true);
    $def_layout = ($single_post_layout == 'default_layout') ? $default_post_layout : $single_post_layout;
}elseif(is_category()){
    $def_layout = $apbasic_settings['default_layout'];
}

switch($def_layout){
    case 'right_sidebar' :
        $sidebar_class = 'right-sidebar';
        break;
    case 'both_sidebar' :
        $sidebar_class = 'right-sidebar both-sidebar';
        break;
}
*/
?>
<div id="secondary" class="secondary-right">
	<?php dynamic_sidebar( 'apbasic_right_sidebar' ); ?>
</div><!-- #secondary -->
