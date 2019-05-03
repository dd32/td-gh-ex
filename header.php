<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package bb wedding bliss
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'bb-wedding-bliss' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
  <div id="header">
    <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-wedding-bliss'); ?></a></div>
    <div class="container">
        <div class="nav">
		      <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div>
    </div>
  </div>
  <div class="clearfix"></div>