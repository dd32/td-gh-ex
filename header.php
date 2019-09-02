<?php
/**
* The header for BestWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('bestwp-animated bestwp-fadein'); ?> id="bestwp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#bestwp-posts-wrapper"><?php esc_html_e( 'Skip to content', 'bestwp' ); ?></a>

<?php if ( !(bestwp_get_option('disable_primary_menu')) ) { ?>
<div class="bestwp-container bestwp-primary-menu-container clearfix">
<div class="bestwp-primary-menu-container-inside clearfix">
<nav class="bestwp-nav-primary" id="bestwp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'bestwp' ); ?>">
<div class="bestwp-outer-wrapper">
<button class="bestwp-primary-responsive-menu-icon" aria-controls="bestwp-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'bestwp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'bestwp-menu-primary-navigation', 'menu_class' => 'bestwp-primary-nav-menu bestwp-menu-primary', 'fallback_cb' => 'bestwp_fallback_menu', 'container' => '', ) ); ?>
<?php if ( !(bestwp_get_option('hide_header_social_buttons')) ) { bestwp_header_social_buttons(); } ?>
</div>
</nav>
</div>
</div>
<?php } ?>

<div id="bestwp-search-overlay-wrap" class="bestwp-search-overlay">
  <button class="bestwp-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'bestwp' ); ?>" title="<?php esc_attr_e('Close Search','bestwp'); ?>">&#xD7;</button>
  <div class="bestwp-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>

<div class="bestwp-container" id="bestwp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="bestwp-head-content clearfix" id="bestwp-head-content">

<?php if ( get_header_image() ) : ?>
<div class="bestwp-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="bestwp-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="bestwp-header-img"/>
</a>
</div>
<?php endif; ?>

<?php if ( !(bestwp_get_option('hide_header_content')) ) { ?>
<div class="bestwp-outer-wrapper">
<div class="bestwp-header-inside clearfix">

<div id="bestwp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="bestwp-logo-img-link">
        <img src="<?php echo esc_url( bestwp_custom_logo() ); ?>" alt="" class="bestwp-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="bestwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="bestwp-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#bestwp-logo -->

<div id="bestwp-header-banner">
<?php dynamic_sidebar( 'bestwp-header-banner' ); ?>
</div><!--/#bestwp-header-banner -->

</div>
</div>
<?php } ?>

</div><!--/#bestwp-head-content -->
</div><!--/#bestwp-header -->

<?php if ( !(bestwp_get_option('disable_secondary_menu')) ) { ?>
<div class="bestwp-container bestwp-secondary-menu-container clearfix">
<div class="bestwp-secondary-menu-container-inside clearfix">
<nav class="bestwp-nav-secondary" id="bestwp-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'bestwp' ); ?>">
<div class="bestwp-outer-wrapper">
<button class="bestwp-secondary-responsive-menu-icon" aria-controls="bestwp-menu-secondary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'bestwp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'bestwp-menu-secondary-navigation', 'menu_class' => 'bestwp-secondary-nav-menu bestwp-menu-secondary', 'fallback_cb' => 'bestwp_top_fallback_menu', 'container' => '', ) ); ?>
</div>
</nav>
</div>
</div>
<?php } ?>

<?php if(is_front_page() && !is_paged()) { ?>
<?php if ( bestwp_get_option('enable_slider') ) { ?><div class="bestwp-outer-wrapper"><?php bestwp_slider(); ?></div><?php } ?>
<?php } ?>

<div class="bestwp-outer-wrapper">
<?php bestwp_top_wide_widgets(); ?>
</div>

<div class="bestwp-outer-wrapper">

<div class="bestwp-container clearfix" id="bestwp-wrapper">
<div class="bestwp-content-wrapper clearfix" id="bestwp-content-wrapper">