</div>

<div id="footer">

    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<div id="qsearch">
			<input type="text" name="s" id="s" value="" />
			<input class="btn" alt="Search" type="image" src="<?php echo bloginfo('template_url'); ?>/images/search.gif" title="Search" id="searchsubmit" value="<?php _e('Search', 'birdsite'); ?>" />
		</div>
    </form>

    <p>Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> with Photolog <a href="http://www.sysbird.jp/birdsite/" target="_blank">BirdSITE</a>  Theme</p>

</div>

	<?php wp_footer(); ?>

</body>
</html>
