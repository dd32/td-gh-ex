</div> <!-- #Main End -->

<div id="footer">

	<?php if ( is_active_sidebar( 'widgets_footer_full' ) ) : ?>
		<div id="widgets-wrap-footer-full">
			<?php dynamic_sidebar( 'widgets_footer_full' ); ?>
		</div>
	<?php endif ; ?>

	<div id="footer-area">			
		<?php if ( is_active_sidebar( 'widgets_footer_3' ) ) : ?>
			<div id="widgets-wrap-footer-3">
				<?php dynamic_sidebar( 'widgets_footer_3' ); ?>
			</div>
		<?php endif ; ?>
	</div>

	<div id="footer-bottom">
		<div id="footer-links"><?php do_action( 'ast_hook_footer_links' ); ?></div>
		
		<?php if (! asteroid_option('ast_remove_theme_link') == 1 ) : ?>
			<a id="theme-page" href="http://ronangelo.com/asteroid/" target="_blank">Asteroid Theme</a>
		<?php endif; ?>
	</div>

</div> <!-- #Footer -->

</div> <!-- #Container -->

<?php wp_footer(); ?>
</body>
</html>