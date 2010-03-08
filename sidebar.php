<?php
/**
 * @package WordPress
 * @subpackage Belle
 */
?>
	<?php
if (!is_search()): ?>
	<div id="sidebar">
		 <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
		<h3>Category</h3>
		<ul class="ul-cat">
			<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>
		<h3>Archives</h3>
		<ul class="ul-archives">
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<?php endif; ?>
	</div>
	<!--/sidebar -->
<?php endif; ?>
