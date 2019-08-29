<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ecommerce Store
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'bb-ecommerce-store' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
  <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'bb-ecommerce-store' ); ?>"><?php esc_html_e( 'Skip to content', 'bb-ecommerce-store' ); ?></a>
  <button class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-ecommerce-store'); ?></a></button>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="top-contact col-lg-3 col-md-3">
          <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
          <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact',__('(518) 356-5373','bb-ecommerce-store') )); ?></span>
          <?php } ?>
        </div>
        <div class="top-contact col-lg-3 col-md-3">
          <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
          <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email',__('support@123.com','bb-ecommerce-store')) ); ?></span>
          <?php } ?>
        </div>
        <div class="social-media col-lg-6 col-md-6">
          <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>" alt="<?php esc_attr_e( 'Youtube','bb-ecommerce-store' );?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','bb-ecommerce-store' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>" alt="<?php esc_attr_e( 'Facebook','bb-ecommerce-store' );?>"><i class="fab fa-facebook" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','bb-ecommerce-store' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>" alt="<?php esc_attr_e( 'Twitter','bb-ecommerce-store' );?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','bb-ecommerce-store' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>" alt="<?php esc_attr_e( 'Instagram','bb-ecommerce-store' );?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','bb-ecommerce-store' );?></span></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>" alt="<?php esc_attr_e( 'RSS','bb-ecommerce-store' );?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'RSS','bb-ecommerce-store' );?></span></a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="logo  col-lg-3 col-md-3">
          <?php bb_ecommerce_store_the_custom_logo(); ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php
          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html( $description ); ?></p>
          <?php endif; ?>
        </div>      
        <div class="side_search  col-lg-6 col-md-6">
          <?php if(class_exists('woocommerce')){ ?>
            <?php get_product_search_form()?>
          <?php } ?>
        </div>
        <div class="cart-btn-box col-lg-3 col-md-3">
          <div class="cart_icon"><i class="fas fa-shopping-bag"></i><a href="<?php the_permalink((get_option('woocommerce_cart_page_id'))); ?>" alt="<?php esc_attr_e( 'SHOPPING CART','bb-ecommerce-store' );?>"><?php echo esc_html_e('SHOPPING CART','bb-ecommerce-store'); ?><span class="screen-reader-text"><?php esc_attr_e( 'SHOPPING CART','bb-ecommerce-store' );?></span></a></div>
        </div>
      </div>
    </div>
    <nav class="nav">
      <div class="container">
        <div class="row">
          <div class=" col-lg-3 col-md-3">
          </div>
          <div class=" col-lg-9 col-md-9">
            <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
      </div>
    </nav>
    <div class="clear"></div>
  </div>
  </div>
</header>