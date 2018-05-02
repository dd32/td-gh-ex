<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package a-portfolio
 */

get_header();
?>
<section id="blog" class="single section page">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12">
      		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <!-- Blog Sidebar -->
        <div class="blog-sidebar">
         	<?php get_sidebar();?>
        </div>
        <!--/ End Blog Sidebar -->
      </div>
    </div>
  </div>
</section>

<?php
get_footer();?>
