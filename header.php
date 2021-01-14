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
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('automobile_car_dealer_preloader',true) != '' || get_theme_mod( 'automobile_car_dealer_display_preloader',true) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'automobile-car-dealer' ); ?></a>
    <div id="header">
      <div class="container inner-box p-0">
        <div class="row m-0">
          <div class="col-lg-3 col-md-7 logo_bar">
            <div class="logo m-0 py-3 px-0 text-lg-center text-left">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if( get_theme_mod('automobile_car_dealer_site_title_enable',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="p-0"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="p-0"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('automobile_car_dealer_site_tagline_enable',true) != ''){ ?>
                  <p class="site-description">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php }?>
              <?php endif; ?>      
            </div>
            <?php 
              if(has_nav_menu('primary')){ ?>
              <div class="toggle-menu responsive-menu <?php if( get_theme_mod( 'automobile_car_dealer_display_fixed_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
                <button role="tab" onclick="automobile_car_dealer_responsive_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_responsive_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','automobile-car-dealer'); ?></span>
                </button>
              </div>
            <?php }?>
          </div>
          <div class="col-lg-9 col-md-5 p-0">
            <div class="topbar row m-0 py-3 px-0">
              <div class="col-lg-7 col-md-7">
                <?php if( get_theme_mod( 'automobile_car_dealer_mail','' ) != '') { ?>
                  <a href="mailto:<?php echo esc_attr( get_theme_mod('automobile_car_dealer_mail','') ); ?>" class="mr-4"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_email_icon','fas fa-envelope')); ?> mr-3"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_mail','' )); ?><span class="screen-reader-text"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_email_icon','fas fa-envelope')); ?> mr-3"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_mail','' )); ?></span></a>
                <?php }?>
                <?php if( get_theme_mod( 'automobile_car_dealer_phone','' ) != '') { ?>
                  <a href="tel:<?php echo esc_attr( get_theme_mod('automobile_car_dealer_phone','' )); ?>" class="mr-4"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_phone_icon','fa fa-phone')); ?> mr-3"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_phone','') ); ?><span class="screen-reader-text"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_phone_icon','fa fa-phone')); ?> mr-3"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_phone','') ); ?></span></a>
                <?php }?>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="socialbox">
                  <?php if( get_theme_mod( 'automobile_car_dealer_cont_facebook') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_facebook','' ) ); ?>" class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_facebook_icon','fab fa-facebook-f')); ?> mr-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_cont_twitter') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_twitter','' ) ); ?>" class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_twitter_icon','fab fa-twitter')); ?> mr-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_pinterest') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_pinterest','' ) ); ?>" class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_pinterest_icon','fab fa-pinterest')); ?> mr-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'automobile_car_dealer_tumblr') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_tumblr','' ) ); ?>" class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_tumblr_icon','fab fa-tumblr')); ?> mr-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Tumblr','automobile-car-dealer' );?></span></a>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-1 col-md-1 col-6">
                <div class="main-search">
                  <span><a href="#" class="mr-4"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_search_icon','fas fa-search')); ?> pt-1 mr-3"></i></a></span>
                </div>
              </div>
            </div>
            <div class="searchform_page w-100 h-100">
              <div class="close w-100 text-right mr-4"><a href="#maincontent"><i class="fa fa-times"></i></a></div>
              <div class="search_input w-100">
                <?php get_search_form(); ?>
              </div>
            </div>
            <div class="<?php if( get_theme_mod( 'automobile_car_dealer_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
              <div class="row m-0">
                <div class="col-lg-9 col-md-6 p-0">
                  <div id="navbar-header" class="menu-brand text-center">
                    <div class="responsive-search">
                      <?php get_search_form();?>
                    </div>
                    <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'automobile-car-dealer' ); ?>">
                      <?php 
                        if(has_nav_menu('primary')){
                          wp_nav_menu( array( 
                            'theme_location' => 'primary',
                            'container_class' => 'main-menu-navigation clearfix' ,
                            'menu_class' => 'clearfix',
                            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav text-left m-0 pl-0">%3$s</ul>',
                            'fallback_cb' => 'wp_page_menu',
                          ) );
                        } 
                      ?>
                    </nav>
                    <?php if( get_theme_mod( 'automobile_car_dealer_mail','' ) != '') { ?>
                      <a class="mail" href="mailto:<?php echo esc_url( get_theme_mod('automobile_car_dealer_mail','') ); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_email_icon','fas fa-envelope')); ?> mr-1"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_mail','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('automobile_car_dealer_mail','' )); ?></span></a>
                    <?php }?>
                    <?php if( get_theme_mod( 'automobile_car_dealer_phone','' ) != '') { ?>
                      <a class="call" href="tel:<?php echo esc_url( get_theme_mod('automobile_car_dealer_phone','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_phone_icon','fa fa-phone')); ?> mr-1"></i><?php echo esc_html( get_theme_mod('automobile_car_dealer_phone','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('automobile_car_dealer_phone','') ); ?></span></a>
                    <?php }?>
                    <div class="socialbox">
                      <?php if( get_theme_mod( 'automobile_car_dealer_cont_facebook') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_facebook','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_facebook_icon','fab fa-facebook-f')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','automobile-car-dealer' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'automobile_car_dealer_cont_twitter') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_cont_twitter','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_twitter_icon','fab fa-twitter')); ?>" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','automobile-car-dealer' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'automobile_car_dealer_pinterest') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_pinterest','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_pinterest_icon','fab fa-pinterest')); ?>" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','automobile-car-dealer' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'automobile_car_dealer_tumblr') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'automobile_car_dealer_tumblr','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_tumblr_icon','fab fa-tumblr')); ?>" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Tumblr','automobile-car-dealer' );?></span></a>
                      <?php } ?>
                    </div>
                    <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="automobile_car_dealer_responsive_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','automobile-car-dealer'); ?></span></a>
                  </div>
                </div>
                <?php if( get_theme_mod( 'automobile_car_dealer_button_link','' ) != '') { ?>
                  <div class="col-lg-3 col-md-12  appointbtn text-center py-2 px-0 m-lg-0 my-md-2 m-0">
                    <a href="<?php echo esc_url( get_theme_mod('automobile_car_dealer_button_link','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('automobile_car_dealer_appointment_icon','fas fa-calendar-alt')); ?> mr-2"></i><?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' ); ?><span class="screen-reader-text"><?php esc_html_e( 'MAKE AN APPOINTMENT','automobile-car-dealer' );?></span></a>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>