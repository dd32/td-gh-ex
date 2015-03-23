	<div id="footer">
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php dynamic_sidebar( 'footer-1' ); ?>
	<?php endif; ?>
	</div>
	


		<div id="credits">

		<?php _e('Powered by ','magtheme'); ?><a href="http://wordpress.org/">Wordpress</a>

		<?php _e('MagTheme by ','magtheme'); ?><a href="http://tioreo.com">Tioreo</a>
		
		</div>

	

</div>


<?php wp_footer(); ?> 

</body>
</html>