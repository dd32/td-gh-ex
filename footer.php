	</div><!-- #hjylContent-->
</div><!-- #hjylContainer-->
	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p><?php _e('CopyRight', 'bb10'); ?>&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. <?php printf(__('%1$s Powered by %2$s', 'bb10'), '<a href="'.esc_url( __( 'https://hjyl.org/', 'bb10' ) ).'" title="Designed by hjyl.org">bb10 Theme</a>', '<a href="'.esc_url( __( 'http://wordpress.org/', 'bb10' ) ).'">WordPress</a>'); ?></p>
		</div>
		
		<div id="hjylUp">
			<i class="fa fa-chevron-up" aria-hidden="true"></i>
		</div>	
	</footer>
<?php wp_footer(); ?>	
</body>
</html>