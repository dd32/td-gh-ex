<?php ?>
	</div><!-- #main -->
</div><!-- #wrapper -->
</div>
	<div id="footer" role="contentinfo">
		<div id="colophon">
			<div id="site-info">
				&#169; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
			</div><!-- #site-info -->
			<div id="site-generator">
				<?php do_action( 'aplau_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://aplau.com', 'aplau' ) ); ?>" title="<?php esc_attr_e( 'Aplau Themes', 'aplau' ); ?>"></a>
			</div><!-- #site-generator -->
		</div><!-- #colophon -->
	</div><!-- #footer -->
<?php if (get_option('aplau_analytics_code') != '') { ?>
<?php echo(stripslashes (get_option('aplau_analytics_code')));?>
<?php } ?>
<?php wp_footer();?>
</body>
</html>