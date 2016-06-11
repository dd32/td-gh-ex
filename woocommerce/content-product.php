<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $post;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
    $woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
    return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array('col-lg-4 col-md-4 col-sm-6 col-xs-12');
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
    $classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
    $classes[] = 'last';
}
?>
<div <?php post_class( $classes ); ?> >
    <div class="shop_item">
        <div class="entry">
            <?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
            <div class="magnifier">
                <div class="buttons">
                   <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                </div><!-- end buttons -->
            </div><!-- end magnifier -->
        </div><!-- end entry -->
        <div class="shop_desc">
            <div class="shop_title pull-left">
                <a href="<?php echo get_permalink($product->id); ?>"><span><?php echo get_the_title($product->id); ?></span></a>
                <span class="cats"><?php //echo $product->get_categories( ', ', '' . _n( '', '', $cat_count, 'woocommerce' ) . '	', '' ); ?></span>
            </div><br>
            <span class="price pull-left"><?php echo $product->get_price_html(); ?></span>
        </div><!-- end shop_desc -->
    </div><!-- end item -->
</div><!-- end col-lg-3 -->
    