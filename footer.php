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
							<?php artgallery_show_copyright_text(); ?>
						 	<a href="<?php echo esc_url( 'https://customizablethemes.com/product/artgallery' ); ?>"
						 		title="<?php esc_attr_e( 'ArtGallery Theme', 'artgallery' ); ?>">
								<?php esc_html_e('ArtGallery Theme', 'artgallery'); ?>
							</a> 
							<?php
								/* translators: %s: WordPress name */
								printf( __( 'Powered by %s', 'artgallery' ), 'WordPress' ); ?>
						</p>
					</div><!-- #copyright -->

				</div><!-- #footer-content-wrapper -->

			</footer><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>