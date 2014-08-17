<?php
/**
 * Template Name: Left Sidebar
 *
 * Description: Page with left sidebar
 *
 * @package Avrora

 */

get_header(); ?>

    <section class="content inside">
        <div class="wrap">
            <?php while (have_posts()) : the_post(); ?>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } ?>
                <div class="left-part rights">
                    <?php get_template_part('content', 'sidebars'); ?>
                    <?php comments_template(); ?>
                </div>
                <div class="right-part lefts post-cont">
                    <?php dynamic_sidebar( 'page' ); ?>
                </div>
            <?php endwhile; // end of the loop. ?>
        </div>
    </section>

<?php get_footer(); ?>