	<!--footer-->
	<div class="clear"></div>
		
		<div id="footer">
		
	<!--footer container--><div id="footer-container">
		
		<div id="footer-widget">
			
			<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end-->
			
		</div><!-- footer container-->
		
	<div class="clear"></div>
	
		<div id="footer-info">		
			
			<!--footer container--><div id="footer-container2">
			
			<div id="copyright"><?php _e( 'Copyright', 'agency' ); ?> <?php echo date( 'Y' ); ?> <?php echo of_get_option('footer_cr'); ?> | <?php _e( 'Powered by', 'agency' ); ?> <a href="http://www.wordpress.org">WordPress</a> | agency theme by <a href="http://www.antthemes.com">antthemes</a></div>
					
			</div><!--footer info end-->		
		</div><!-- footer container2-->				
			
	</div>
	
	<?php wp_footer(); ?>

</body>

</html>