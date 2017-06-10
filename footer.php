		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo ashe_options( 'general_footer_width' ) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
			
			<!-- Scroll Top Button -->
			<span class="scrolltop">
				<i class="fa fa fa-angle-up"></i>
			</span>

			<!-- Instagram Widget -->
			<?php get_template_part( 'templates/sidebars/instagram', 'widget' ); ?>

			<div <?php echo ashe_options( 'general_footer_width' ) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>

			<!-- Footer Widgets -->
			<?php 
			if ( ashe_options( 'page_footer_columns' ) !== 'none' ) {
				echo get_template_part( 'templates/sidebars/footer', 'widgets' ); 
			}
			?>

			<div class="copyright-info">
				<p><?php echo ashe_options( 'page_footer_copyright' ); ?></p>
			</div>
			
			<?php
			if ( ashe_options( 'page_footer_show_socials' ) === true ) {	
				ashe_social_media( 'footer-socials' );
			} 
			?>

			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>