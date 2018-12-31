<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package altitude-lite
 */

?>

	</div><!-- #content -->

	<div id="footer-widget" class="footer-widget">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div>
		</div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
				<?php
				/* translators: 1: Theme name */
				printf( esc_html__( '© 2018 %s All rights reserved.', 'altitude-lite' ), '<a href="https://cyberchimps.com">Altitude</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
