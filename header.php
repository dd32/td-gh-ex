<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package BB Mobile Application
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'bb-mobile-application' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'bb-mobile-application' ); ?>"><?php esc_html_e( 'Skip to content', 'bb-mobile-application' ); ?></a>
    <div id="header">
      <div class="container">
        <button class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-mobile-application'); ?></a></button>
        <div class="row">
          <div class="logo col-lg-4 col-md-4">
            <?php bb_mobile_application_the_custom_logo(); ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
          </div>
          <div class="menubox col-lg-8 col-md-8">
            <nav class="nav">
    		      <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </nav>
          </div>        
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </header>