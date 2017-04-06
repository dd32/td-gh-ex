<?php
/**
 * Template part for displaying single content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package auckland
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- <div class="not-full"> -->
        <!-- <div class="entry-meta"> -->
            <?php //auckland_entry_meta(); ?>
        <!-- </div> -->
        <div class="entry-content">
            <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'auckland' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
    <!-- </div> -->

    
    <footer class="entry-footer">
        <!-- <div class="not-full"> -->
            <?php do_action('auckland_entry_footer'); ?>
        <!-- </div> -->
        <?php auckland_template_related_posts(); ?>
        <!-- <div class="not-full"> -->
            <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif; ?>
        <!-- </div> -->
    </footer><!-- .entry-footer -->
    
</article><!-- #post-## -->