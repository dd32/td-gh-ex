<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

global $product;

if ( empty( $product ) || ! $product->is_visible() ) { return; }
?>
<div data-sr="enter left, move 40px, wait 0.2s" itemscope itemtype="http://schema.org/Product" class="product <?php echo get_option('woo_product_new_row', 'col-sm-3' );?>">
<div class="product-card__inner">
	<?php woocommerce_template_loop_product_link_open();?>
	<?php woocommerce_show_product_loop_sale_flash();?>
	<?php woocommerce_template_loop_product_thumbnail();?>
	<?php woocommerce_template_loop_product_link_close();?>

	<div class="product-card__info">
		<div itemprop="name" class="product-card__info__product">
			<?php woocommerce_template_loop_product_link_open();?>
			<?php woocommerce_template_loop_product_title();?>	
			<?php woocommerce_template_loop_product_link_close();?>
		</div>
		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="product-card__info__price">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span itemprop="price" class="price"><?php echo $price_html; ?></span>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>