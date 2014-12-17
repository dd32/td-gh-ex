<?php
/*
 * The footer for displaying site-info.
 */
?>

<div id="footer">
	
	<div class="site-info">
		<?php _e('Copyright', 'onecolumn'); ?> <?php echo date('Y'); ?>  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - 
		<a href="http://wordpress.org" title="<?php _e('WordPress Blog Platform', 'onecolumn'); ?>"><?php _e('Proudly powered by WordPress', 'onecolumn'); ?></a>
	</div>

</div>
</div><!-- #container -->

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>

</body>
</html>