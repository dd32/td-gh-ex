<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
?>
		</div><!-- #main .wrapper -->
	</div><!-- #page -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'agama_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://theme-vision.com/', AGAMA_DOMAIN ) ); ?>" title="<?php esc_attr_e( 'Premium Wordpress Themes', AGAMA_DOMAIN ); ?>"><?php printf( __( 'Proudly powered by %s', AGAMA_DOMAIN ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- / Main Wrapper -->


<?php wp_footer(); ?>
</body>
</html>