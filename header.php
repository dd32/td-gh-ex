<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-ecommerce-store
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-ecommerce-store' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header role="banner">
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-ecommerce-store' ); ?></a>
    <div id="header">   
      <div class="top-menu">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <?php dynamic_sidebar('social'); ?>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="toggle-menu responsive-menu">
                <button role="tab" onclick="wooMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Woocommerce Menu','advance-ecommerce-store'); ?></span></button>
              </div>
              <div id="woomenu-sidebar" class="nav sidebar">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-ecommerce-store' ); ?>">
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="wooMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-ecommerce-store'); ?></span></a>
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'woocommerce-menu',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  ?>
                </nav>
              </div>
            </div>
          </div>        
        </div>
      </div>
      <div class="middle-header">
        <div class="container">
          <div class="row">
            <div class="logo col-lg-3 col-md-3">
              <?php if( has_custom_logo() ){ advance_ecommerce_store_the_custom_logo();
               }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?> 
                <p class="site-description"><?php echo esc_html($description); ?></p>       
              <?php endif; }?>
            </div>
            <div class="col-lg-6 col-md-6">
              <?php if(class_exists('woocommerce')){ ?>
                <?php get_product_search_form()?>
              <?php }?>
            </div>
            <div class="account col-lg-1 col-md-1">
              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-in-alt"></i><span class="screen-reader-text"><?php esc_html_e('My Account','advance-ecommerce-store'); ?></span></a>
              <?php } 
              else { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php the_title(); ?></span></a>
              <?php } ?>
            </div>
            <div class="col-lg-2 col-md-2 cart_icon">
              <?php if(class_exists('woocommerce')){ ?>
                <li class="cart_box">
                  <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                </li>
                <span class="cart_no">
                  <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'SHOPPING CART','advance-ecommerce-store' ); ?>"><?php esc_html_e( 'SHOPPING CART','advance-ecommerce-store' ); ?><span class="screen-reader-text"><?php esc_attr_e( 'SHOPPING CART','advance-ecommerce-store' );?></span></a>
                </span>
                <?php }?>
            </div>         
          </div>
        </div>
      </div>
      <div class="toggle-menu responsive-menu">
        <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-ecommerce-store'); ?></span></button>
      </div>
      <div class="main-menu">
        <div class="container">
          <div id="menu-sidebar" class="nav sidebar">
              <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-ecommerce-store' ); ?>">
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-ecommerce-store'); ?></span></a>
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
          </div>
        </div>
      </div>
    </div>
  </header>