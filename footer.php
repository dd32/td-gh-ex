
</div> <!-- #content -->
<div id="footer">
	<div id="footer-area">			
		<?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
			<div id="footer-widgets-wrap">
				<?php dynamic_sidebar( 'footer_widgets' ); ?>
				<div class="clear"><!-- --></div>
			</div>
		<?php endif; ?>
		<div class="clear"><!-- --></div>
	</div>

	<div id="footer-bottom">
		<!-- Add Stuff -->
		<div id="footer-links" class="left">
			<?php do_action( 'hook_footer_link' ) ; ?>
		</div>
		
		<a id="theme-credit" href="http://ronangelo.com/asteroid/" target="_blank">Asteroid Theme</a>
		
		<div class="clear"><!-- --></div>
	</div>	
</div><!-- #footer -->
</div> <!-- #container -->
	
<?php wp_footer(); ?>
</body>
</html>