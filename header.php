<?php
/**
 * The Header template for our theme
 */
 $multishop_options = get_option( 'multishop_theme_options' ); ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- header -->
<header>
  <div class="multishop-container">
    <div class="col-md-12 header-bottom">
      <div class="col-md-3 no-padding-lr">
        <div class="heder-logo">
          <?php                                
          if(has_custom_logo()){
              the_custom_logo();            
          } 
          if (display_header_text()==true):?>
                  <h1 class="multishop-site-name"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" id='brand' class="custom-logo-link"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" id='brand' class="custom-logo-link"><small class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></small></a>   
              <?php endif; ?> 
        </div>
      </div>
      <div class="col-md-7 col-sm-9 no-padding-lr clearfix">
        <div class="header-navigation">
          <div class="navbar-header">
            <button type="button" data-target=".navbarCollapse" data-toggle="collapse" class="navbar-toggle"> 
					<span class="sr-only"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
			</button>
          </div>
          <?php	$multishop_defaults = array(
							'theme_location'  => 'primary',
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse no-padding-lr navbarCollapse  pull-right',							
							'menu_class'      => 'collapse navbar-collapse no-padding-lr navbarCollapse',							
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s nav navbar-nav multishop-menu">%3$s</ul>',
							'depth'           => 0,
						);
						if (has_nav_menu('primary')) {	
							wp_nav_menu($multishop_defaults); 
						}
					?>
        </div>
      </div>
      <div class="col-md-2 no-padding-lr">
        <div class="header-cart clearfix">
          <?php	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
		 global $woocommerce; ?>
          <i class="fa fa-shopping-cart"></i>         
          <a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'multishop'); ?>"><?php echo sprintf(/* translators: %d is product cart number*/_n('%d item', '%d items', esc_html($woocommerce->cart->cart_contents_count), 'multishop'), esc_html($woocommerce->cart->cart_contents_count));?> - <?php echo wp_kses($woocommerce->cart->get_cart_total(),array()); ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</header>