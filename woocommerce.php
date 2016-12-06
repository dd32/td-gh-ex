<?php
/**
 * The template for displaying the woocommerce shop
 *
 */

get_header(); ?>

<div id="primary" class="content-area">

  <div class="row" role="main">

    <div class="large-12 columns ">

  		<main id="main" class="site-main" role="main">

        <?php woocommerce_content(); ?>

  		</main><!-- #main -->

    </div>

  </div><!-- .row -->

</div><!-- #primary -->

<?php get_footer(); ?>
