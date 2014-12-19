<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Artist
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'artist' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'artist' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'artist' ), 'Artist', '<a href="http://metrocraft.com/" rel="designer">Metrocraft</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<span id="back-to-top" class="genericon genericon-top"></span>

<?php wp_footer(); ?>

</body>
</html>
