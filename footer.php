		</div><!-- #page-content -->

		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo esc_attr(bard_options( 'general_footer_width' )) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
				
			<?php

			// Instagram Widget
			get_template_part( 'templates/sidebars/instagram', 'widget' );

			// Footer Socials
			if ( bard_options( 'page_footer_show_socials' ) === true ) {
				bard_social_media( 'footer-socials', true );
			}
			
			// Footer Widgets
			echo get_template_part( 'templates/sidebars/footer', 'widgets' );

			?>
			
			<div class="footer-copyright">
			<div class="page-footer-inner <?php echo bard_options( 'general_footer_width' ) === 'contained' ? 'boxed-wrapper': ''; ?>">
				<div class="copyright-info">
					<?php

					$copyright = bard_options( 'page_footer_copyright' );
					$copyright = str_replace( '$year', date_i18n( __('Y','bard') ), $copyright );
					$copyright = str_replace( '$copy', '&copy;', $copyright );

					echo wp_kses_post( $copyright );

					if ( $copyright !== '' ) {
						esc_html_e( ' | ', 'bard' );
					}

					?>

					<span class="credit">
						<?php esc_html_e( 'Bard Theme by ', 'bard' ); ?>
						<a href="<?php echo esc_url( 'http://wp-royal.com/' ); ?>">
						<?php esc_html_e( 'Royal-Flush', 'bard' ); ?>
						</a>
					</span>
				</div>
	
				<!-- Scroll Top Button -->
				<span class="scrolltop">
					<i class="fas fa-angle-double-up"></i>
					<span><?php esc_html_e( 'Back to top', 'bard' ); ?></span>
				</span>
				
			</div>
			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>