<?php
/**
 * The home template file.
 *
 * This is home template file is used to display blog posts
 * when Reading Settings set to 'Your latest posts'.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Greenr
 */

get_header(); ?>
	<div id="content" class="site-content container">

<?php $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); ?>
		<?php if( 'left' == $sidebar_position ) :?>
			<?php get_sidebar('left'); ?>
		<?php endif; ?> 

	<div id="primary" class="content-area eleven columns">
		<main id="main" class="site-main" role="main">

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
		if(  get_theme_mod ('numeric_pagination',true) && function_exists( 'greenr_pagination' ) ) : 
				greenr_pagination();
			else :
				greenr_post_nav();     
			endif; 
	?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if( 'right' == $sidebar_position ) :?>
			<?php get_sidebar(); ?>
	<?php endif; ?>

<?php get_footer(); ?>
