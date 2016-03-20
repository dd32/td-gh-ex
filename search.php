<?php
/**
 * The template for displaying search results pages
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
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'aguafuerte' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
            </header><!-- .page-header -->

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'search' );

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'aguafuerte' ),
                'next_text'          => __( 'Next page', 'aguafuerte' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
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

