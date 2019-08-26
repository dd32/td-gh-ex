<?php
/**
 * The Header for our theme.
 * @package Automobile Car Dealer
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'automobile-car-dealer' ) ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'automobile-car-dealer' ); ?>"><?php esc_html_e( 'Skip to content', 'automobile-car-dealer' ); ?></a>
  <div id="header">
    <div class="container inner-box">
      <div class="row m-0">
        <div class="col-lg-3 col-md-3 logo_bar">
          <div class="logo">
            <?php if( has_custom_logo() ){ automobile_car_dealer_the_custom_logo();
               }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; }?>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 padding0">
          <div class="topbar row m-0">
            <div class="col-lg-7 col-md-7">
              <?php if( get_theme_mod( 'automobile_car_dealer_mail','' ) != '') { ?>
              <span><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_mail','' )); ?></span>
              <?php }?>
              <?php if( get_theme_mod( 'automobile_car_dealer_phone','' ) != '') { ?>
              <span><i class="fa fa-phone"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_phone','') ); ?></span>
              <?php }?>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="socialbox">
                <?php if( get_theme_mod( 'automobile_car_dealer_cont_facebook') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_facebook','' ) ); ?>" alt="<?php esc_attr_e( 'Facebook','automobile-car-dealer' );?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_cont_twitter') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_twitter','' ) ); ?>" alt="<?php esc_attr_e( 'Twitter','automobile-car-dealer' );?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_google_plus') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_google_plus','' ) ); ?>" alt="<?php esc_attr_e( 'Google','automobile-car-dealer' );?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_pinterest') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_pinterest','' ) ); ?>" alt="<?php esc_attr_e( 'Pinterest','automobile-car-dealer' );?>"><i class="fab fa-pinterest" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_tumblr') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_tumblr','' ) ); ?>" alt="<?php esc_attr_e( 'Tumblr','automobile-car-dealer' );?>"><i class="fab fa-tumblr" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr','automobile-car-dealer' );?></span></a>
                <?php } ?>
              </div>
            </div>
            <div class="search-box col-lg-1 col-md-1">
              <i class="fas fa-search"></i>
            </div>
            <div class="serach_outer">
              <div class="closepop"><i class="far fa-window-close"></i></div>
              <div class="serach_inner">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
          <button class="toggleMenu toggle"><?php esc_html_e('Menu','automobile-car-dealer'); ?></button>
          <div class="row m-0">
            <div class="col-lg-9 col-md-9 padding0">
              <nav class="menus">
                <div class="menubox header">
                  <div class="nav">
                    <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </nav>
            </div>
            <?php if( get_theme_mod( 'automobile_car_dealer_button_link','' ) != '') { ?>
              <div class="col-lg-3 col-md-3 appointbtn">
                 <a href="<?php echo esc_url( get_theme_mod('automobile_car_dealer_button_link','#' ) ); ?>" alt="<?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' );?>"><i class="fas fa-calendar-alt"></i><?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' ); ?><span class="screen-reader-text"><?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' );?></span></a>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>