	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p>Copyright&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. Powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'olo' ) ); ?>">WordPress.</a>
			| Theme <a href="<?php echo esc_url( __( 'http://hjyl.org/', 'olo' ) ); ?>" title="designed by hjy.org">olo</a><?php global $olo_theme_options; if($olo_theme_options['is_olo_icp']=='true') { ?>. <?php $olo_icp = esc_attr($olo_theme_options['olo_icp']); echo $olo_icp; ?><?php } ?></p>
		</div>
		
		<div id="oloUp">
			<i class="fa fa-chevron-circle-up"></i>
		</div>	
	</footer>
<?php wp_footer(); ?>
</body>
</html>