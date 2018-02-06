		</div><!-- #page-content -->

		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo esc_attr(bard_options( 'general_footer_width' )) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
				
			<!-- Footer Widgets -->
			<?php echo get_template_part( 'templates/sidebars/footer', 'widgets' ); ?>

			<div class="footer-copyright">
			<div class="page-footer-inner <?php echo bard_options( 'general_footer_width' ) === 'contained' ? 'boxed-wrapper': ''; ?>">
				<div class="copyright-info">
				<?php

				$copyright = bard_options( 'page_footer_copyright' );
				$copyright = str_replace( '$year', date_i18n( __('Y','bard') ), $copyright );
				$copyright = str_replace( '$copy', '&copy;', $copyright );

				if ( bard_is_preview() ) {
					echo esc_html__( '&copy; 2018 - All Rights Reserved.', 'bard' );
				} else {
					echo wp_kses_post( $copyright );
				}

				?>
				</div>
				
				<div class="credit">
					<?php esc_html_e( 'Bard Theme by ', 'bard' ); ?>
					<a href="<?php echo esc_url( 'http://wp-royal.com/' ); ?>">
					<?php esc_html_e( 'Royal-Flush', 'bard' ); ?>
					</a>
				</div>

				<!-- Scroll Top Button -->
				<span class="scrolltop">
					<i class="fa fa fa-angle-up"></i>
					<br>
					<?php esc_html_e( 'Back to top', 'bard' ); ?>
				</span>
				
			</div>
			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>