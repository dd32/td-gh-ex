<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BeeThemes
 * @subpackage BeeTech
 * @since 1.0.0
 */

get_header(); ?>
<div class="bt-wrapper">
<div class="content-wrap-main">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
    		<?php
    		while ( have_posts() ) : the_post();
    
    			get_template_part( 'template-parts/content', 'single' );
    
    			the_post_navigation();
    
    			// If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) :
    				comments_template();
    			endif;
    
    		endwhile; // End of the loop.
    		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
beetech_get_sidebar();
?></div>
</div><?php
get_footer();
