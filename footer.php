<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bhost
 */
?>

			</div><!-- #content -->
		</div><!--.row-->
	</div><!--.container-->
	<footer id="footer" class="site-footer col-md-12" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bhost' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'bhost' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'bhost' ), 'bhost', '<a href="http://getmasum.net/" rel="designer">BHost Theme</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
