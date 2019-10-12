<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-fitness-gym
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-fitness-gym' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header role="banner">
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-fitness-gym' ); ?></a>
  <div id="header"> 
    <div class="top_headbar">
      <div class="container">  
        <div class="row">
          <div class="top-contact col-lg-6 col-md-8 p-0">
            <span class="contact">
              <?php if( get_theme_mod( 'advance_fitness_gym_contact','' ) != '') { ?>
              <i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('advance_fitness_gym_contact','' )); ?>
             <?php } ?>
            </span>
            <span class="mail">
              <?php if( get_theme_mod( 'advance_fitness_gym_email','' ) != '') { ?>
              <i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('advance_fitness_gym_email','') ); ?>
              <?php } ?>
            </span>
          </div>
          <div class="col-lg-6 col-md-4 socialbox">
            <?php if( get_theme_mod( 'advance_fitness_gym_cont_facebook' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_cont_facebook','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','advance-fitness-gym' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'advance_fitness_gym_cont_twitter' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_cont_twitter','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','advance-fitness-gym' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'advance_fitness_gym_google_plus') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','advance-fitness-gym' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'advance_fitness_gym_instagram') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_instagram','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','advance-fitness-gym' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'advance_fitness_gym_linkedin') != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_linkedin','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkdin','advance-fitness-gym' );?></span></a>
            <?php } ?>
          </div>
          <div class="clearfix"></div>  
        </div>
      </div>
    </div>
    <div class="middle-header">
      <div class="container">
        <div class="row">
          <div class="logo col-lg-3 col-md-9 col-9">
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
          <div class="col-lg-9 col-md-3 col-3 ">
            <div class="main-menu">
              <div class="toggle-menu responsive-menu">
                <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-fitness-gym'); ?></span></button>
              </div>
              <div id="menu-sidebar" class="nav sidebar">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-fitness-gym' ); ?>">
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-fitness-gym'); ?></span></a>
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
                    <div class="contact">
                      <?php if( get_theme_mod( 'advance_fitness_gym_contact','' ) != '') { ?>
                      <i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('advance_fitness_gym_contact','' )); ?>
                     <?php } ?>
                    </div>
                    <div class="mail">
                      <?php if( get_theme_mod( 'advance_fitness_gym_email','' ) != '') { ?>
                      <i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('advance_fitness_gym_email','') ); ?>
                      <?php } ?>
                    </div>
                    <?php get_search_form(); ?>
                    <div class="socialbox">
                      <?php if( get_theme_mod( 'advance_fitness_gym_cont_facebook' ) != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_cont_facebook','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','advance-fitness-gym' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_fitness_gym_cont_twitter' ) != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_cont_twitter','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','advance-fitness-gym' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_fitness_gym_google_plus') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','advance-fitness-gym' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_fitness_gym_instagram') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_instagram','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','advance-fitness-gym' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'advance_fitness_gym_linkedin') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_fitness_gym_linkedin','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkdin','advance-fitness-gym' );?></span></a>
                      <?php } ?>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>