<?php

/*--------------------------------------------------------------
## WooCommerce Container Class
--------------------------------------------------------------*/

if ( ! function_exists( 'bellini_before_content' ) ):
	function bellini_before_content() { ?>
		<div class="bellini__canvas">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">
		<div class="row">
		<?php
	}
endif;

if ( ! function_exists( 'bellini_after_content' ) ):
	function bellini_after_content() { ?>
		</div>
		</main>
		</div>
		<?php
	}
endif;


/*--------------------------------------------------------------
## WooCommerce Product Items Container
--------------------------------------------------------------*/

if ( ! function_exists( 'bellini_before_shop_products' ) ):
	function bellini_before_shop_products() {
		if(esc_attr(get_option('bellini_show_woocommerce_sidebar', true) == true) && is_active_sidebar( 'sidebar-woo-sidebar' )){
			if(esc_attr(get_option('bellini_woocommerce_sidebar_position', 'right')) == 'right'):
				echo '<div class="col-md-9">';
			endif;
			// Left Sidebar
			if(esc_attr(get_option('bellini_woocommerce_sidebar_position', 'right')) == 'left'):
				echo '<div class="col-md-9 col-md-push-3">';
			endif;
		}else{
			echo '<div class="col-md-12">';
		}
	}
endif;


/*--------------------------------------------------------------
## WooCommerce Sidebar
--------------------------------------------------------------*/

if ( ! function_exists( 'bellini_woocommerce_shop_sidebar' ) ):
	function bellini_woocommerce_shop_sidebar() { ?>
		<?php
		if(esc_attr(get_option('bellini_show_woocommerce_sidebar', true) == true) && is_active_sidebar( 'sidebar-woo-sidebar' )){
			if(esc_attr(get_option('bellini_woocommerce_sidebar_position', 'right')) == 'right'):
				echo '<div class="woo-sidebar col-md-3">';
			endif;
			// Left Sidebar
			if(esc_attr(get_option('bellini_woocommerce_sidebar_position', 'right')) == 'left'):
				echo '<div class="woo-sidebar col-md-3 col-md-pull-9">';
			endif;
			dynamic_sidebar( 'sidebar-woo-sidebar' );
			echo '</div>';
		}
	}
endif;


/*--------------------------------------------------------------
## Shop / Archive - WooCommerce Products Per Page
--------------------------------------------------------------*/

add_filter( 'loop_shop_per_page', 'bellini_woo_product_per_page', 20 );
function bellini_woo_product_per_page( $count ) {
    return absint(get_option('bellini_woo_shop_product_per_page', 12));
}


/*--------------------------------------------------------------
## Bellini WooCommerce Price
--------------------------------------------------------------*/

if ( ! function_exists( 'bellini_woocommerce_template_loop_price' ) ):
	function bellini_woocommerce_template_loop_price() {
		global $product; ?>
		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="product-card__info__price">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span itemprop="price" class="price">
					<?php echo $price_html; ?>
				</span>
			<?php endif; ?>
		</div>
		<?php
	}
endif;

/*--------------------------------------------------------------
## Bellini WooCommerce Product Sorting
--------------------------------------------------------------*/

/* Layout 1 */

if ( ! function_exists( 'bellini_shop_archive_sorting_info' ) ):
	function bellini_shop_archive_sorting_info() { ?>
		<div class="col-md-12 woo__info__sorting">
		<div class="row">
			<div class="col-md-3">
				<?php woocommerce_catalog_ordering();?>
			</div>
			<div class="col-md-6 text-center">
				<?php woocommerce_result_count();?>
			</div>
			<div class="col-md-3 text-right">
				<?php bellini_pagination();?>
			</div>
		</div>
		</div>
		<?php
	}
endif;

/* Layout 2 */

if ( ! function_exists( 'bellini_woo_pagination_two_sorting' ) ):
	function bellini_woo_pagination_two_sorting() { ?>
		<div class="col-md-12 text-center pagination__sorting--l2">
			<?php
			esc_html_e('Sort by:','bellini');
			woocommerce_catalog_ordering();
			?>
		</div>
		<?php
	}
endif;


/*--------------------------------------------------------------
## WooCommerce Stylesheets
--------------------------------------------------------------*/

add_filter( 'woocommerce_enqueue_styles', 'bellini_woo__dequeue_styles' );
function bellini_woo__dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-layout'] );
	unset( $enqueue_styles['woocommerce-smallscreen'] );			// Remove the layout
	return $enqueue_styles;
}

/*--------------------------------------------------------------
## Product Items
--------------------------------------------------------------*/

/* Layout 1 */

if ( ! function_exists( 'bellini_before_woo_product_archive_item_one' ) ):
	function bellini_before_woo_product_archive_item_one() {
	$woo_product_column = esc_attr(get_option('bellini_woo_shop_product_column', 'col-sm-3' ));
	 ?>
		<div data-sr="enter left, move 40px, wait 0.2s" itemscope itemtype="http://schema.org/Product" class="<?php echo $woo_product_column; ?>">
		<div class="product-card__inner">
		<?php
	}
endif;


if ( ! function_exists( 'bellini_before_woo_archive_description_open' ) ):
	function bellini_before_woo_archive_description_open() { ?>
		<div class="col-sm-12">
		<?php
	}
endif;

if ( ! function_exists( 'bellini_woo_close_div' ) ):
	function bellini_woo_close_div() { ?>
		</div>
		<?php
	}
endif;



if ( ! function_exists( 'bellini_woo_product_info_archive_item' ) ):
	function bellini_woo_product_info_archive_item() { ?>
		<div class="product-card__info equal-height">
		<?php
	}
endif;


if ( ! function_exists( 'bellini_woo_product_info_title_archive_item' ) ):
	function bellini_woo_product_info_title_archive_item() { ?>
		<div itemprop="name" class="product-card__info__product">
		<?php
	}
endif;