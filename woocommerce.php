<?php
/**
 * The template for displaying all woocommece pages.
 *
 * @package Basic Shop
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php 
                  woocommerce_content(); 
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
do_action( 'igthemes_sidebar' );
get_footer();
