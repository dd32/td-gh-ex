<?php
/**
 * Template Name: Page Sidebar Left
 *
 * @package Base WP
 */

get_header(); ?>

<?php get_sidebar();?>

    <div id="primary" class="content-area col9 last">
        <main id="main" class="site-main" role="main">

            <?php igthemes_before_single(); ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'page' ); ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            <?php endwhile; // end of the loop. ?>

            <?php igthemes_after_single(); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
