<?php
/**
 * sidebar for the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arrival
 */

$default  = arrival_get_default_theme_options();

$_single_post_sidebars = get_theme_mod('arrival_single_post_sidebars',$default['arrival_single_post_sidebars']);

if ( ! is_active_sidebar( 'sidebar-1' )  || ($_single_post_sidebars == 'no_sidebar') ) {
        return;
}else{
	get_sidebar('right');
}