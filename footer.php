<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package A Piece Of Cake
 * @since available since Release 1.0
 */
?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'apoc' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'apoc' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'apoc' ), 'A Piece Of Cake', '<a href="http://metodiew.com" rel="designer" target="_blank">Stanko Metodiev</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #footer -->
</div><!-- #wrapper -->

<?php wp_footer(); ?>
</body>
</html>