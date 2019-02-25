<?php
/**
* header.php
*
* @author    Franchi Design
* @package   atomy
* @version   1.0.0
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atomy' ); ?></a>
        <!-- First Nav Menu -->
        <div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="top_header_left">
                        <!-- Language Menu -->
                        <div class="selector">
                         <?php
			                wp_nav_menu( array(
                           'theme_location' => 'menu-2',
                           'menu_class'=>'at_language_menu',));
                          ?>             
                        </div>
                        <!-- Search -->
                        <div class="input-group">
                        <?php
                          // Check if WooCommerce is active 
                          if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                          // Put your plugin code here
                          get_product_search_form();
                           }
                        ?>
                        </div>
                    </div>
                </div>
                <!-- Contact top -->
                <div class="col-lg-5">
                        <div class="top_header_middle">
                            <a href="#"><i class="fa fa-phone"></i> Call Us: <span>+84 987 654 321</span></a>
                            <a href="#"><i class="fa fa-envelope"></i> Email: <span>support@yourdomain.com</span></a>
                           <!-- Logo -->
                            <?php the_custom_logo();?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$willer_description = get_bloginfo( 'description', 'display' );
							if ( $willer_description || is_customize_preview() ) :?>
							<p class="site-description"><?php echo $willer_description; /* WPCS: xss ok. */ ?></p>
                           <?php endif ?>  
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="top_right_header">
                            <!-- Social -->
                            <ul class="header_social">
                            <?php get_template_part( 'sections/section','social');?>
                            </ul>
                            <!-- Login -->
                            <ul class="top_right">
                                <li class="user">
                                  <a data-tooltip="<?php esc_html_e('Wish List','atomy');?>" class="login-contents" href="http://cesco.dev.cc/lista-desiseri/">
                                  <i class="fas fa-heart"></i>
			                       </a>
                               </li>
                              <li class="user">
                                <?php if ( is_user_logged_in() ) { ?>
                                <a data-tooltip="<?php esc_html_e('Customer Area','atomy');?>" class="login-contents" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>">
                                 <i class="fas fa-user"></i>
			                    </a>
                               <?php } 
		                       else { ?>
					           <a data-tooltip="<?php esc_html_e('Register or Login','atomy');?>" class="register-contents" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id')) ); ?>">
                                 <i class="far fa-user"></i>
                               </a>
		                       <?php } ?>
                                </li>
                                <li class="cart">
                               <!-- Cart -->
		                       <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                $count = WC()->cart->cart_contents_count;
                                ?>
                                <a href="<?php echo WC()->cart->get_cart_url(); ?>" data-tooltip="<?php esc_html_e('Go to the cart','atomy');?>"><i class="fas fa-shopping-cart"></i>
			                    <?php 
                                if ( $count > 0 ) {
	                            ?>
	                            <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
	                           <?php  }?>
                               </a>
                              </li>
	                          <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Nav Menu -->
        <header class="shop_header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- Logo -->
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
			          wp_nav_menu( array(
                     'theme_location' => 'menu-1',
                     'link_class'   => 'nav-link dropdown-toggle',  
                     'items_wrap'=>'<ul class="navbar-nav">%3$s</ul>', ) );
                     ?> 
                    </div>
                </nav>
            </div>
        </header>
	<div id="content" class="site-content">
