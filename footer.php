<?php
global $options;
foreach ($options as $value) {
	if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>

	
	 <?php if ($altop_bottombar != "none" ) : //if you want to show the "Bottombar" ?>
		<?php include(TEMPLATEPATH . '/bottombar.php'); ?>
	 <?php endif ?>	

<br clear="all" />
</div>


<div id="footerwrap">

	<div id="footer">
		<?php printf(__('%1$s is running with <a href="%2$s" title="WordPress"> WordPress </a> and the <a href="%3$s" title="altop-Theme">altop-Theme</a>', 'altop'), get_bloginfo('name'), 'http://www.wordpress.org', 'http://blog.t3-artwork.info', 'altop'); ?> 
		<!-- <?php printf(__('%d queries. %s seconds.', 'altop'), get_num_queries(), timer_stop(0, 3)); ?> -->
	</div>
	
</div>

<?php wp_footer(); ?>
</body>
</html>
