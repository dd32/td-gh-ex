		</div><!-- #page-content -->

		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo esc_attr(ashe_options( 'general_footer_width' )) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
			
			<!-- Scroll Top Button -->
			<span class="scrolltop">
				<i class="fa fa fa-angle-up"></i>
			</span>

			<div class="page-footer-inner <?php echo ashe_options( 'general_footer_width' ) === 'contained' ? 'boxed-wrapper': ''; ?>">

			<!-- Footer Widgets -->
			<?php 
			if ( ashe_options( 'page_footer_columns' ) !== 'none' ) {
				echo get_template_part( 'templates/sidebars/footer', 'widgets' ); 
			}
			?>

			<div class="footer-copyright">
				<div class="copyright-info">
				<?php

				// some allowed HTML
				echo wp_kses( ashe_options( 'page_footer_copyright' ), array( 
					'a' => array(
						'href' 		=> array(),
						'title' 	=> array(),
						'_blank'	=> array()
					),
					'img' => array(
						'src' 		=> array(),
						'alt' 		=> array(),
						'width'		=> array(),
						'height'	=> array(),
						'style'		=> array(),
						'class'		=> array(),
						'id'		=> array()
					),
					'br' 	 => array(),
					'em' 	 => array(),
					'strong' => array()
				) );

				?>
				</div>
				<?php 
				$credit_link = 'http://wp-royal.com/';
				?>
				<div class="credit">
					<?php esc_html_e( 'Ashe Theme by ', 'ashe' ); ?>
					<a href="<?php echo esc_attr( $credit_link ); ?>">
					<?php esc_html_e( 'Royal-Flush', 'ashe' ); ?>
					</a>
				</div>

			</div>

			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>