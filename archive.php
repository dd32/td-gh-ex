<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Consulting
 */

get_header(); ?>

<?php
/**
* Hook - business_consulting_blog_layout_start.
*
* @hooked business_consulting_blog_layout_main_start - 10
* @hooked business_consulting_breadcrumbs - 20
* @hooked business_consulting_blog_wrapper_start - 30
* @hooked business_consulting_blog_columns_start - 40
*/
do_action('business_consulting_blog_layout_start');
?>		
    
            <?php
    if ( have_posts() ) :

      
        /* Start the Loop */
        while ( have_posts() ) : the_post();
        
            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;

      /**
		* Hook - business_consulting_loop_pagination.
		*
		* @hooked business_consulting_loop_pagination - 10
		*/
		do_action( 'business_consulting_loop_pagination');
		
    else :

        get_template_part( 'template-parts/content', 'none' );

    endif; ?>
            
            
<?php
/**
* Hook - business_consulting_blog_layout_end.
*
* @hooked business_consulting_blog_columns_end - 10
* @hooked business_consulting_blog_sidebar -20
* @hooked business_consulting_blog_wrapper_end - 30
* @hooked business_consulting_blog_layout_main_end - 10
*/
do_action('business_consulting_blog_layout_end');
?>	
    
<?php

get_footer();
