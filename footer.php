<?php get_sidebar(); ?>
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>

	<div class="clear"></div>

	<!-- start of Footer -->
	<div id="footer" class="grid_12">
		<p>
		&copy;<?php myblog_start(); echo "-".date("Y").' <a href="'; bloginfo('url'); echo '">'; bloginfo('name'); echo '</a>'; ?> | <?php myblog_stats(); ?> | <a href="<?php bloginfo('rss2_url'); ?>"><?php _e("Entries (RSS)", "5years"); ?></a> <?php _e("and", "5years"); ?> <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e("Comments (RSS)", "5years"); ?></a>
		<br /><?php _e("Proudly powered by", "5years"); ?> <a href="http://wordpress.org/">WordPress</a> <?php _e("and theme", "5years"); ?> <a href="http://blog.urosevic.net/wordpress/5years/">5Years</a> <?php _e("by", "5years"); ?> <a href="http://urosevic.net/"><?php _e("Aleksandar Urosevic", "5years"); ?></a>. | <?php _e("Valid", "5years"); ?> <a href="http://validator.w3.org/check?uri=referer">XHTML</a> <?php _e("and", "5years"); ?> <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a><!-- please don't remove backlink to 5Years theme page -->
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
		</p>
	</div>
	<!-- end of Footer -->

	<div class="clear"></div>
</div>
<!-- end of Page wrapper -->

<?php wp_footer(); ?>

</body>
</html>
