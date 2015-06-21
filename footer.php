<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Araiz
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container clear">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'araiz' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'araiz' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
            </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
