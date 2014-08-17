<?php
/**
 * The template for displaying single post
 *
 * @package Avrora
 */
get_header(); ?>

    <section class="content inside">
        <div class="wrap">
            <div class="left-part">
                <?php while (have_posts()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php get_template_part('content', 'page'); ?>
                    </div>
                <?php endwhile; // end of the loop. ?>
                <?php comments_template(); ?>
            </div>
            <div class="right-part">
                <?php dynamic_sidebar( 'blog' ); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
