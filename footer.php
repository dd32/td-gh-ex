<?php
/*
 * The footer for displaying site-info.
 */
?>

<div id="footer">
	
	<div class="site-info">
		<?php _e('Copyright', 'onecolumn'); ?> <?php echo date('Y'); ?>  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php _e('OneColumn WordPress Theme', 'onecolumn'); ?>  
	</div>

</div>
</div><!-- #container -->

<?php wp_footer(); ?>

</body>
</html>