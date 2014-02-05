	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p>Copyright&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. Powered by <a href="http://wordpress.org/">WordPress.</a>
			| Theme <a href="<?php echo esc_url( __( 'http://hjyl.org/', 'olo' ) ); ?>" title="designed by hjy.org">olo</a><?php if (get_option('olo_icp')!='') { ?>. <?php echo get_option('icp'); ?><?php } ?><?php if (get_option('olo_stat')!='') { ?>. <?php echo get_option('stat'); ?><?php } ?></p>
			<?php if (get_option('olo_ad')!='') { ?>
			<p><?php if(is_home()) { echo get_option('bottom_home_link'); ?><?php } ?> <?php echo get_option('bottom_all_link'); ?></p>
			<?php } ?>
		</div>
		
		<div id="oloUp">
			<i class="fa fa-chevron-circle-up"></i>
		</div>	
	</footer>
<?php wp_footer(); ?>
</body>
</html>