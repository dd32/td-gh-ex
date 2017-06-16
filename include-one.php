<?php
/*
Template Name: Include One
Description: Create a Page with 'content-one' as a slug name and it will be included in this Template, after the content from this page. You could use this template when you want to include/use the same content on many pages.
*/

get_header(); ?>
 
<div id="content" class="site-content full-width-template">
	<div class="site-content-inner">

		<div id="primary" class="content-area full-width-template">
			<main id="main" class="site-main">

			<?php 
				while ( have_posts() ) : the_post(); 

					get_template_part( 'content', 'page' );

				endwhile; // end of the loop. 
			?>

			</main><!-- #main -->

		<?php
			// Include content from include-one page (slug name MUST be: content-one)
			get_template_part( 'template-parts/include-one-inner' ); 
		?>
		</div><!-- #primary -->

<?php 
get_footer();