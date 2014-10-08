<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-widgets">
			<div class="container">
				<div class="four columns"><?php dynamic_sidebar( 'footer-1' ); ?></div>
				<div class="four columns"><?php dynamic_sidebar( 'footer-2' ); ?></div>
				<div class="four columns"><?php dynamic_sidebar( 'footer-3' ); ?></div>
				<div class="four columns"><?php dynamic_sidebar( 'footer-4' ); ?></div>
			</div>
		</div>
		<div class="copy">
			<div class="container">
				<div class="sixteen columns">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', '_s' ) ); ?>"><?php printf( __( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'greenr' ), 'Greenr', '<a href="http://www.webulous.in/" rel="designer">Webulous Themes</a>' ); ?>
					</div><!-- .site-info -->
				</div>
			</div>			
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
