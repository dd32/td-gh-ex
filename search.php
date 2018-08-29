<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package  Az_Authority
 */

get_header();

?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-full">
			
		<?php if ( have_posts() ) :
			?>
			<header class="page-header">


				<h1 class="page-title">
				<?php 
					/* translators: %s: query string */
					printf( esc_html__( 'Search Results for: <em>%s</em>', 'azauthority' ), get_search_query() ); 
				?></h1>


			</header><!-- .page-header -->
			
			<?php

			get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>
			
		</div>
	</main><!-- #main -->
</div><!-- #primary -->


<?php
do_action( 'azauthority_sidebar' );
get_footer();