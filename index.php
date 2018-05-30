<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package a-portfolio
 */

get_header();
?>
<!-- Start blog -->
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

    <div class="row">
		<div class="pagination">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php the_posts_navigation();?>
			</div>
		</div>
	</div>
  </div>
</section>

<?php
get_footer();
