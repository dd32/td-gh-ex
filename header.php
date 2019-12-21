<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-it-company
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-it-company' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header role="banner">
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-it-company' ); ?></a>
    <div id="header">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-lg-1 col-lg-3 col-md-12">
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
            <div class="toggle-menu responsive-menu">
              <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-it-company'); ?></span></button>
            </div>
          </div>
          <div class="col-lg-8 col-md-12">
            <?php if( get_theme_mod('advance_it_company_display_topbar',true) != ''){ ?>
              <div class="menu-color row">
                <div class="col-lg-2 col-md-4 phone">
                  <?php if( get_theme_mod('advance_it_company_phone') != '' || get_theme_mod( 'advance_it_company_phone1' )!= ''){ ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-2">
                      <i class="fas fa-phone"></i>
                    </div>
                    <div class="col-lg-9 col-md-10">
                      <?php if( get_theme_mod('advance_it_company_phone') != ''){ ?>
                        <p><?php echo esc_html( get_theme_mod('advance_it_company_phone','' )); ?></p>
                      <?php } ?>
                      <?php if( get_theme_mod('advance_it_company_phone1') != ''){ ?>
                        <p class="p_color"><?php echo esc_html( get_theme_mod('advance_it_company_phone1','' )); ?></p>
                      <?php } ?>
                    </div>
                  </div>
                  <?php }?>
                </div>
                <div class="col-lg-3 col-md-4 mail">
                  <?php if( get_theme_mod('advance_it_company_mail') != '' || get_theme_mod( 'advance_it_company_mail1' )!= ''){ ?>
                  <div class="row">
                    <div class="col-lg-2 col-md-2">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <div class="mail">
                        <?php if( get_theme_mod('advance_it_company_mail') != ''){ ?>
                         <p><?php echo esc_html( get_theme_mod('advance_it_company_mail','')); ?></p>
                        <?php } ?>
                        <?php if( get_theme_mod('advance_it_company_mail1') != ''){ ?>
                         <p class="p_color"><?php echo esc_html( get_theme_mod('advance_it_company_mail1','')); ?></p>
                        <?php } ?>
                      </div>  
                    </div>
                  </div>
                  <?php }?>
                </div>
                <div class="col-lg-4 col-md-4 address">
                  <?php if( get_theme_mod('advance_it_company_address') != '' || get_theme_mod( 'advance_it_company_address1' )!= ''){ ?>
                  <div class="row">
                    <div class="col-lg-2 col-md-2">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="col-lg-10 col-md-10">
                      <?php if( get_theme_mod('advance_it_company_address') != ''){ ?>
                        <p><?php echo esc_html( get_theme_mod('advance_it_company_address','')); ?></p>
                      <?php } ?>
                      <?php if( get_theme_mod('advance_it_company_address1') != ''){ ?>
                        <p class="p_color"><?php echo esc_html( get_theme_mod('advance_it_company_address1','')); ?></p>
                      <?php } ?>
                    </div>
                  </div>
                  <?php }?>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="social-icons">
                    <?php if( get_theme_mod( 'advance_it_company_facebook_url') != '') { ?>
                      <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','advance-it-company' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_it_company_twitter_url') != '') { ?>
                      <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','advance-it-company' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_it_company_linkedin_url') != '') { ?>
                      <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','advance-it-company' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_it_company_instagram_url') != '') { ?>
                      <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_instagram_url','' ) ); ?>"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','advance-it-company' );?></span><i class="fab fa-instagram"></i></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_it_company_google_plus_url') != '') { ?>
                      <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_google_plus_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','advance-it-company' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_it_company_youtube_url') != '') { ?>
                      <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','advance-it-company' );?></span></a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="main-menu">
              <div class="row m-0 ">
                <div class="col-lg-11 col-md-11 p-0">
                  <div id="menu-sidebar" class="nav sidebar">
                    <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-it-company' ); ?>">
                      <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-it-company'); ?></span></a>
                      <?php 
                        wp_nav_menu( array( 
                          'theme_location' => 'primary',
                          'container_class' => 'main-menu-navigation clearfix' ,
                          'menu_class' => 'clearfix',
                          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                          'fallback_cb' => 'wp_page_menu',
                        ) ); 
                      ?>
                      <div id="contact-info">
                        <div class="social-icons">
                          <?php if( get_theme_mod( 'advance_it_company_facebook_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','advance-it-company' );?></span></a>
                          <?php } ?>
                          <?php if( get_theme_mod( 'advance_it_company_twitter_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','advance-it-company' );?></span></a>
                          <?php } ?>
                          <?php if( get_theme_mod( 'advance_it_company_linkedin_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','advance-it-company' );?></span></a>
                          <?php } ?>
                          <?php if( get_theme_mod( 'advance_it_company_instagram_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_instagram_url','' ) ); ?>"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','advance-it-company' );?></span><i class="fab fa-instagram"></i></a>
                          <?php } ?>
                          <?php if( get_theme_mod( 'advance_it_company_google_plus_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_google_plus_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','advance-it-company' );?></span></a>
                          <?php } ?>
                          <?php if( get_theme_mod( 'advance_it_company_youtube_url') != '') { ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'advance_it_company_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','advance-it-company' );?></span></a>
                          <?php } ?>
                        </div>
                        <?php get_search_form();?>
                      </div>
                    </nav>
                  </div>
                </div>
                <div class="col-lg-1">
                  <a href="#" onclick="search_open()" class="search-box">
                    <i class="fas fa-search"></i><span class="screen-reader-text"><?php esc_html_e( 'Search','advance-it-company' );?></span>
                  </a>
                </div>
              </div>
              <div class="serach_outer">
                <a href="#" onclick="search_close()" class="closepop">X<span class="screen-reader-text"><?php esc_html_e( 'serach-outer','advance-it-company' );?></span></a>
                <div class="serach_inner">
                  <?php get_search_form(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>