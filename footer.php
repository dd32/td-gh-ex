<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @package WordPress
 * @subpackage fmuzz
 */
?>

			<a href="#" class="scrollup"></a>
			<footer id="footer-main">
				<div id="footer-content-wrapper">
					<div class="clear">
					</div>
					<div id="copyright">
						<p>
						 <?php fmuzz_show_copyright_text(); ?> <a href="<?php echo esc_url( 'http://tishonator.com/product/fmuzz' ); ?>" title="<?php esc_attr_e( 'fmuzz Theme', 'fmuzz' ); ?>"><?php _e('fMuzz Theme', 'fmuzz'); ?></a> <?php esc_attr_e( 'powered by', 'fmuzz' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'fmuzz' ); ?>">
							<?php _e('WordPress', 'fmuzz'); ?></a>
						</p>
					</div><!-- #copyright -->
				</div><!-- #footer-content-wrapper -->
			</footer><!-- #footer-main -->
		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>