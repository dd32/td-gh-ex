<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ada
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-widgets">
			<?php dynamic_sidebar( 'footer-widgets-1' ); ?>
		</div>
		<div class="site-info">
			<p><?php echo get_bloginfo( 'name' ) . ' ' . date( 'Y' ); ?> &copy;</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
