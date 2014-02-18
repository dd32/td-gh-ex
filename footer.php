<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage i-transform
 * @since i-transform 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
                <div class="copyright">
                	Copyright &copy; <?php bloginfo( 'name' ); ?>
                </div>            
            	<div class="credit-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'itransform' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'itransform' ); ?>"><?php printf( __( 'Powered by %s', 'itransform' ), 'WordPress' ); ?></a>, Designed and Developed by <a href="http://www.templatesnext.org/" title="web development and design">templatesnext</a>
                </div>

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>