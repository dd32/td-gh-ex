</div> <!-- #Main End -->

<div id="footer">

	<div id="footer-area">			
		<?php if ( is_active_sidebar( 'widgets_footer' ) ) : ?>
			<div id="widgets-wrap-footer">
				<?php dynamic_sidebar( 'widgets_footer' ); ?>
			</div>
		<?php endif ; ?>
	</div>

	<div id="footer-bottom">
		<div id="footer-links"><?php do_action( 'ast_hook_footer_links' ); ?></div>
		
		<?php if (! asteroid_option('ast_remove_theme_link') == 1 ) : ?>
			<a id="theme-credit" href="http://ronangelo.com/asteroid/" target="_blank">Asteroid Theme</a>
		<?php endif; ?>
	</div>

</div> <!-- #Footer End -->

</div> <!-- #Container End -->

<?php wp_footer(); ?>
</body>
</html>