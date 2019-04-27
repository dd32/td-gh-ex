<?php
/**
 *  WooCommerce.
 */
get_header(); ?>

    <section class="content-wrapper woocommerce-wrapper">
        <div class="content-container">
            <div class="container">
                <div class="row">

                    <div class="eight columns">

                        <?php if (have_posts()) : ?>
                            <?php woocommerce_content(); ?>
                        <?php endif; ?>
                        
                    </div>

                    <div class="four columns">

                        <?php get_sidebar(); ?>
                        
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>
