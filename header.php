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
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-ecommerce-store'); ?></a></div>
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
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i></a>
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
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
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
          <div class="cart_icon"><i class="fas fa-shopping-bag"></i><a href="<?php the_permalink((get_option('woocommerce_cart_page_id'))); ?>"><?php echo esc_html_e('SHOPPING CART','bb-ecommerce-store'); ?></a></div>
        </div>
      </div>
    </div>
    <div class="nav">
      <div class="container">
        <div class="row">
          <div class=" col-lg-3 col-md-3">
          </div>
          <div class=" col-lg-9 col-md-9">
            <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  </div>