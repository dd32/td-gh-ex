
		<!--footer-->
		<div class="clear"></div>
		
		<div id="footer">
		
			<div id="footer-desc">
			
				<div id="blog-info"><?php bloginfo( 'description' ); ?></div>
			
			</div>
			
			<div id="footer-widget">
			
			<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end-->
			
	<div class="clear"></div>

		</div> <!--footer end-->
			
			<div id="footer-info">		
				
				<span id="copyright"><?php _e( 'Copyright ', 'application' ); ?><?php echo date( 'Y' ); ?>
 <?php echo get_option('footer_cr') ?> | <?php _e( 'Powered by', 'application' ); ?> <a href="http://www.wordpress.org">WordPress</a> | application theme by <a href="http://www.themeszen.com">themeszen</a></span>
				<span id="follow-us"><?php _e( 'Follow us: ', 'application' ); ?><a href="<?php echo of_get_option('footer_facebook') ?>">Facebook</a> | <a href="<?php echo of_get_option('footer_twitter') ?> ">Twitter</a></span>
			
			</div>
	
	<?php wp_footer(); ?>

</body>

</html>