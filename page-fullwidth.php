<?php
/**
* Template Name: Full Width Page
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*/

get_header();
?>

<?php if( !is_front_page() ) : ?>
<div class="u-full-width">
     <div class="row">
         <div class="twelve columns">
<?php endif; ?>

<?php
    if( is_front_page() ) :
        get_template_part( 'template-parts/home/ct', 'banner' );
        get_template_part( 'template-parts/home/ct', 'info-boxes' );
        get_template_part( 'template-parts/home/ct', 'introduction' );
        get_template_part( 'template-parts/home/ct', 'portfolio' );
        get_template_part( 'template-parts/home/ct', 'news' );
    else :
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content/content', 'blank' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            endwhile; // End of the loop.
        else :

            get_template_part( 'template-parts/content/content', 'none' );

        endif;
    endif;
?>

<?php if( !is_front_page() ) : ?>
        </div><!-- /.twelve columns -->
        <?php get_sidebar(); ?>
    </div><!-- /.row -->
</div><!-- /.u-full-width -->
<?php endif; ?>

<?php
get_footer();
