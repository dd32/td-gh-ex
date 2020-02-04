<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-startup
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-startup' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header role="banner">
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-startup' ); ?></a>
  <?php if( get_theme_mod('advance_startup_display_topbar',true) != ''){ ?>
    <div class="top-header">
      <div class="container">
        <div class="row m-0">
          <div class="col-lg-2 col-md-6 p-0 ">
            <div class="phone">
              <?php if( get_theme_mod('advance_startup_phone1') != ''){ ?>
                <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('advance_startup_phone1','' )); ?></span>
              <?php } ?>
            </div> 
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="mail">
              <?php if( get_theme_mod('advance_startup_mail1') != ''){ ?>
                <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('advance_startup_mail1','')); ?></span>
              <?php } ?>
            </div>  
          </div>
          <div class="col-lg-3 col-md-6 time p-0">
            <?php if( get_theme_mod('advance_startup_time') != ''){ ?>
              <i class="fas fa-clock"></i><span><?php echo esc_html( get_theme_mod('advance_startup_time','')); ?></span>
            <?php } ?>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="social-icons">
              <?php if( get_theme_mod( 'advance_startup_facebook_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','advance-startup' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'advance_startup_twitter_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','advance-startup' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'advance_startup_youtube_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','advance-startup' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'advance_startup_google_plus_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_google_plus_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','advance-startup' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'advance_startup_linkedin_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','advance-startup' );?></span></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div> 
  <?php } ?>
  <div id="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="logo">
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
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="talk-btn">
            <?php if ( get_theme_mod('advance_startup_top_button_text','') != "" ) {?>
              <a href="<?php echo esc_html(get_theme_mod('advance_startup_top_button_url')); ?>"><?php echo esc_html(get_theme_mod('advance_startup_top_button_text','')); ?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php esc_attr_e( 'Button','advance-startup' );?></span></a>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part( 'template-parts/header-navigation' ); ?> 
</header>