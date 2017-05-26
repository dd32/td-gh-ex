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
 * @since Aguafuerte 1.0.2
 */

get_header(); ?>

<div class="inner">
    <div id="main-content">        
        <?php if ( have_posts() ) : ?>

        <header class="archive-header">
            <h1 class="archive-title"><?php printf( __( 'All articles in', 'aguafuerte' ).' %s', single_cat_title('', false)  ); ?></h1>
            <?php
            // Show an optional term description.
            $term_description = term_description();
            if ( ! empty( $term_description ) ) :
                printf( '<div class="taxonomy-description">%s</div>', $term_description );
            endif; ?>
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
            // Previous/next post navigation.
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

