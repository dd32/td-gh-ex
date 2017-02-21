<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package BB Mobile Application
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php _e('Menu','bb-mobile-application'); ?></a></div>
  <div id="header">
    <div class="container">
      <div class="menubox col-md-9 col-sm-9 col-md-push-3">
        <div class="nav">
		 <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div><?php /** nav  **/ ?>
      </div><?php /** menubox **/ ?>
      <div class="logo col-md-3 col-sm-3 wow  col-md-pull-9 bounceInDown">
	<?php bb_mobile_application_the_custom_logo(); ?>
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>
      </div><?php /** logo **/ ?>
      <div class="clear"></div>
    </div>
  </div><?php /** header **/ ?>