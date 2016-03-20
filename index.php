<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

// $aguafuerte_theme_options = aguafuerte_get_options( 'aguafuerte_theme_options' );
get_header(); ?>

<div class="inner">
    <div id="main-content">
        <div id="posts" class="posts">
        <?php
            if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'aguafuerte' ),
                'next_text'          => __( 'Next page', 'aguafuerte' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
            ) );


            else :
                // If no content, include the "No posts found" template.
                get_template_part( 'template-parts/content', 'none' );

            endif;
        ?>
        <div class="clearfix"></div>
        </div><!--/posts-->
        
    </div><!--/main-content-->

    <?php get_sidebar('sidebar'); ?>  
    

</div><!--/inner-->


<div class="clearfix"></div>
<?php get_footer(); ?>

