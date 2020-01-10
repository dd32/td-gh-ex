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

<header role="banner">
  <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'automobile-car-dealer' ); ?></a>
  <div id="header">
    <div class="container inner-box">
      <div class="row m-0">
        <div class="col-lg-3 col-md-7 logo_bar">
          <div class="logo">
        <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
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
      </div>
          <div class="toggle-menu responsive-menu">
            <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','automobile-car-dealer'); ?></span>
            </button>
          </div>
        </div>
        <div class="col-lg-9 col-md-5 padding0">
          
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
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_facebook','' ) ); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_cont_twitter') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_twitter','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_google_plus') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_pinterest') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_pinterest','' ) ); ?>"><i class="fab fa-pinterest" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest','automobile-car-dealer' );?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'automobile_car_dealer_tumblr') != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_tumblr','' ) ); ?>"><i class="fab fa-tumblr" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr','automobile-car-dealer' );?></span></a>
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-1 col-md-1">
              <div class="search-box">
                <a href="#search"><i class="fa fa-search"></i><span class="screen-reader-text"><?php esc_html_e('Search','automobile-car-dealer'); ?></span></a>
              </div>
            </div>
          </div>
          <div id="search">
            <a class="close">X<span class="screen-reader-text"><?php esc_html_e('Close','automobile-car-dealer'); ?></span></a>
            <?php get_search_form(); ?>
          </div>
          <div class="row m-0">
            <div class="col-lg-9 col-md-6 padding0">
              <div id="navbar-header" class="menu-brand">
                <div class="responsive-search">
                  <?php get_search_form();?>
                </div>
                <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'automobile-car-dealer' ); ?>">
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','automobile-car-dealer'); ?></span></a>
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  ?>
                </nav>
                <?php if( get_theme_mod( 'automobile_car_dealer_mail','' ) != '') { ?>
                  <span><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_mail','' )); ?></span>
                  <?php }?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_phone','' ) != '') { ?>
                  <span><i class="fa fa-phone"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_phone','') ); ?></span>
                <?php }?>
                <div class="socialbox">
                  <?php if( get_theme_mod( 'automobile_car_dealer_cont_facebook') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_facebook','' ) ); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_cont_twitter') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_twitter','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_google_plus') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_pinterest') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_pinterest','' ) ); ?>"><i class="fab fa-pinterest" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_tumblr') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_tumblr','' ) ); ?>"><i class="fab fa-tumblr" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php if( get_theme_mod( 'automobile_car_dealer_button_link','' ) != '') { ?>
              <div class="col-lg-3 col-md-12  appointbtn">
                <a href="<?php echo esc_url( get_theme_mod('automobile_car_dealer_button_link','' ) ); ?>"><i class="fas fa-calendar-alt"></i><?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' ); ?><span class="screen-reader-text"><?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' );?></span></a>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>