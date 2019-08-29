<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-portfolio
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-portfolio' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'advance-portfolio' ); ?>"><?php esc_html_e( 'Skip to content', 'advance-portfolio' ); ?></a>
    <button class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','advance-portfolio'); ?></a></button>
    <div id="header">
      <div class="container">
        <div class="row">
          <div class="logo col-lg-4 col-md-4">
            <?php if( has_custom_logo() ){ advance_portfolio_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>       
            <?php endif; }?>
          </div>
          <div class="col-lg-8 col-md-8">
            <nav class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </nav>
          </div>
        </div>
        <hr class="horizontal">
      </div>
      <div class="clearfix"></div>
    </div>
  </header>