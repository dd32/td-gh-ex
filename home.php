<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BOXY
 */
global $boxy;
get_header(); ?>
<?php if( is_front_page() ) : ?>
	<div id="content" class="site-content container">
<?php endif; ?>
	<div class="row">

	<div id="primary" class="content-area two-thirds column span9">
		<main id="main" class="site-main" role="main">

		<?php if ( $boxy['breadcrumb'] && function_exists( 'boxy_breadcrumbs' ) ) : ?>			
			<div id="breadcrumb" role="navigation">
				<?php boxy_breadcrumbs(); ?>
			</div>
		<?php endif; ?>
				
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php 
				if( $boxy['pagenavi'] && function_exists( 'boxy_pagination' ) ) : 
					boxy_pagination();
				else :
					boxy_posts_nav();
				endif; 
			?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>