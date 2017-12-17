<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appsetter
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->


						<div class="col-md-9">
	<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'frontpage-list'	);
				
			endwhile;
				the_posts_pagination();

		 ?>
		 
	</div>
		

		<div class="col-md-3 alignright">

			<?php get_sidebar(); ?>
		
		</div>

	<?php	endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
