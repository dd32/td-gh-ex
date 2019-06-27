<?php
/**
 * Agency_Ecommerce_WooCommerce_Hooks setup
 *
 * @package Agency_Ecommerce_WooCommerce_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_WooCommerce_Hooks Class.
 *
 * @class Agency_Ecommerce_WooCommerce_Hooks
 */
class Agency_Ecommerce_WooCommerce_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_WooCommerce_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_WooCommerce_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_WooCommerce_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_WooCommerce_Hooks - Main instance.
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
        // Remove actions
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        // Remove sorting option
        $hide_product_sorting = agency_ecommerce_get_option('hide_product_sorting');
        if (true === $hide_product_sorting) {
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
        }
        // Disable Related Products
        $disable_related_products = agency_ecommerce_get_option('disable_related_products');
        if (true === $disable_related_products) {
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        }


        add_filter('loop_shop_columns', array($this, 'product_columns'));
        add_filter('woocommerce_output_related_products_args', array($this, 'related_products_args'));
        add_action('woocommerce_after_single_product_summary', array($this, 'output_upsells'), 15);
        add_action('woocommerce_shop_loop_item_title', array($this, 'woocommerce_template_loop_product_title'), 10);
        add_action('woocommerce_sidebar', array($this, 'woocommerce_sidebar'), 10);
        add_filter('loop_shop_per_page', array($this, 'new_loop_shop_per_page'), 20);
        add_filter('woocommerce_add_to_cart_fragments', array($this, 'header_add_to_cart_fragment'));


    }


    public function product_columns()
    {

        $product_number = agency_ecommerce_get_option('product_number');

        return absint($product_number); // number of products per row
    }

    public function related_products_args($args)
    {

        $product_number = agency_ecommerce_get_option('product_number');

        $args['columns'] = absint($product_number);

        $args['posts_per_page'] = absint($product_number); // number of related products

        return $args;
    }

    public function output_upsells()
    {

        $product_number = agency_ecommerce_get_option('product_number');

        woocommerce_upsell_display(absint($product_number), absint($product_number)); // Display 3 products in rows of 3

    }

    public function woocommerce_template_loop_product_title()
    {
        echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
        echo '</a>';
    }

    public function woocommerce_sidebar()
    {

        $shop_layout = agency_ecommerce_get_option('shop_layout');

        $shop_layout = apply_filters('agency_ecommerce_filter_theme_global_layout', $shop_layout);

        // Include sidebar.
        if ('no-sidebar' !== $shop_layout) {
            get_sidebar();
        }
    }

    public function new_loop_shop_per_page($cols)
    {

        $product_per_page = agency_ecommerce_get_option('product_per_page');

        $cols = absint($product_per_page);

        return $cols;
    }

    public function header_add_to_cart_fragment($fragments)
    {

        global $woocommerce;

        ob_start(); ?>

        <span class="cart-value ae-cart-fragment"> <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span>

        <?php

        $fragments['span.ae-cart-fragment'] = ob_get_clean();

        return $fragments;

    }

}

Agency_Ecommerce_WooCommerce_Hooks::instance();