	</div><!-- #hjylContent-->
</div><!-- #hjylContainer-->
	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p><?php _e('CopyRight', 'bb10'); ?>&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. <?php printf(__('%1$s Powered by %2$s', 'bb10'), '<a href="'.esc_url( __( 'https://hjyl.org/', 'bb10' ) ).'" title="Designed by hjyl.org">bb10 Theme</a>', '<a href="'.esc_url( __( 'https://wordpress.org/', 'bb10' ) ).'">WordPress</a>'); ?></p>
			<?php if ( function_exists( 'zh_cn_l10n_icp_num' ) ): ?>
			<p><a href="<?php echo esc_url(__( 'http://www.miit.gov.cn/', 'bb10' )); ?>" rel="external nofollow" target="_blank"><?php echo esc_attr( get_option( 'zh_cn_l10n_icp_num' ) ); ?></a></p>
			<?php endif; ?>
		</div>
		
		<div id="hjylUp">
			<i><?php echo hjyl_get_svg( array( 'icon' => 'arrow-up' ) ); ?></i>
		</div>	
	</footer>
<?php wp_footer(); ?>	
</body>
</html>