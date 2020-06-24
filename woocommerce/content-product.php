<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

            <section itemscope itemtype="http://schema.org/Product">

                <?php edit_post_link( __( 'Edit this Product' , 'semper-fi-lite' ) ); ?>

                <div itemprop="brand" itemtype="http://schema.org/Thing" itemscope>

                    <meta itemprop="name" content="<?php esc_attr( bloginfo( 'name' ) );?>" />

                </div>

                <h5>

                    <a href="<?php the_permalink() ?>"><span itemprop="name" content="<?php the_title(); ?>" ><?php the_title(); ?></span></a>

                </h5>

                <a href="<?php the_permalink() ?>">

                    <?php the_post_thumbnail( '500x500' , array( 'class' => 'store-front-image', 'itemprop' => 'image')); ?>

                </a>

                <p itemprop="description" content="<?php echo esc_attr( $product->get_short_description() ); ?>"><?php echo $product->get_short_description(); ?></p>

                <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                    <meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />

                    <a href="<?php the_permalink() ?>" itemprop="url"><?php echo get_woocommerce_currency_symbol(); ?><span itemprop="price" itemprop="lowPrice"><?php echo floor( $product->get_price() ); ?></span></a>

                    <meta itemprop="availability" content="https://schema.org/InStock" />

                </div>

                <?php do_action('semper_fi_lite_woo_commerce_add_to_cart'); ?>

            </section>
