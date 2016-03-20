<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
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
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
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
                // Previous/next post navigation.
                // aguafuerte_paging_nav();


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

