<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aamla
 * @since 1.0.0
 */

		/**
		 * Fires at the bottom of site content area.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aamla_bottom_of_site_content', 'bottom_of_site_content' );
		?>

		</div><!-- #content -->

		<?php
		/**
		 * Fires immediately after site content area.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aamla_after_site_content', 'after_site_content' );
		?>

		<footer id="colophon"<?php aamla_attr( 'site-footer' ); ?>>

				<?php
				/**
				 * Fires immediately after opening site footer tag.
				 *
				 * @since 1.0.0
				 */
				do_action( 'aamla_inside_footer', 'inside_footer' );
				?>

		</footer><!-- #colophon -->

		<?php
		/**
		 * Must be fired immediately before end of body tag.
		 *
		 * @since 1.0.0
		 */
		wp_footer();
		?>
	</body>
</html>
