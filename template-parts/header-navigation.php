<?php
/**
 * Header Navigation File
 *
 * @package advance-startup
 */
?>

<div id="header" class="<?php if( get_theme_mod( 'advance_startup_sticky_header',false) != '' || get_theme_mod( 'advance_startup_responsive_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
  <div class="main-menu">
    <div class="container">
      <div class="menu-color">
        <div class="row ">
          <div class="col-lg-11 col-md-12">
            <div class="toggle-menu responsive-menu">
              <button class="mobiletoggle" role="tab" onclick="advance_startup_resmenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-startup'); ?></span></button>
            </div>
            <div id="menu-sidebar" class="nav side-menu">
              <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-startup' ); ?>">
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
              <div id="contact-info">
                <div class="phone">
                  <?php if( get_theme_mod('advance_startup_phone1') != ''){ ?>
                    <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('advance_startup_phone1','' )); ?></span>
                  <?php } ?>
                </div> 
                <div class="mail">
                  <?php if( get_theme_mod('advance_startup_mail1') != ''){ ?>
                    <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('advance_startup_mail1','')); ?></span>
                  <?php } ?>
                </div>  
                <div class="time">
                  <?php if( get_theme_mod('advance_startup_time') != ''){ ?>
                    <i class="fas fa-clock"></i><span><?php echo esc_html( get_theme_mod('advance_startup_time','')); ?></span>
                  <?php } ?>
                </div>
                <?php get_search_form();?>
                <div class="social-icons">
                  <?php if( get_theme_mod( 'advance_startup_facebook_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','advance-startup' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'advance_startup_twitter_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','advance-startup' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'advance_startup_youtube_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','advance-startup' );?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'advance_startup_linkedin_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_startup_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','advance-startup' );?></span></a>
                  <?php } ?>
                </div>
              </div>
              <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="advance_startup_resmenu_close()"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-startup'); ?></span></a>
            </div>
          </div>
          <div class="col-lg-1 col-md-1">
            <a href="#" onclick="advance_startup_search_open()" class="search-box">
              <i class="fas fa-search"></i><span class="screen-reader-text"><?php esc_html_e( 'Search','advance-startup' );?></span>
            </a>
          </div>
        </div>
        <div class="serach_outer">
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
          <a href="#maincontent" onclick="advance_startup_search_close()" class="closepop">X<span class="screen-reader-text"><?php esc_html_e( 'serach-outer','advance-startup' );?></span></a>
        </div>
    </div>
  </div>
</div>