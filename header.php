 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ecommerce Store
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-ecommerce-store'); ?></a></div>

<div class="header">
<div class="container">
    <div class="aligner">
      <div class="logo">
        <?php bb_ecommerce_store_the_custom_logo(); ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>
      </div>     
	  <div class="clearfix"></div>
</div>
</div>
      <div class="nav">
		<div class="container">
          <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
		</div>
      </div><!-- nav --><div class="clear"></div>
    </div><!-- aligner -->

  </div><!-- header -->