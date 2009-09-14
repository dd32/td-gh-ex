<?php
/**
 * @package WordPress
 * @subpackage EladDD
 */
?>
		</div>
		<?php get_sidebar(); ?>
	</div>
	<div id="footer">
		<ul>
			<li><a href="<?php echo get_option('home'); ?>/">Home</a></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS</a></li>

		</ul>
		Copyright 2009. Designed by <a href="http://www.diamondsdesigners.com/">Diamonds</a> Designers. Powered by <a href="http://www.wordpress.org">WordPress</a>.
		<?php wp_footer(); ?>
	</div>
</div></div>

</body>
</html>