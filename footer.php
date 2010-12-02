
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
				
				<span id="copyright">Copyright 2010. <?php echo get_option('tm_footer_text') ?> | Powered by <a href="http://www.wordpress.com">WordPress</a> | application theme by <a href="http://www.themeszen.com">themeszen</a></span>
				<span id="follow-us">Follow us: <a href="<?php echo get_option('tm_feedburner') ?>">RSS</a> | <a href="<?php echo get_option('tm_twitter') ?> ">Twitter</a></span>
			
			</div>
		
	<?php $googleanalytics=get_option("tm_go_code"); ?>
	<?php echo stripslashes($googleanalytics); ?>	
	
	<?php wp_footer(); ?>

</body>

</html>