<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aperture-real-estate
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<div class="grid-wide">
		<div class="col-6-12 left">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-6-12 right">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
	</div>

	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
