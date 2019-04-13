<?php
/**
 * Agency_Ecommerce_Header_Hooks setup
 *
 * @package Agency_Ecommerce_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Header_Hooks Class.
 *
 * @class Agency_Ecommerce_Header_Hooks
 */
final class Agency_Ecommerce_Header_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_Header_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_Header_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_Header_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_aec_addons()
     * @return Agency_Ecommerce_Header_Hooks - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->hooks();

        return self::$_instance;
    }

    public function hooks()
    {
        add_action('agency_ecommerce_doctype', array($this, 'agency_ecommerce_doctype_action'), 10);
        add_action('agency_ecommerce_head', array($this, 'agency_ecommerce_head_action'), 10);
        add_action('agency_ecommerce_top_header', array($this, 'agency_ecommerce_top_header_action'), 10);
        add_action('agency_ecommerce_top_header_store_information', array($this, 'agency_ecommerce_top_header_store_information_action'), 10);
        add_action('agency_ecommerce_top_header_menu', array($this, 'agency_ecommerce_top_header_menu_action'), 10);
        add_action('agency_ecommerce_top_header_current_date', array($this, 'agency_ecommerce_top_header_current_date_action'), 10);
        add_action('agency_ecommerce_before_header', array($this, 'agency_ecommerce_before_header_action'), 10);
        add_action('agency_ecommerce_header', array($this, 'agency_ecommerce_header_action'), 10);
        add_action('agency_ecommerce_after_header', array($this, 'agency_ecommerce_after_header_action'), 10);

        $special_menu = agency_ecommerce_get_option('special_menu');

        if($special_menu) {
            add_action('agency_ecommerce_main_content', array($this, 'agency_ecommerce_special_menu_action'), 10);
        }

    }

    public function agency_ecommerce_doctype_action()
    {

        ?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php

    }

    public function agency_ecommerce_head_action(){
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php
    }

    public function agency_ecommerce_top_header_action() {

        // Top header status.
        $header_status = agency_ecommerce_get_option( 'show_top_header' );
        if ( 1 != $header_status ) {
            return;
        } ?>

        <div id="top-bar" class="top-header">
            <div class="container">
                <div class="top-left">

                    <?php

                    // Top Left type.
                    $top_left_type  = agency_ecommerce_get_option( 'top_left_type' );

                    if( 'current-date' === $top_left_type ) {

                        do_action( 'agency_ecommerce_top_header_current_date' );

                    }elseif( 'menu' === $top_left_type ) {

                        do_action( 'agency_ecommerce_top_header_menu' );

                    }elseif( 'social-icons' === $top_left_type && has_nav_menu( 'social' ) ){ ?>

                        <div class="top-social-menu menu-social-menu-container social-widget-left">

                            <?php the_widget( 'Agency_Ecommerce_Social_Widget' ); ?>

                        </div><!-- .social-widgets -->

                        <?php

                    }else{

                        do_action( 'agency_ecommerce_top_header_store_information' );

                    } ?>

                </div>

                <div class="top-right">
                    <?php

                    $show_social_icons  = agency_ecommerce_get_option( 'show_social_icons' );

                    if( true === $show_social_icons && has_nav_menu( 'social' ) ){ ?>

                        <div class="top-social-menu menu-social-menu-container">

                            <?php the_widget( 'Agency_Ecommerce_Social_Widget' ); ?>

                        </div>
                        <?php
                    }

                    // Login/Register
                    $show_login_logout  = agency_ecommerce_get_option( 'show_login_logout' );
                    $login_icon         = agency_ecommerce_get_option( 'login_icon' );

                    if( true == $show_login_logout ){

                        if (is_user_logged_in()) { ?>

                            <div class="top-account-wrapper logged-in">
                                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                    <i class="fa <?php echo esc_attr( $login_icon ); ?>" aria-hidden="true"></i>
                                    <span class="top-log-out"><?php esc_html_e('Log Out', 'agency-ecommerce'); ?></span>
                                </a>
                            </div>

                            <?php
                        }else{

                            $login_text  = agency_ecommerce_get_option( 'login_text' );

                            ?>

                            <div class="top-account-wrapper logged-out">
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                                    <i class="fa <?php echo esc_attr( $login_icon ); ?>" aria-hidden="true"></i>
                                    <span class="top-log-in"><?php echo esc_html( $login_text ); ?></span>
                                </a>
                            </div>

                            <?php

                        }
                    } // Login/Register ends

                    // Wishlist details
                    $show_wishlist  = agency_ecommerce_get_option( 'show_wishlist' );
                    $wishlist_icon  = agency_ecommerce_get_option( 'wishlist_icon' );

                    if( true == $show_wishlist && !empty( $wishlist_icon ) && class_exists( 'YITH_WCWL' ) ){ ?>
                        <div class="top-wishlist-wrapper">
                            <div class="top-icon-wrap">
                                <?php

                                $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );

                                if ( absint( $wishlist_page_id ) > 0 ) : ?>

                                    <a class="wishlist-btn" href="<?php echo esc_url( get_permalink( $wishlist_page_id ) ); ?>"><i class="fa <?php echo esc_attr( $wishlist_icon ); ?>" aria-hidden="true"></i><span class="wish-value"><?php echo absint( yith_wcwl_count_products() ); ?></span></a>

                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }

                    // Cart details
                    $show_cart  = agency_ecommerce_get_option( 'show_cart' );
                    $cart_icon  = agency_ecommerce_get_option( 'cart_icon' );

                    if( true == $show_cart && !empty( $cart_icon ) && class_exists( 'WooCommerce' ) ){ ?>
                        <div class="top-cart-wrapper">
                            <div class="top-icon-wrap">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                    <i class="fa <?php echo esc_attr( $cart_icon ); ?>" aria-hidden="true"></i>
                                    <span class="cart-value ec-cart-fragment"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                                </a>
                            </div>
                            <div class="top-cart-content">
                                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                            </div>
                        </div>
                        <?php
                    }

                    $show_top_search  = agency_ecommerce_get_option( 'show_top_search' );

                    if( true === $show_top_search && class_exists( 'WooCommerce' ) ){ ?>

                        <div class="search-holder">

                            <a href="#" class="search-btn"><i class="fa fa-search"></i></a>

                            <div class="search-box" style="display: none;">

                                <?php

                                if ( class_exists( 'WooCommerce' ) ) {

                                    // For search products placeholder text
                                    $search_products_text  = agency_ecommerce_get_option( 'search_products_text' );

                                    if( !empty( $search_products_text ) ){

                                        $product_search_text = esc_attr( $search_products_text );

                                    }else{

                                        $product_search_text =  esc_attr_x( 'Search Products &hellip;', 'placeholder', 'agency-ecommerce' );
                                    }

                                    // For select category text
                                    $select_category_text  = agency_ecommerce_get_option( 'select_category_text' );

                                    if( !empty( $select_category_text ) ){

                                        $product_category_text = esc_html( $select_category_text );

                                    }else{

                                        $product_category_text =  esc_html__( 'Select Category', 'agency-ecommerce' );
                                    }

                                 ?>

                                    <div class="product-search-wrapper">

                                        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <input type="hidden" name="post_type" value="product" />

                                            <input type="text" class="search-field products-search" placeholder="<?php echo $product_search_text; ?>" value="<?php echo get_search_query(); ?>" name="s" />

                                            <select class="product-cat" name="product_cat">

                                                <option value=""><?php echo $product_category_text; ?></option>

                                                <?php

                                                $categories = get_categories( 'taxonomy=product_cat' );

                                                foreach ( $categories as $category ) {

                                                    $option = '<option value="' . esc_attr( $category->category_nicename ) . '"'.agency_ecommerce_selected_category( $category->category_nicename ).'>';

                                                    $option .= esc_html( $category->cat_name );

                                                    $option .= ' (' . absint( $category->category_count ) . ')';

                                                    $option .= '</option>';

                                                    echo $option;

                                                } ?>

                                            </select>

                                            <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'agency-ecommerce' ); ?></span><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>


                                    </div> <!-- .product-search-wrapper -->
                                <?php } ?>

                            </div>
                        </div><!-- .search-holder -->
                        <?php
                    } ?>
                </div>

            </div>
        </div>
        <?php
    }

    public function agency_ecommerce_top_header_store_information_action() {

        $top_address    = agency_ecommerce_get_option( 'top_address' );
        $top_phone      = agency_ecommerce_get_option( 'top_phone' );
        $top_email      = agency_ecommerce_get_option( 'top_email' );
        if( !empty( $top_address ) || !empty( $top_phone ) || !empty( $top_email ) ){ ?>
        <div class="top-left-inner">
            <?php if( !empty( $top_address ) ){ ?>
                <span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( $top_address ); ?></span>
            <?php } ?>

            <?php if( !empty( $top_phone ) ){ ?>
                <span class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( $top_phone ); ?></span>
            <?php } ?>

            <?php if( !empty( $top_email ) ){ ?>
                <span class="fax"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html( $top_email ); ?></span>
            <?php } ?>

        </div><?php
}
}

    public function agency_ecommerce_top_header_menu_action() {
            ?><div class="top-menu-holder">
                <?php
                if( has_nav_menu( 'top' ) ){
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top',
                            'menu_id'        => 'top-menu',
                            'depth'          => 1,
                        )
                    );
                } ?>
            </div>
            <?php
    }

    public function agency_ecommerce_top_header_current_date_action() {
            ?>

        <div class="top-date-holder"><span><?php echo date( get_option( 'date_format' ) ); ?></span></div>

        <?php
    }

    public  function agency_ecommerce_before_header_action() {
        ?><header id="masthead" class="site-header" role="banner"><div class="container"><?php
    }

    public function agency_ecommerce_header_action() {
        ?>
        <div class="head-wrap">
            <div class="site-branding">
                <?php

                $site_identity = agency_ecommerce_get_option( 'site_identity' );

                if( 'logo-only' == $site_identity ){

                    agency_ecommerce_the_custom_logo();

                }elseif( 'logo-desc' == $site_identity ){

                    agency_ecommerce_the_custom_logo();

                    $description = get_bloginfo( 'description', 'display' );

                    if ( $description || is_customize_preview() ) : ?>

                        <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                    <?php
                    endif;

                }else{ ?>

                    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

                    <?php
                    $description = get_bloginfo( 'description', 'display' );

                    if ( $description || is_customize_preview() ) : ?>

                        <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                    <?php
                    endif;
                } ?>
            </div><!-- .site-branding -->

            <div id="main-nav" class="clear-fix">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="wrap-menu-content">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'fallback_cb'    => 'agency_ecommerce_primary_navigation_fallback',
                            )
                        );
                        ?>
                    </div><!-- .menu-content -->
                </nav><!-- #site-navigation -->
            </div> <!-- #main-nav -->
        </div>
<?php
}

    public function agency_ecommerce_after_header_action() {

        ?></div><!-- .container --></header><!-- #masthead --><?php
    }

    public function agency_ecommerce_special_menu_action(){

        $special_menu_text = 'Special Menu';

        ?>
<nav class="container special-menu-container">
        <ul class="menu special-menu-wrapper">
            <li class="menu-item menu-item-has-children">
                <?php
                if ( has_nav_menu( 'special-menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'special-menu',
                        'menu_class' => 'sub-menu special-sub-menu',
                        'container' => false
                    ) );
                }
                ?>
                <div class="responsive-special-sub-menu clearfix"></div>
            </li>
        </ul>
</nav><?php

    }


}

Agency_Ecommerce_Header_Hooks::instance();