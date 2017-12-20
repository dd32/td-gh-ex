<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar( 'footer' ); ?>

					<nav id="footer-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
					</nav>

					<div class="clear">
					</div>

					<div id="copyright">

						<p>
							<?php ayaportfolio_show_copyright_text(); ?>
						 	<a href="<?php echo esc_url( 'https://ayatemplates.com/product/ayaportfolio' ); ?>"
						 		title="<?php esc_attr_e( 'AyaPortfolio Theme', 'ayaportfolio' ); ?>">
								<?php esc_html_e('AyaPortfolio Theme', 'ayaportfolio'); ?>
							</a> 
							<?php
								/* translators: %s: WordPress name */
								printf( __( 'Powered by %s', 'ayaportfolio' ), 'WordPress' ); ?>
						</p>
						
					</div><!-- #copyright -->

				</div><!-- #footer-content-wrapper -->

			</footer><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>