<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop ;

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

?>

<article class="product-container masonry-element col-md-4">

	<div class="product-thumbnail">
        
        <?php echo woocommerce_get_product_thumbnail(); ?>
        
	</div>

    <div class="product-content">
    
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
        
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
        
 			<h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                
			<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        
        
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	
    </div>
    
</article>