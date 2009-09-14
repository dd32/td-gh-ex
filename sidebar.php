<?php
/**
 * @package WordPress
 * @subpackage EladDD
 */
?>
<ul id="sidebar">
	<li class="search"><div class="bottom"><div class="top">
		<h3>Search</h3>
		<form method="get" action="<?php bloginfo('url'); ?>/">
			<input type="text" class="text" name="s" />
			<input type="submit" class="btn" value="Search" />
		</form>
	</div></div></li>
<?php 
	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<?php wp_list_pages('title_li=<h3>Pages</h3>'); ?>
		<?php wp_list_categories('title_li=<h3>' . __('Categories') . '</h3>'); ?>
		<li id="archives"><h3><?php _e('Archives'); ?></h3>
			<ul>
			<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</li>
		<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>'); ?>
<?php endif; ?>
</ul>