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

// layout for  with sidebar or without
if (! function_exists('bestblog_sidebar_layout')) :
function bestblog_sidebar_layout( ) {
if ( is_single() || is_page() ) {
  if ( !is_active_sidebar( 'right-sidebar' ) ) :
    $layout = 'large-11';
  else :
    $layout = 'large-8';
  endif;
}else {
  if ( !is_active_sidebar( 'right-sidebar' ) ) :
    $layout = 'large-12 medium-11';
  else :
    $layout = 'large-8 with-sidebar';
  endif;
}

return $layout;
}
endif;
