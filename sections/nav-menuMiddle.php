<?php
/**
* nav-menuMiddle.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<!-- First Nav Menu -->
    <div class="header_top_area">
        <div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?>">
            <div class="row">
                <div class="col-lg-3">
                    <div class="top_header_left">
                     <!-- Search -->
                     <div class="input-group"> 
                    <?php
                      // Check if WooCommerce is active 
                      if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'atomy_active_plugins', get_option( 'active_plugins' ) ) ) ) {
                      // Put your plugin code here
                      get_product_search_form();
                       }
                    ?>
                    </div>
                </div>
            </div>
            <!-- Contact top -->
            <div class="col-lg-6">
                    <div class="top_header_middle row">
                      <div class="col-md-12">
                            </div>
                     <!-- Logo -->
                     <div class="col-md-12">
                     <?php the_custom_logo();?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                        $atomy_description = get_bloginfo( 'description', 'display' );
                        if ( $atomy_description || is_customize_preview() ) :?>
                        <p class="site-description"><?php echo $atomy_description; /* WPCS: xss ok. */ ?></p>
                            </div>
                       <?php endif ?>  
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="top_right_header">
                        <!-- Social -->
                        <?php get_template_part( 'sections/section','social');?>
                       <!-- Icons header -->
                       <ul class="top_right">
                           <!-- Login -->
                           <?php if ( false ==  get_theme_mod( 'atomy_enable_login_icon', true) ):?>
                          <li class="user">
                            <?php if ( is_user_logged_in() ) { ?>
                            <a data-tooltip="<?php echo esc_attr('Customer Area','atomy');?>" class="login-contents" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>">
                             <i class="fas fa-user"></i>
                            </a>
                           <?php } 
                           else { ?>
                           <a data-tooltip="<?php echo esc_attr('Register or Login','atomy');?>" class="register-contents" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id')) ); ?>">
                             <i class="far fa-user"></i>
                           </a>
                           <?php } ?>
                            </li>
                            <?php endif; ?>	
                             <!-- Wishlist -->
                             <?php if ( false ==  get_theme_mod( 'atomy_enable_wishlist_icon', true) ):?>
                            <li class="user">
                            <div data-tooltip="<?php echo esc_attr('Wishlist','atomy');?>">
                            <?php echo do_shortcode("[ti_wishlist_products_counter]");?>
                           </div>
                           </li>
                           <?php endif; ?>
                           <!-- Cart -->
                           <?php if ( false ==  get_theme_mod( 'atomy_enable_cart_icon', true) ):?>	
                            <li class="cart">
                           <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'atomy_active_plugins', get_option( 'active_plugins' ) ) ) ) {
                            $atomy_count = WC()->cart->cart_contents_count;
                            ?>
                            <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" data-tooltip="<?php echo esc_attr('Go to the cart','atomy');?>">
                             <i class="<?php echo esc_attr( get_theme_mod( 'at_icon_cart_change','fas fa-shopping-cart')); ?>"></i>
                            <?php 
                            if ( $atomy_count > 0 ) {
                            ?>
                            <span class="cart-contents-count"><?php echo esc_html( $atomy_count,'atomy' ); ?></span>
                           <?php  }?>
                           </a>
                          </li>
                          <?php } ?>
                          <?php endif; ?>	
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="at-div-header <?php if ( false == get_theme_mod('atomy_enable_full_menu_header', true) ):?>container-fluid pl-0 pr-0 <?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_menu_header', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
    </div> 
    <!-- Second Nav Menu -->
    <header class="shop_header_area">
        <div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?>">
        <div class="row mr-0 ml-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-light col-lg-8 col-md-8" role="navigation">
            <!-- Logo -->
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr__('Toggle navigation','atomy')?>">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                     wp_nav_menu( array( 
                    'theme_location' => 'menu-1',
                    'link_class'     => 'nav-link dropdown-toggle',  
                    'fallback_cb'    => 'atomy_link_to_menu_editor',
                    'items_wrap'      =>'<ul class="navbar-nav">%3$s</ul>', ) );
                  ?>
                </div>
            </nav>
            <div class="col-lg-4 col-md-4 text-right at-nav-icons-eco-sticky at-icons-fix-menu pr-1">
                    <!-- Icons header only sticky-->
                    <ul class="top_right">
                           <!-- Login -->
                           <?php if ( false ==  get_theme_mod( 'atomy_enable_login_icon', true) ):?>
                          <li class="user">
                            <?php if ( is_user_logged_in() ) { ?>
                            <a data-tooltip="<?php echo esc_attr('Customer Area','atomy');?>" class="login-contents" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>">
                             <i class="fas fa-user"></i>
                            </a>
                           <?php } 
                           else { ?>
                           <a data-tooltip="<?php echo esc_attr('Register or Login','atomy');?>" class="register-contents" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id')) ); ?>">
                             <i class="far fa-user"></i>
                           </a>
                           <?php } ?>
                            </li>
                            <?php endif; ?>	
                             <!-- Wishlist -->
                             <?php if ( false ==  get_theme_mod( 'atomy_enable_wishlist_icon', true) ):?>
                            <li class="user">
                            <div data-tooltip="<?php echo esc_attr('Wishlist','atomy');?>">
                            <?php echo do_shortcode("[ti_wishlist_products_counter]");?>
                           </div>
                           </li>
                           <?php endif; ?>
                           <!-- Cart -->
                           <?php if ( false ==  get_theme_mod( 'atomy_enable_cart_icon', true) ):?>	
                            <li class="cart">
                           <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'atomy_active_plugins', get_option( 'active_plugins' ) ) ) ) {
                            $atomy_count = WC()->cart->cart_contents_count;
                            ?>
                            <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" data-tooltip="<?php echo esc_attr('Go to the cart','atomy');?>">
                               <i class="<?php echo esc_attr( get_theme_mod( 'at_icon_cart_change','fas fa-shopping-cart')); ?>"></i>
                            <?php 
                            if ( $atomy_count > 0 ) {
                            ?>
                            <span class="cart-contents-count"><?php echo esc_html( $atomy_count,'atomy' ); ?></span>
                           <?php  }?>
                           </a>
                          </li>
                          <?php } ?>
                          <?php endif; ?>	
                        </ul>
                </div>
                </div>
    </div>
    </header>
    <div class="at-border-top-menu <?php if ( false == get_theme_mod('atomy_enable_full_menu_header', true) ):?>container-fluid pl-0 pr-0 <?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_menu_header', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
    </div>


