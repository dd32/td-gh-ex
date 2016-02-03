<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
/*
	woocommerce_output_content_wrapper
		woocommerce_breadcrumb
		woocommerce_taxonomy_archive_description
		woocommerce_product_archive_description
		woocommerce_result_count
		woocommerce_catalog_ordering
		woocommerce_pagination
	woocommerce_output_content_wrapper_end
	woocommerce_get_sidebar
*/
?>

<div class="container">
<div class="row">

<div id="primary" class="content-area col-md-9">
<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">
	<?php woocommerce_breadcrumb();?>
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="element-title page-title">
			<?php woocommerce_page_title(); ?>
		</h1>
	<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' );?>

		<?php if ( have_posts() ) : ?>

			<div class="shop-controls__top col-md-12">
			<div class="row">
				<div class="col-md-8"><?php woocommerce_result_count();?></div>
				<div class="col-md-4"><?php woocommerce_catalog_ordering();?></div>
			</div>
			</div>

			<?php // do_action( 'woocommerce_before_shop_loop' ); ?>

			<?php woocommerce_product_loop_start(); ?>
			<?php woocommerce_product_subcategories(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php wc_get_template_part( 'content', 'product' ); ?>
			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
</main>
</div>



	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
</div>
</div>
<?php get_footer( 'shop' ); ?>
