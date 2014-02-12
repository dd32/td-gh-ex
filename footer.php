	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p><?php _e('CopyRight', 'olo'); ?>&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. <?php printf(__('%1$s Powered by %2$s', 'olo'), '<a href="http://hjyl.org/" title="Designed by hjyl.org">olo Theme</a>', '<a href="http://wordpress.org/">WordPress</a>'); ?><?php global $olo_theme_options; if($olo_theme_options['is_olo_icp']=='true') { ?>. <?php $olo_icp = esc_attr($olo_theme_options['olo_icp']); echo $olo_icp; ?><?php } ?></p>
		</div>
		
		<div id="oloUp">
			<i class="fa fa-chevron-circle-up"></i>
		</div>	
	</footer>
<?php wp_footer(); ?>
</body>
</html>