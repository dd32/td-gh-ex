<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package Advance Automobile
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
    <?php if(get_theme_mod('advance_automobile_preloader_option',true)!= '' || get_theme_mod('advance_automobile_responsive_preloader', true) != ''){ ?>
      <div id="loader-wrapper" class="w-100 h-100">
        <div id="loader" class="rounded-circle"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <?php }?>
    <a class="screen-reader-text skip-link" href="#maincontent" ><?php esc_html_e( 'Skip to content', 'advance-automobile' ); ?></a>
    <div id="header">
      <?php if( get_theme_mod('advance_automobile_display_topbar') != ''){ ?>
        <div class="top-header p-2">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="mail">
                  <?php if( get_theme_mod('advance_automobile_mail1') != ''){ ?>
                    <a href="mailto:<?php echo esc_attr( get_theme_mod('advance_automobile_mail1','') ); ?>" class="text-lowercase"><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('advance_automobile_mail1','')); ?><span class="screen-reader-text"><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('advance_automobile_mail1','')); ?></span></a>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-6 col-md-5">
                <div class="social-icons text-right">
                  <?php if( get_theme_mod( 'advance_automobile_facebook_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','advance-automobile' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'advance_automobile_twitter_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_twitter_url','' ) ); ?>"><i class="fab fa-twitter ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','advance-automobile' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'advance_automobile_youtube_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_youtube_url','' ) ); ?>"><i class="fab fa-youtube ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','advance-automobile' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'advance_automobile_linkedin_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','advance-automobile' );?></span></a>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-2 col-md-3">
                <div class="book-btn text-center">
                  <?php if ( get_theme_mod('advance_automobile_book1','') != "" ) {?>
                    <a href="<?php echo esc_url(get_theme_mod('advance_automobile_book')); ?>" class="text-uppercase"><?php echo esc_html(get_theme_mod('advance_automobile_book1','')); ?><span class="screen-reader-text"><?php esc_html_e( 'Bookbtn','advance-automobile' );?></span></a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="main-menu <?php if( get_theme_mod( 'advance_automobile_sticky_header', false) != '' || get_theme_mod( 'advance_automobile_responsive_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-9">
              <div class="logo">
                <?php if ( has_custom_logo() ) : ?>
                  <div class="site-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if( get_theme_mod('advance_automobile_site_title',true) != ''){ ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                      <h1 class="site-title text-left p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-left pt-0 text-uppercase" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                      <p class="site-title text-left mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-left pt-0 text-uppercase"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                  <?php }?>
                <?php endif; ?>
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
                  ?>
                  <?php if( get_theme_mod('advance_automobile_tagline',true) != ''){ ?>
                    <p class="site-description text-left mb-0">
                      <?php echo esc_html($description); ?>
                    </p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-3">
              <?php 
                if(has_nav_menu('primary')){ ?>
                <div class="toggle-menu mobile-menu text-right">
                  <button class="mobiletoggle"><i class="fas fa-bars p-3 my-3 mx-0"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-automobile'); ?></span></button>
                </div>
              <?php }?>
              <div id="menu-sidebar" class="nav sidebar text-center">
                <nav id="primary-site-navigation" class="primary-navigation pl-0 text-left" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-automobile' ); ?>">
                  <?php
                    if(has_nav_menu('primary')){ 
                      wp_nav_menu( array( 
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu-navigation clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) );
                    } 
                  ?>
                  <div id="contact-info">
                    <div class="mail p-3">
                      <a href="mailto:<?php echo esc_attr( get_theme_mod('advance_automobile_mail1','') ); ?>" class="text-lowercase"><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('advance_automobile_mail1','')); ?><span class="screen-reader-text"><i class="fas fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('advance_automobile_mail1','')); ?></span></a>
                    </div>
                    <?php get_search_form();?>
                    <div class="book-btn text-center my-3 mx-0">
                      <?php if ( get_theme_mod('advance_automobile_book1','') != "" ) {?>
                        <a href="<?php echo esc_url(get_theme_mod('advance_automobile_book')); ?>" class="text-uppercase py-2 px-3"><?php echo esc_html(get_theme_mod('advance_automobile_book1','')); ?><span class="screen-reader-text"><?php esc_html_e( 'Bookbtn','advance-automobile' );?></span></a>
                      <?php }?>
                    </div>
                    <div class="social-icons">
                      <?php if( get_theme_mod( 'advance_automobile_facebook_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_facebook_url','' ) ); ?>" class="py-2 px-0"><i class="fab fa-facebook-f ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','advance-automobile' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_automobile_twitter_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_twitter_url','' ) ); ?>" class="py-2 px-0"><i class="fab fa-twitter ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','advance-automobile' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_automobile_youtube_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_youtube_url','' ) ); ?>" class="py-2 px-0"><i class="fab fa-youtube ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','advance-automobile' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_automobile_linkedin_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_automobile_linkedin_url','' ) ); ?>" class="py-2 px-0"><i class="fab fa-linkedin-in ml-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','advance-automobile' );?></span></a>
                      <?php } ?>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="closebtn mobile-menu"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-automobile'); ?></span></a>
                </nav>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-6">
              <div class="search-box my-2 mx-0">
                <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search py-3 px-0 m-2 text-center"></i></button>
              </div>
            </div>
          </div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog mw-100 m-0" role="document">
              <div class="modal-body">
                <div class="serach_inner w-100 h-100">
                  <?php get_search_form(); ?>
                </div>
              </div>
              <button type="button" class="closepop text-center" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>