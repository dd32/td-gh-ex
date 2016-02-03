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

global $product, $woocommerce_loop;

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
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>

<div data-sr="enter left, move 40px, wait 0.2s" itemscope itemtype="http://schema.org/Product" <?php post_class( 'prodcut-card col-md-3 col-sm-6' ); ?>>
<div class="product-card__inner">
	<a property="url" href="<?php the_permalink(); ?>">
		<?php woocommerce_show_product_loop_sale_flash();?>
		<?php woocommerce_template_loop_product_thumbnail();?>
	</a>
	<div class="product-card__info">
		<div itemprop="name" class="product-card__info__product">
			<a property="url" href="<?php the_permalink(); ?>"><?php woocommerce_template_loop_product_title();?></a>
		</div>
		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="product-card__info__price">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span itemprop="price" class="price"><?php echo $price_html; ?></span>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>





