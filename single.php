<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 */
global $acmephoto_customizer_all_values;

get_header(); ?>
<div class="wrapper inner-main-title init-animate fadeInDown animated">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>
<div id="content" class="site-content">
	<?php
	if( 1 == $acmephoto_customizer_all_values['acmephoto-show-breadcrumb'] ){
		acmephoto_breadcrumbs();
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<?php
			the_post_navigation();
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'left' ); ?>
<?php get_sidebar(); ?>

</div><!-- #content -->
<?php get_footer(); ?>
