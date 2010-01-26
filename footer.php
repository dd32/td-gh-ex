<div id="bottom">
	<div class="bottom-left"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-Left') ) : ?><?php endif; ?></div>
	<div class="bottom-middle"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-Middle') ) : ?><?php endif; ?></div>
	<div class="bottom-right"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-Right') ) : ?><?php endif; ?></div>
</div>

<div id="footer">

	<p>&copy; Copyright <?php echo date('Y'); ?>. <?php bloginfo('name'); ?>. All Rights Reserved.</p>

	<p>This site is powered by <a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> and the <a href="http://www.basicsimplicity.com/" title="Basic Simplicity WordPress Theme" target="_blank">Basic Simplicity</a> theme by <a href="http://www.michaeljanzen.com/" title="Michael Janzen" target="_blank">Michael Janzen</a></p>


	<?php wp_footer(); ?>

</div><!--end footer-->

</div><!--end wrap-->
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php echo stripslashes($bs_theme_google_analytics_code); ?>
</body>
</html>