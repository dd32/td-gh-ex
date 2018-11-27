<?php
/*
Template Name: No Title
Description: Use this template if you need titleless Page. What's more, it doesn't load Sidebar too. If you want Sidebar on this page, uncomment get_sidebar bellow.
*/
get_header();
?>
<div id="content" class="container site-content full-width-template">
	<div class="columns site-content-inner">
		<div id="primary" class="column content-area full-width-template">
			<main id="main" class="site-main">

				<div class="entry-content-only-page">

				<?php
					while ( have_posts() ) : the_post();

				 		the_content();

					endwhile; // end of the loop.
				?>

				</div><!-- .entry-content-only-page -->

			<?php edit_post_link( __( 'Edit', 'beam' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
