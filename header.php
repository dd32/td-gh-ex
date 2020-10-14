<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-coaching
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
    <?php if(get_theme_mod('advance_coaching_preloader_option',true) != '' || get_theme_mod('advance_coaching_responsive_preloader', true) != ''){ ?>
      <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <?php }?>
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-coaching' ); ?></a>
    <div id="header">
      <?php if( get_theme_mod('advance_coaching_display_topbar', false) != ''){ ?>
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
                        <p><?php echo esc_html( get_theme_mod('advance_coaching_time','' )); ?></p>
                      </div>
                    </div>
                  </div>  
                <?php } ?>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="welcome-text">
                  <?php if( get_theme_mod('advance_coaching_welcome_text') != ''){ ?>
                    <p><?php echo esc_html( get_theme_mod('advance_coaching_welcome_text','' )); ?></p>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-3">
                <div class="request-btn">
                  <?php if ( get_theme_mod('advance_coaching_course1','') != "" ) {?>
                    <span><a href="<?php echo esc_url(get_theme_mod('advance_coaching_course')); ?>"><?php echo esc_html(get_theme_mod('advance_coaching_course1','')); ?> <i class="fas fa-angle-right"></i></a><span class="screen-reader-text"><?php esc_html_e( 'Requestbtn','advance-coaching' );?></span></span>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="contact-content">
        <div class="container">
          <div class="menu-bar">
            <div class="row">
              <div class="col-lg-3 col-md-4 logo_bar">
                <div class="logo">
                  <?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                  <?php endif; ?>
                  <?php $blog_info = get_bloginfo( 'name' ); ?>
                  <?php if ( ! empty( $blog_info ) ) : ?>
                    <?php if( get_theme_mod('advance_coaching_site_title',true) != ''){ ?>
                      <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                      <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                      <?php endif; ?>
                    <?php }?>
                  <?php endif; ?>
                  <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                    ?>
                    <?php if( get_theme_mod('advance_coaching_tagline',true) != ''){ ?>
                      <p class="site-description">
                        <?php echo esc_html($description); ?>
                      </p>
                    <?php }?>
                  <?php endif; ?>
                </div>
              </div>         
              <div class="col-lg-9 col-md-8 p-0">
                <div class="topbar">
                  <div class="<?php if( get_theme_mod( 'advance_coaching_sticky_header', false) != '' || get_theme_mod( 'advance_coaching_responsive_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
                    <?php 
                      if(has_nav_menu('primary')){ ?>
                      <div class="toggle-menu responsive-menu">
                        <button role="tab" class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-coaching'); ?></span></button>
                      </div>
                    <?php }?>
                    <div class="row m-0">
                      <div class="col-lg-11 col-md-11 padding0">
                        <div class="main-menu">
                          <div class="container">
                            <div id="menu-sidebar" class="nav sidebar">
                              <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-coaching' ); ?>">
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
                                <div class="request-btn">
                                  <?php if ( get_theme_mod('advance_coaching_course1','') != "" ) {?>
                                    <span><a href="<?php echo esc_url(get_theme_mod('advance_coaching_course')); ?>"><?php echo esc_html(get_theme_mod('advance_coaching_course1','')); ?> <i class="fas fa-angle-right"></i></a><span class="screen-reader-text"><?php esc_html_e( 'Requestbtn','advance-coaching' );?></span></span>
                                  <?php }?>
                                </div>
                                <?php get_search_form();?>
                                <a href="javascript:void(0)" class="closebtn responsive-menu"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-coaching'); ?></span></a>
                              </nav>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-6">
                        <div class="search-box">
                          <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-body">
                        <div class="serach_inner">
                          <?php get_search_form(); ?>
                        </div>
                      </div>
                      <button type="button" class="closepop" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
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
                              <p class="color"><?php echo esc_html( get_theme_mod('advance_coaching_mail','' )); ?></p>
                            <?php } ?>
                            <?php if( get_theme_mod('advance_coaching_mail1') != ''){ ?>
                              <a href="mailto:<?php echo esc_attr( get_theme_mod('advance_coaching_mail1','') ); ?>"><?php echo esc_html( get_theme_mod('advance_coaching_mail1','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_coaching_mail1','' )); ?></span></a>
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
                                <p class="color"><?php echo esc_html( get_theme_mod('advance_coaching_phone','' )); ?></p>
                              <?php } ?>
                              <?php if( get_theme_mod('advance_coaching_phone1') != ''){ ?>
                                <a href="tel:<?php echo esc_attr( get_theme_mod('advance_coaching_phone1','' )); ?>"><?php echo esc_html( get_theme_mod('advance_coaching_phone1','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_coaching_phone1','' )); ?></span></a>
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
                              <p class="color"><?php echo esc_html( get_theme_mod('advance_coaching_address','' )); ?></p>
                              <?php } ?>
                              <?php if( get_theme_mod('advance_coaching_address1') != ''){ ?>
                              <p><?php echo esc_html( get_theme_mod('advance_coaching_address1','' )); ?></p>
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
  </header>