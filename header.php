<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-business
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-business' ) ); ?>">
  <?php wp_head(); ?>
</head>
 <body <?php body_class(); ?>> 

<header role="banner">  
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-business' ); ?></a>
  <div id="header">
    <div class="container">
      <div class="main-header">
        <div class="row">
          <div class="logo col-lg-3 col-md-5 col-9">
            <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php else: ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
              <?php endif; ?>
            <?php endif; ?>
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
              ?>
            <p class="site-description">
              <?php echo esc_html($description); ?>
            </p>
          <?php endif; ?>
          <?php endif; ?>
          </div>
          <div class="col-lg-8 col-md-7 col-3">
            <div class="toggle-menu responsive-menu">
              <button onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-business'); ?></span></button>
            </div>
            <div id="menu-sidebar" class="nav sidebar">
              <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-business' ); ?>">
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-business'); ?></span></a>
                <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu-navigation clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                ?>
                <div id="contact-info">
                  <?php get_search_form(); ?>
                </div>
              </nav>
            </div>
          </div>
          <div class="col-lg-1 search-box">
            <a href="#" onclick="search_open()">
              <i class="fas fa-search"></i><span class="screen-reader-text"><?php esc_html_e( 'Search','advance-business' );?></span>
            </a>
          </div>
        </div>
        <div class="serach_outer">
          <a href="#" onclick="search_close()" class="closepop">X<span class="screen-reader-text"><?php esc_html_e( 'serach-outer','advance-business' );?></span></a>
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div> 
  </div>
</header>