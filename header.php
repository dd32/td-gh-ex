<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package bb wedding bliss
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'bb-wedding-bliss' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'bb-wedding-bliss' ); ?>"><?php esc_html_e( 'Skip to content', 'bb-wedding-bliss' ); ?></a>
    <div id="header">
      <button class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-wedding-bliss'); ?></a></button>
      <div class="container">
        <div class="main-menu">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-4">
                <div class="logo">
                  <?php if( has_custom_logo() ){ bb_wedding_bliss_the_custom_logo();
                   }else{ ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php $description = get_bloginfo( 'description', 'display' );
                      if ( $description || is_customize_preview() ) : ?> 
                      <p class="site-description"><?php echo esc_html($description); ?></p>       
                    <?php endif; }?>
                </div>
              </div>
              <div class="col-lg-8 col-md-7">
                <nav class="nav">
                  <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
                </nav>
              </div>
              <div class="col-lg-1 col-md-1">
                <div class="search-box">
                  <i class="fas fa-search"></i>
                </div>
              </div>
            </div>
            <div class="serach_outer">
              <div class="closepop"><i class="far fa-window-close"></i></div>
              <div class="serach_inner">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="clearfix"></div>