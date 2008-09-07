	<div id="news">

	<div id="subscribe">

	<p><img style="vertical-align:-2px;" alt="RSS" src="<?php bloginfo('template_directory'); ?>/images/feed-icon-16x16.gif" /> <a href="<?php bloginfo_rss('rss2_url') ?>"><?php _e('Entries RSS'); ?></a> | <a href="<?php bloginfo_rss('comments_rss2_url') ?>"><?php _e('Comments RSS'); ?></a></p>

</div>
	
	
				<div class="menu">

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) {  } ?>


		</div>
	</div><!-- end of news -->
