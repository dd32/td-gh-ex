<?php do_action('ast_hook_after_main'); ?>
</div> <!-- #Main End -->

<div id="footer" class="cf">
	<?php do_action('ast_hook_before_footer'); ?>
	
	<div id="footer-area" class="cf">
		<?php if ( is_active_sidebar('widgets_footer_full') ) : ?>
			<div id="widgets-wrap-footer-full" class="cf"><?php dynamic_sidebar('widgets_footer_full'); ?></div>
		<?php endif ; ?>
		
		<?php if ( is_active_sidebar('widgets_footer_3') ) : ?>
			<div id="widgets-wrap-footer-3" class="cf"><?php dynamic_sidebar('widgets_footer_3'); ?></div>
		<?php endif ; ?>
	</div>

	<div id="footer-bottom" class="cf">
		<div id="footer-links">
			<?php echo asteroid_option('ast_hook_footer_links'); ?>
		</div>

		<?php if (! asteroid_option('ast_remove_theme_link') == 1 ) : ?>
			<span id="theme-link">
				<a href="<?php echo esc_url( __( 'http://ronangelo.com/asteroid/', 'asteroid' ) ); ?>"><?php _e( 'Asteroid Theme', 'asteroid' ); ?></a>
			</span>
		<?php endif; ?>
	</div>

	<?php do_action('ast_hook_after_footer'); ?>
</div> <!-- #Footer -->

<?php do_action('ast_hook_after_container'); ?>
</div> <!-- #Container -->

<?php wp_footer(); ?>
</body>
</html>