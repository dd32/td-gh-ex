<?php
/*
Template Name: Squeeze One
Description: If You are building one page landing/squeeze Page, use this template. Sidebars are not used in this template. Delete full-width-template classes below to have standard page width.
*/
get_header( 'squeeze' );
?>
<div id="content" class="container site-content full-width-template">
	<div class="columns site-content-inner">
		<div id="primary" class="column is-9 content-area full-width-template">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile;
					?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer( 'squeeze' );
