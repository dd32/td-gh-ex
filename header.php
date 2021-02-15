<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-business
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
  <?php if(get_theme_mod('advance_business_preloader_option',true) != '' || get_theme_mod('advance_business_responsive_preloader', true) != ''){ ?>
    <div id="loader-wrapper" class="w-100 h-100">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
  <?php }?>
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-business' ); ?></a>
  <div class="<?php if( get_theme_mod( 'advance_business_sticky_header', false) != '' || get_theme_mod( 'advance_business_responsive_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
    <div id="header">
      <div class="container">
        <div class="main-header py-0 px-2">
          <div class="row">
            <div class="logo col-lg-3 col-md-5 col-9 text-left py-2 px-3">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if( get_theme_mod('advance_business_site_title',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title text-left p-0 text-uppercase mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title text-left p-0 text-uppercase mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
                ?>
              <?php if( get_theme_mod('advance_business_tagline',true) != ''){ ?>
                <p class="site-description p-0">
                  <?php echo esc_html($description); ?>
                </p>
              <?php }?>
            <?php endif; ?>
            </div>
            <div class="col-lg-8 col-md-7 col-3">
              <?php 
                if(has_nav_menu('primary')){ ?>
                <div class="toggle-menu responsive-menu">
                  <button class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-business'); ?></span></button>
                </div>
              <?php }?>
              <div id="menu-sidebar text-center" class="nav sidebar">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-business' ); ?>">
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
                    <?php get_search_form(); ?>
                  </div>
                  <a href="javascript:void(0)" class="closebtn responsive-menu"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-business'); ?></span></a>
                </nav>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-6">
              <div class="search-box my-2 mx-0">
                <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search m-3"></i></button>
              </div>
            </div>
          </div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog m-0" role="document">
              <div class="modal-body p-0">
                <div class="serach_inner h-100 w-100">
                  <?php get_search_form(); ?>
                </div>
              </div>
              <button type="button" class="closepop text-center" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</header>