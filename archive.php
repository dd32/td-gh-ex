<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package atlas_concern
 */

get_header();
?>

<div class="page-banner">
	<div class="container">
		<div class="row">
		  <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3><?php
				the_archive_title();
				the_archive_description();
				?>
			</h3>
		    <div class="breadcrumb">
			   <ul>
			   <li><?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?></li>
			   </ul>
			</div>	
         </div>
        </div>
   </div>
</div>
	<div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<?php if ( have_posts() ) : ?>

			<?php
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

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	
	   </div>	
	   <?php get_sidebar(); ?>
   </div>
  </div>

<?php
get_footer();