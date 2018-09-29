<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package atlas-concern
 */

get_header();
?>

<div class="top-header">
 <div class="container">
   <div class="row">
      <div class="col-md-8">
         <h1><?php the_title(); ?></h1>
      </div>
   </div>
  </div>
</div>

<div class="container">
<div class="row">
<div class="col-md-8">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content','single');

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		
	</div>
	<?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();
