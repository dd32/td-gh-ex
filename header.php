<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-coaching
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-coaching' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','advance-coaching'); ?></a></div>
<div id="header">
  <div class="top-header"> 
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 p-0">
          <?php if( get_theme_mod('advance_coaching_time') != ''){ ?>
            <div class="time">
              <div class="row m-0">
                <div class="col-lg-3 col-md-3">
                  <i class="far fa-clock"></i>
                </div>
                <div class="col-lg-9 col-md-9 p-0">
                  <p><?php echo esc_html( get_theme_mod('advance_coaching_time',__('Mon - Sat 9:00 - 19:00 Sunday Closed','advance-coaching') )); ?></p>
                </div>
              </div>
            </div>  
          <?php } ?>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="welcome-text">
          <?php if( get_theme_mod('advance_coaching_welcome_text') != ''){ ?>
            <p><?php echo esc_html( get_theme_mod('advance_coaching_welcome_text',__('Welcome to coaching theme','advance-coaching') )); ?></p>
          <?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="request-btn">
            <?php if ( get_theme_mod('advance_coaching_course1','') != "" ) {?>
               <span><a href="<?php echo esc_html(get_theme_mod('advance_coaching_course')); ?>"><?php echo esc_html(get_theme_mod('advance_coaching_course1',__('REQUEST FREE COURSE','advance-coaching'))); ?> <i class="fas fa-angle-right"></i></a></span>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contact-content">
    <div class="container">
      <div class="menu-bar">
        <div class="row">
          <div class="col-lg-3 col-md-3 logo_bar p-0">
            <div class="logo">
                 <?php if( has_custom_logo() ){ advance_coaching_the_custom_logo();
                 }else{ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?> 
                  <p class="site-description"><?php echo esc_html($description); ?></p>       
                <?php endif; }?>
            </div>
          </div>         
          <div class="col-lg-9 col-md-9 p-0">
            <div class="topbar">
              <div class="row m-0">
                <div class="col-lg-11 col-md-11 padding0">
                  <div class="main-menu">
                    <div class="container">
                      <div class="nav">
                        <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-1 col-md-1 p-0">
                   <div class="search-box">
                      <i class="fas fa-search"></i>
                   </div>
                </div>
              </div>
              <div class="serach_outer">
                <div class="closepop"><i class="far fa-window-close"></i></div>
                <div class="serach_inner">
                 <?php get_search_form(); ?>
                </div>
              </div>
              <div class="contact_data row m-0">
                <div class="col-lg-4 col-md-4">
                  <?php if( get_theme_mod('advance_coaching_mail') != ''){ ?>
                  <div class="mail">                    
                    <div class="row m-0">
                      <div class="col-lg-3 col-md-12">
                        <i class="fas fa-at"></i>
                      </div>
                      <div class="col-lg-9 col-md-12">
                        <?php if( get_theme_mod('advance_coaching_mail') != ''){ ?>
                          <p class="color"><?php echo esc_html( get_theme_mod('advance_coaching_mail',__('MAIL ADDRESS','advance-coaching') )); ?></p>
                        <?php } ?>
                        <?php if( get_theme_mod('advance_coaching_mail1') != ''){ ?>
                          <p><?php echo esc_html( get_theme_mod('advance_coaching_mail1',__('coachingtsg@gmail.com','advance-coaching') )); ?></p>
                        <?php } ?>
                      </div>
                    </div>  
                  </div>
                  <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4">
                  <?php if( get_theme_mod('advance_coaching_phone') != ''){ ?>
                    <div class="mail">
                      <div class="row m-0">
                        <div class="col-lg-3 col-md-12">
                          <i class="fas fa-phone"></i>
                        </div>
                        <div class="col-lg-9 col-md-12">
                          <?php if( get_theme_mod('advance_coaching_phone') != ''){ ?>
                            <p class="color"><?php echo esc_html( get_theme_mod('advance_coaching_phone',__('PHONE','advance-coaching') )); ?></p>
                          <?php } ?>
                          <?php if( get_theme_mod('advance_coaching_phone1') != ''){ ?>
                            <p><?php echo esc_html( get_theme_mod('advance_coaching_phone1',__('0123456789','advance-coaching') )); ?></p>
                          <?php } ?>
                        </div>
                      </div> 
                    </div> 
                  <?php } ?> 
                </div>
                <div class="col-lg-4 col-md-4">
                  <?php if( get_theme_mod('advance_coaching_address') != ''){ ?>
                    <div class="mail ">
                      <div class="row m-0">
                        <div class="col-lg-3 col-md-12">
                          <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="col-lg-9 col-md-12">
                          <?php if( get_theme_mod('advance_coaching_address') != ''){ ?>
                          <p class="color"><?php echo esc_html( get_theme_mod('advance_coaching_address',__('ADDRESS','advance-coaching') )); ?></p>
                          <?php } ?>
                          <?php if( get_theme_mod('advance_coaching_address1') != ''){ ?>
                          <p><?php echo esc_html( get_theme_mod('advance_coaching_address1',__('Ocean,Hilton Head Island, ORT 1236','advance-coaching') )); ?></p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>  
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>