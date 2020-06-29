<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-education
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
  <header role="banner">
    <?php if(get_theme_mod('advance_education_preloader_option',true) || get_theme_mod('advance_education_responsive_preloader', true) != ''){ ?>
      <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <?php }?>
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-education' ); ?></a>
    <?php if( get_theme_mod('advance_education_display_topbar',true) != '' ){ ?>
      <div id="header-top">
        <div class="container">
          <div class="top-header">
            <div class="row m-0">
              <?php if( get_theme_mod('advance_education_time') != ''){ ?>
                <div class="col-lg-3 col-md-3 time">
                  <span><?php echo esc_html( get_theme_mod('advance_education_time','')); ?></span>
                </div>
              <?php } ?>
              <div class="col-lg-2 col-md-3">
                <?php if( get_theme_mod('advance_education_phone1') != ''){ ?>
                  <div class="phone">
                    <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('advance_education_phone1','' )); ?></span>
                  </div> 
                <?php } ?>
              </div>
              <div class="col-lg-3 col-md-3 p-0">
                <?php if( get_theme_mod('advance_education_mail1') != ''){ ?>
                  <div class="mail">
                    <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('advance_education_mail1','')); ?></span>
                  </div>  
                <?php } ?>
              </div>
              <div class="col-lg-4 col-md-3">
                <div class="account-btn">
                  <a href="<?php the_permalink((get_option('woocommerce_myaccount_page_id'))); ?>"><?php echo esc_html_e('MY ACCOUNT','advance-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'MY ACCOUNT','advance-education' );?></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    <?php } ?>
  </header>
  <div class="<?php if( get_theme_mod( 'advance_education_sticky_header', false) != '' || get_theme_mod( 'advance_education_responsive_sticky_header', false) != '') { ?> logo-sticky-header"<?php } else { ?>close-sticky <?php } ?>">
    <div class="toggle-menu responsive-menu">
      <button role="tab" class="mobiletoggle" onclick="advance_education_resmenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-education'); ?></span></button>
    </div>
  </div>

  <?php get_template_part( 'template-parts/header/header-navigation' ); ?>
