	<!--footer-->
		
		<div id="footer-container">

	<!--footer container--><div class="row">
		
		<div class="twelve columns" id="footer-widget">
			
			<?php
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end-->
			
		</div><!-- footer container-->
					
	</div>
	
			<div id="footer-info">

				<!--footer container--><div class="row">
				
		<div class="twelve columns">					
			
			<div id="copyright"><?php _e( 'Copyright', 'antmagazine' ); ?> <?php echo date( 'Y' ); ?> <?php echo antmagazine_get_option('footer_cr'); ?> | <?php _e( 'Powered by', 'antmagazine' ); ?> <a href="http://www.wordpress.com">WordPress</a> | antmagazine theme by <a href="http://www.antthemes.com">antthemes</a></div>
			
			<div class="scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'antmagazine' ); ?>"><?php _e( '&uarr;', 'antmagazine' ); ?></a></div>
					
				</div>	
			</div>		
			</div><!--footer info end-->
	
	<?php wp_footer(); ?>

</body>

</html>