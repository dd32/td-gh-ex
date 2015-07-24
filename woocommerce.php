<?php
/**
 * The template for displaying WooCommerce pages.
 *
 * @package BBird Under
 */

get_header(); ?>

		<main id="primary" class="site-main large-8 columns" role="main">
                   
                     <?php woocommerce_content(); ?>
                    
		</main><!-- #main -->
                

	
<div id="secondary" class="widget-area large-4 columns" role="complementary">
     <?php dynamic_sidebar('woocommerce_sidebar'); ?>
</div>
<?php get_footer(); ?>
