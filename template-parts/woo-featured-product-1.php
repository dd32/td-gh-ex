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

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
// Increase loop count
$woocommerce_loop['loop']++;
?>
<li itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="col-sm-5 front__product-featured__image">
	<a property="url" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail();?>
	</a>
</div>
<div class="col-sm-7 front__product-featured__text">
<div class="row">
	<div class="col-sm-7 element-title product-featured__title">
			<a property="url" href="<?php the_permalink(); ?>">
			<?php woocommerce_template_single_title();?>
			</a>
	</div>
	<div class="col-sm-5 product-featured__price">
		<?php woocommerce_template_single_price();?>
	</div>
	<div class="col-sm-12 product-featured__description">
		<?php woocommerce_template_single_excerpt();?>
	</div>
		<?php
		$args = array (
			'post_type' => 'product',
			'post_id' => $product->id,
			'number' => 1,
			'no_found_rows' => true,
			'status' => 'approve',
		);
		$comments = get_comments($args);
		foreach($comments as $comment) :?>
		<div class="col-sm-12 product-featured__review" itemprop="review" itemscope itemtype="http://schema.org/Review">
			<div class="product-featured__review--centered clearfix">
				<div class="col-sm-4 text-center featured__review-card--left">
					<?php echo get_avatar( $comment, 60 ); ?>
					<span class="featured__review__author" itemprop="author"><?php echo $comment->comment_author;?></span>
					<span class="featured__review__rating">
					<a href="<?php the_permalink(); ?>#reviews">
					<?php echo $product->get_rating_html();?>
					</a></span>
				</div>
				<div class="col-sm-8 text-center featured__review-card--right">
					<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
						<p class="featured__review__content" itemprop="description">
						<?php echo $comment->comment_content;?></p>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
	<div class="col-sm-12 product-featured__add-cart">
		<?php woocommerce_template_loop_add_to_cart();?>
	</div>
</div>
</div>
</li>