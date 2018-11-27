<?php
/**
* The template for displaying all pages.
*
* The template for displaying Search Results pages.
*
* @package Beam
*/
get_header(); ?>
	<div id="content" class="container site-content">
		<div class="columns site-content-inner">

			<div id="primary" class="column is-9 content-area">
				<main id="main" class="site-main">

				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'beam' ); ?></h1>
				</header><!-- .page-header -->

				<p>
				<?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'beam' ); ?>
				</p>

				<?php
				get_search_form();

				the_widget( 'WP_Widget_Tag_Cloud' );
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
