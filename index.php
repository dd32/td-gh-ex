<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aamla
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary"<?php aamla_attr( 'content-area' ); ?>>

		<?php
		/**
		 * Fires immediately after opening of primary content area.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aamla_before_main_content', 'before_main_content' );
		?>

		<main id="main"<?php aamla_attr( 'site-main' ); ?>>

			<?php
			if ( have_posts() ) :

				/**
				 * Conditionally fires for displaying primary content.
				 *
				 * @since 1.0.0
				 */
				do_action( 'aamla_inside_main_content', 'inside_main_content' );

			else :

				/**
				 * Include template if no content is available.
				 */
				get_template_part( 'template-parts/content/content', 'none' );
			endif;
			?>

		</main><!-- #main -->

		<?php
		/**
		 * Fires immediately before closing primary content area.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aamla_after_main_content', 'after_main_content' );
		?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php
get_footer();
