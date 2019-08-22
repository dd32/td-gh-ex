<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-pet-care
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-pet-care' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'advance-pet-care' ); ?>"><?php esc_html_e( 'Skip to content', 'advance-pet-care' ); ?></a>
  <div id="header">
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="mail">
              <?php if( get_theme_mod('advance_pet_care_mail1') != ''){ ?>
                <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('advance_pet_care_mail1','')); ?></span>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="phone">
              <?php if( get_theme_mod('advance_pet_care_phone1') != ''){ ?>
                <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('advance_pet_care_phone1','' )); ?></span>
              <?php } ?>
            </div>       
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="social-icons">
              <?php if( get_theme_mod( 'advance_pet_care_facebook_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_facebook_url','' ) ); ?>" alt="<?php esc_attr_e( 'Facebook','advance-pet-care' );?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','advance-pet-care' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_pet_care_twitter_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_twitter_url','' ) ); ?>" alt="<?php esc_attr_e( 'Twitter','advance-pet-care' );?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','advance-pet-care' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_pet_care_youtube_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_youtube_url','' ) ); ?>" alt="<?php esc_attr_e( 'Youtube','advance-pet-care' );?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','advance-pet-care' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_pet_care_google_plus_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_google_plus_url','' ) ); ?>" alt="<?php esc_attr_e( 'Google','advance-pet-care' );?>"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','advance-pet-care' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_pet_care_insta_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_insta_url','' ) ); ?>" alt="<?php esc_attr_e( 'Instagram','advance-pet-care' );?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','advance-pet-care' );?></span></a>
              <?php } ?>                
            </div>  
          </div>
        </div>
      </div>
    </div>
    <div class="pet-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="time">
              <div class="row">
                <?php if( get_theme_mod( 'advance_pet_care_time') != '' || get_theme_mod( 'advance_pet_care_time1' )!= '') { ?>
                  <div class="col-lg-1 col-md-2 p-0">
                    <i class="far fa-calendar-alt"></i>
                  </div>
                  <div class="col-lg-11 col-md-10">
                    <?php if( get_theme_mod('advance_pet_care_time') != ''){ ?>
                      <p class="color"><?php echo esc_html( get_theme_mod('advance_pet_care_time','')); ?></p>
                    <?php } ?>
                    <?php if( get_theme_mod('advance_pet_care_time1') != ''){ ?>
                      <p><?php echo esc_html( get_theme_mod('advance_pet_care_time1','')); ?></p>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="logo">
              <?php if( has_custom_logo() ){ advance_pet_care_the_custom_logo();
              }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>       
              <?php endif; }?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="address">
              <div class="row">
                <?php if( get_theme_mod( 'advance_pet_care_address') != '' || get_theme_mod( 'advance_pet_care_address1' )!= '') { ?>
                  <div class="col-lg-11 col-md-10">
                    <?php if( get_theme_mod('advance_pet_care_address') != ''){ ?>
                      <p class="color"><?php echo esc_html( get_theme_mod('advance_pet_care_address','')); ?></p>
                    <?php } ?>
                    <?php if( get_theme_mod('advance_pet_care_address1') != ''){ ?>
                      <p><?php echo esc_html( get_theme_mod('advance_pet_care_address1','')); ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-lg-1 col-md-2 p-0">
                    <i class="fas fa-location-arrow"></i>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="toggle"><a class="toggleMenu" href="#" ><?php esc_html_e('Menu','advance-pet-care'); ?></a></button>
    <div class="main-menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10">
            <nav class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </nav>
          </div>
          <div class="col-lg-1 col-md-1">
            <div class="search-box">
              <i class="fas fa-search"></i>
            </div>
          </div>
          <div class="col-lg-1 col-md-1">
            <div class="cart_icon">
              <a href="<?php the_permalink((get_option('woocommerce_cart_page_id'))); ?>" alt="<?php esc_html_e( 'Shopping Bag','advance-pet-care' );?>"><i class="fas fa-shopping-bag"></i><span class="screen-reader-text"><?php esc_html_e( 'Shopping Bag','advance-pet-care' );?></span></a>
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
</header>