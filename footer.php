<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @subpackage AyaSpirit
 * @author ayatemplates
 * @since AyaSpirit 1.0.0
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar('footer'); ?>

					<nav id="footer-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
					</nav>

					<div class="clear">
					</div>

				</div><!-- #footer-content-wrapper -->

			</footer>
			<div id="footer-bottom-area">
				<div id="footer-bottom-content-wrapper">
					<div id="copyright">

						<p>
						 <?php ayaspirit_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://ayatemplates.com/product/ayaspirit' ); ?>" title="<?php esc_attr_e( 'ayaspirit Theme', 'ayaspirit' ); ?>">
							<?php esc_html_e('AyaSpirit Theme', 'ayaspirit'); ?></a> <?php esc_attr_e( 'powered by', 'ayaspirit' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'ayaspirit' ); ?>">
							<?php esc_html_e('WordPress', 'ayaspirit'); ?></a>
						</p>
						
					</div><!-- #copyright -->
				</div>
			</div><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>