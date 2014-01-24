	<div class="clear"></div>
	<footer>
		<div class="copyright">
			<p>Copyright&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. Powered by <a href="http://wordpress.org/">WordPress.</a>
			| Theme <a href="<?php echo esc_url( __( 'http://hjyl.org/', 'olo' ) ); ?>" title="designed by hjy.org">olo</a>. <?php echo get_option('icp'); ?>. <?php echo get_option('stat'); ?></p>
			<p>
				<?php 
				if (is_home() && get_option('bottom_home_link')) {
				echo get_option('bottom_home_link'); ?>
				<?php } ?> <?php 
				if (get_option('bottom_all_link')) {
				echo get_option('bottom_all_link'); ?>
				<?php } ?>
			</p>
		</div>
		
		<div id="oloUp">
			<i class="fa fa-chevron-circle-up"></i>
		</div>	
	</footer>
<?php wp_footer(); ?>
</body>
</html>