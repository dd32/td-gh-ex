<?php
/**
 * Used to display archive-type pages for posts in a tag.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

get_header(); ?>

<div class="inner">
    <div id="main-content">
       <?php if ( have_posts() ) : ?>

            <header class="archive-header">
                <h1 class="archive-title"><?php printf( __( 'All articles about', 'aguafuerte' ).' %s', ucfirst( single_tag_title( '', false )) ); ?></h1>

                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                ?>
            </header><!-- .archive-header -->

            <?php
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
                    aguafuerte_blog_navigation();

                else :
                    // If no content, include the "No posts found" template.
                    get_template_part( 'template-parts/content', 'none' );

                endif;
            ?>

    </div><!--/main-content-->
    <?php get_sidebar('sidebar'); ?>  
    

</div><!--/inner-->

<?php get_footer(); ?>

