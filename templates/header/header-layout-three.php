<?php global $woocommerce; ?>

<?php if( get_theme_mod( 'topshop-show-header-top-bar', customizer_library_get_default( 'topshop-show-header-top-bar' ) ) ) : ?>
    
    <div class="site-top-bar border-bottom">
        <div class="site-container">
            
            <div class="site-top-bar-left">
                
                <?php do_action ( 'topshop_inside_top_bar_left_left' ); ?>
                
                <?php wp_nav_menu( array( 'theme_location' => 'top-bar', 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
                
                <?php do_action ( 'topshop_inside_top_bar_left_right' ); ?>
                
            </div>
            <div class="site-top-bar-right">
                
                <?php do_action ( 'topshop_inside_top_bar_right_left' ); ?>
                
                <div class="site-top-bar-left-text"><?php echo wp_kses_post( get_theme_mod( 'topshop-header-info-text', 'Call Us: 082 444 BOOM' ) ) ?></div>
                
                <?php do_action ( 'topshop_inside_top_bar_right_right' ); ?>
                
            </div>
            <div class="clearboth"></div>
            
            <?php if ( get_theme_mod( 'topshop-header-search' ) ) : ?>
                <div class="search-block">
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
            
        </div>
        
    </div>

<?php endif; ?>

<div class="site-container">
    
    <div class="site-header-left">
        
        <?php if( get_header_image() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-img" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" /></a>
        <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <?php endif; ?>
        
    </div><!-- .site-branding -->
    
    <div class="site-header-right">
        
        <?php get_template_part( '/templates/social-links' ); ?>
        
    </div>
    <div class="clearboth"></div>
    
</div>

<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'topshop-sticky-header', false ) ) ? sanitize_html_class( 'header-stick' ) : ''; ?>" role="navigation">
    <span class="header-menu-button"><i class="fa fa-bars"></i><span><?php _e( 'Menu', 'topshop' ); ?></span></span>
    <div id="main-menu" class="main-menu-container">
        <span class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></span>
        <div class="site-container">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            
            <?php if ( topshop_is_woocommerce_activated() ) : ?>
                <?php if ( !get_theme_mod( 'topshop-header-remove-cart', false ) ) : ?>
                    <div class="header-cart">
                        <a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'topshop' ); ?>">
                            <span class="header-cart-amount">
                                <?php echo sprintf( _n( '(%d)', '(%d)', WC()->cart->get_cart_contents_count(), 'topshop' ), WC()->cart->get_cart_contents_count() ); ?><span> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
                            </span>
                            <span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
                                <i class="fa <?php echo ( get_theme_mod( 'topshop-cart-icon' ) ) ? sanitize_html_class( get_theme_mod( 'topshop-cart-icon' ) ) : sanitize_html_class( 'fa-shopping-cart' ); ?>"></i>
                            </span>
                        </a>
                        
                        <?php if ( get_theme_mod( 'topshop-header-add-drop-cart' ) ) : ?>
                            <div class="site-header-cart">
                                <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <div class="clearboth"></div>
        </div>
    </div>
</nav><!-- #site-navigation -->