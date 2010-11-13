<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
		</div><!-- #inner-wrapper -->
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

		<?php /* Add in our Horizontal Social Media */ ?>
		<?php get_template_part( 'social', 'horizontal' ); ?>
		<?php /* Get our footer credit bar */ ?>
		<?php get_template_part( 'footer', 'credit' ); ?>
		
		<div id="site-info">
			<a href="http://www.digitalraindrops.net/atmosphere">Theme Created by Digital Raindrops</a>
		</div><!-- #site-info -->

		<div id="site-generator">
			<?php do_action( 'twentyten_credits' ); ?>
			<a href="<?php echo esc_url( __('http://wordpress.org/', 'twentyten') ); ?>"
					title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator">
				<?php printf( __('Proudly powered by %s.', 'twentyten'), 'WordPress' ); ?>
			</a>
		</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
