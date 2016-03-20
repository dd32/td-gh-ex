<?php
/**
* The template for displaying Category pages
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
       
       <?php if ( have_posts() ) : ?>

            <header class="archive-header">
                <h1 class="archive-title"><?php printf( __( 'All articles in %s', 'aguafuerte' ), single_cat_title('', false)  ); ?></h1>
                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                ?>
            </header><!-- .archive-header -->
            <div class="flex-container">

            <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    if (! get_post_format()):
                    get_template_part( 'template-parts/content', 'article-1' );
                else:
                    get_template_part('template-parts/content', get_post_format());
                endif;

                    endwhile;
                    // Previous/next page navigation.
                    //aguafuerte_paging_nav();

                else :
                    // If no content, include the "No posts found" template.
                    get_template_part( 'template-parts/content', 'none' );

                endif;
            ?>
        <div class="clearfix"></div>
        
       </div><!--/main-content-->
    </div><!--/main-content-->
    <?php get_sidebar('sidebar'); ?>  
    

</div><!--/inner-->

<div class="clearfix"></div>
<?php get_footer(); ?>

