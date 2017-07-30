<?php
/**
* The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package ariel
*/

	/**
	 * Footer widgets area
	 */
	get_sidebar( 'footer' ); ?>

	<div class="footer-row-2">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<?php
						$ariel_footer_copyright = ariel_get_option( 'ariel_footer_copyright' );

						if ( $ariel_footer_copyright ) : ?>
							<div class="footer-copyright"><?php echo wp_kses_post( $ariel_footer_copyright ); ?></div>
						<?php endif; // $ariel_footer_copyright
					?>
				</div><!-- col-sm-6 -->
				<div class="col-sm-6">
					<div class="footer-copyright-by">
						<?php esc_html_e( 'Ariel by', 'ariel' ); ?>
						<a href="https://www.lyrathemes.com/ariel/"><?php esc_html_e( 'LyraThemes', 'ariel' ); ?></a>
					</div><!-- footer-copyright-by -->
				</div><!-- col-sm-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- footer-row-2 -->

</div><!-- main-wrapper -->

<?php wp_footer(); ?>
</body>
</html>