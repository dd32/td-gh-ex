<?php
/**
 * Handles all page layout
 * adding or removing laout to certain page
 * will be controlled from this file
 *
 * @package Imon Themes
 * @subpackage Best blog
 * @since best blog 1.0.0
 */



/*----------- sidebar layout Blog Page-----------*/
if (! function_exists('bestblog_sidebar_layout')) :
function bestblog_sidebar_layout()
{
    $sidbar_position = get_theme_mod('sidbar_position_gen', 'right');
    $blogpost_style = get_theme_mod('layout_page_gen', 'content1');
    if (!is_active_sidebar('right-sidebar') || 'full' == $sidbar_position) {
      if ( 'content1' == $blogpost_style) :
        $siderbar='large-20';
      else :
        $siderbar='large-24';
      endif;
    } elseif (is_active_sidebar('right-sidebar') || ('right' == $sidbar_position)) {
        $siderbar='large-17';
    } elseif (is_active_sidebar('right-sidebar') || ('left' == $sidbar_position)) {
        $siderbar='large-17 ';
    }
    $siderbars = $siderbar;
    return $siderbars;
}
endif;
