<?php
/** not_menu_head_right.php
 *
 * Template Name: Logo not in head. Sidebar Right
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Athenea
 */

get_header(); ?>

<div class="container">
   <div class="row transbody">    
    <div id="primary" class="col-md-8">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
	</div><!-- #primary col-md-8 -->
    <div class="col-md-4">
	  <div class="well_sidebar">
       <?php get_sidebar(); ?>
      </div>
    </div><!-- col-md-4 -->
   </div><!-- /row -->
</div><!--/container-->

<?php
get_template_part( 'parts/content', 'footmenu' );
get_footer(); ?>