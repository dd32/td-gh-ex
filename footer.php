	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p><?php _e('CopyRight', 'olo'); ?>&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. <?php printf(__('%1$s Powered by %2$s', 'olo'), '<a href="'.esc_url( __( 'https://hjyl.org/', 'olo' ) ).'" title="Designed by hjyl.org">olo Theme</a>', '<a href="'.esc_url( __( 'https://wordpress.org/', 'olo' ) ).'">WordPress</a>'); ?></p>
		</div>
		
		<div id="oloUp">
			<i><?php echo hjyl_get_svg( array( 'icon' => 'arrow-up' ) ); ?></i>
		</div>	
	</footer>
<?php wp_footer(); ?>
</body>
</html>