<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<div class="footer" role="contentinfo">
	<p>
		Aquasunny v. 1.0 by <a href="http://riseofdesign.de/">Mladen</a> |
		<?php printf(__('%1$s  %2$s.', 'kubrick'), '<a href="' . get_bloginfo('rss2_url') . '">' . __('Entries (RSS)', 'kubrick') . '</a>', '<a href="' . get_bloginfo('comments_rss2_url') . '">' . __('Comments (RSS)', 'kubrick') . '</a>'); ?>
	</p>
</div>
</div>

<?php  ?>

		<?php wp_footer(); ?>
</body>
</html>
