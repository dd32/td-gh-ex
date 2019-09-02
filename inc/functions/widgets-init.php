<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_widgets_init() {

register_sidebar(array(
    'id' => 'bestwp-header-banner',
    'name' => esc_html__( 'Header Banner', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="bestwp-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'bestwp-sidebar-one',
    'name' => esc_html__( 'Sidebar 1', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is normally located on the left-hand side of web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-side-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-sidebar-two',
    'name' => esc_html__( 'Sidebar 2', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is normally located on the right-hand side of web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-side-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'bestwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-main-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'bestwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-main-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'bestwp' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-main-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'bestwp' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-main-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'bestwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-main-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'bestwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-main-widget widget bestwp-box %2$s"><div class="bestwp-side-widget-inside bestwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-footer-1',
    'name' => esc_html__( 'Footer 1', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-footer-2',
    'name' => esc_html__( 'Footer 2', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-footer-3',
    'name' => esc_html__( 'Footer 3', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'bestwp-footer-4',
    'name' => esc_html__( 'Footer 4', 'bestwp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'bestwp' ),
    'before_widget' => '<div id="%1$s" class="bestwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="bestwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'bestwp_widgets_init' );


function bestwp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'bestwp-home-fullwidth-widgets' ) || is_active_sidebar( 'bestwp-fullwidth-widgets' ) ) : ?>
<div class="bestwp-top-wrapper-outer clearfix">
<div class="bestwp-featured-posts-area bestwp-top-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'bestwp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'bestwp-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function bestwp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'bestwp-home-top-widgets' ) || is_active_sidebar( 'bestwp-top-widgets' ) ) : ?>
<div class="bestwp-featured-posts-area bestwp-featured-posts-area-top clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'bestwp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'bestwp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function bestwp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'bestwp-home-bottom-widgets' ) || is_active_sidebar( 'bestwp-bottom-widgets' ) ) : ?>
<div class='bestwp-featured-posts-area bestwp-featured-posts-area-bottom clearfix'>
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'bestwp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'bestwp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }