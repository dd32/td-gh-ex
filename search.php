<?php
/**
 * The template for displaying search results pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acuarela
 * @since Acuarela 1.0.0
 */

get_header(); ?>
<main id="main" role="main">
	<div id="main-content">
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for:', 'acuarela' ) . ' %s', '<span>' .  get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

<?php 	if ( have_posts() ) :
			// Start the loop.
			while ( have_posts() ) : the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			// End the loop.
			endwhile;
			// Previous/next page navigation.
			acuarela_blog_navigation();

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div><!--/main-content-->
<?php get_sidebar('sidebar'); ?>
</main>
<?php get_footer(); ?>

