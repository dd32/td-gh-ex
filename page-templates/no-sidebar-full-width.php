<?php
/**
 * Template Name: Full Width, No Sidebar
 *
 * Description: This template can be used as blog posts page when using a static front page if a blog page without sidebars is preferred.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

get_header(); ?>

<div class="inner no-sidebar">
    <div id="main-content">
        <?php
            if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'page' );

                endwhile;

                // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'bassist' ),
                'next_text'          => __( 'Next page', 'bassist' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bassist' ) . ' </span>',
            ) );

            if ( comments_open() || get_comments_number() ):
                comments_template();
            endif;

            else :
                // If no content, include the "No posts found" template.
                get_template_part( 'template-parts/content', 'none' );

            endif;
        ?>
        
    </div><!--/main-content-->    

</div><!--/inner-->


<?php get_footer(); ?>

