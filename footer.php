		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo ashe_options( 'general_footer_width' ) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
			
			<!-- Scroll Top Button -->
			<span class="scrolltop">
				<i class="fa fa fa-angle-up"></i>
			</span>

			<div <?php echo ashe_options( 'general_footer_width' ) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>

			<!-- Footer Widgets -->
			<?php 
			if ( ashe_options( 'page_footer_columns' ) !== 'none' ) {
				echo get_template_part( 'templates/sidebars/footer', 'widgets' ); 
			}
			?>

			<div class="footer-copyright">
				<div class="copyright-info">
					<p><?php echo ashe_options( 'page_footer_copyright' ); ?></p>
				</div>
				<?php 
				$credit_link = 'http://wp-royal.com/';
				?>
				<p class="credit">
					<?php esc_html_e( 'Ashe Theme by ', 'ashe' ); ?>
					<a href="<?php echo esc_attr( $credit_link ); ?>">
					<?php esc_html_e( 'Royal-Flush', 'ashe' ); ?>
					</a>
				</p>

			</div>

			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>