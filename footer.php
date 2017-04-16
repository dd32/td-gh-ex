<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @subpackage AyaFreelance
 * @author ayatemplates
 * @since AyaFreelance 1.0.0
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar( 'footer' ); ?>

					<div class="clear">
					</div>

					<div id="copyright">

						<p>
						 <?php ayafreelance_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://ayatemplates.com/product/ayafreelance' ); ?>" title="<?php esc_attr( esc_html_e( 'ayafreelance Theme', 'ayafreelance' ) ); ?>">
							<?php esc_html_e('AyaFreelance Theme', 'ayafreelance'); ?></a> <?php esc_attr (esc_html_e( 'powered by', 'ayafreelance' ) ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr( esc_html_e( 'WordPress', 'ayafreelance' ) ); ?>">
							<?php esc_html_e('WordPress', 'ayafreelance'); ?></a>
						</p>
						
					</div><!-- #copyright -->

				</div><!-- #footer-content-wrapper -->

			</footer><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>