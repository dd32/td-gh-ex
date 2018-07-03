<?php
/**
 * Template Name: Without Sidebar
 * Template Post Type: post, page
 *
 * The custom page template file without primary sidebar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aamla
 * @since 1.0.0
 */

get_header(); ?>

<div id="content"<?php aamla_attr( 'site-content' ); ?>>

	<?php
	/** This filter is documented in index.php */
	do_action( 'aamla_on_top_of_site_content', 'on_top_of_site_content' );
	?>

	<div id="primary"<?php aamla_attr( 'content-area' ); ?>>

		<?php
		/** This filter is documented in index.php */
		do_action( 'aamla_before_main_content', 'before_main_content' );
		?>

		<main id="main"<?php aamla_attr( 'site-main' ); ?>>

			<?php
			if ( have_posts() ) :

				/** This filter is documented in index.php */
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
		/** This filter is documented in index.php */
		do_action( 'aamla_after_main_content', 'after_main_content' );
		?>

	</div><!-- #primary -->

	<?php

	/** This filter is documented in index.php */
	do_action( 'aamla_bottom_of_site_content', 'bottom_of_site_content' );
	?>

</div><!-- #content -->

<?php
get_footer();
