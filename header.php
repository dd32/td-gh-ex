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
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','advance-ecommerce-store'); ?></a></div>
  <div class="toggle"><a class="toggleWooMenu" href="#"><?php esc_html_e('Woocommerce Menu','advance-ecommerce-store'); ?></a></div>
  <div id="header">   
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <?php dynamic_sidebar('social'); ?>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'woocommerce-menu') ); ?>
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
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-in-alt"></i></a>
            <?php } 
            else { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-user"></i></a>
            <?php } ?>
          </div>
          <div class="col-lg-2 col-md-2 cart_icon">
            <?php if(class_exists('woocommerce')){ ?>
              <li class="cart_box">
                <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
              </li>
              <span class="cart_no">
                <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'SHOPPING CART','advance-ecommerce-store' ); ?>"><?php esc_html_e( 'SHOPPING CART','advance-ecommerce-store' ); ?></a>
              </span>
              <?php }?>
          </div>         
        </div>
      </div>
    </div>
    <div class="main-menu">
      <div class="container">
        <div class="nav">
          <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>