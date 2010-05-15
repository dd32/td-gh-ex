<?php
/**
 * @package WordPress
 * @subpackage Adventure
 */
?>

<div id="footer" role="contentinfo">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
		<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a>, Theme <a href="http://schwarttzy.com/?page_id=551">Backpacking</a> designed by <a href="http://schwarttzy.com/?page_id=225">Eric Schwarz</a>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
        <!-- Theme design by Eric Schwarz - http://schwarttzy.com/?page_id=225 -->
	</p>
    <?php wp_footer(); ?>
</div>
