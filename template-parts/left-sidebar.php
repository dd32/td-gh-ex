<?php
/*
 * Template Name: Left Sidebar
 * Template Post Type: post, page, product
 */
  
get_header(); ?>
 
    <div id="primary" class="content-area left-sidebar">
        <main id="main" class="site-main" role="main">
 
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
 
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );
 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
 
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'best-minimalist' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'best-minimalist' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'best-minimalist' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'best-minimalist' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
 
        // End the loop.
        endwhile;
        ?>
 
        </main><!-- .site-main -->
    </div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>