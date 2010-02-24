<?php
/**
 * @package WordPress
 * @subpackage Belle
 */
?>
	
	<div id="sidebar">
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<h3>Category</h3>
		<ul class="ul-cat">
			<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>
		<h3>Archives</h3>
		<ul class="ul-archives">
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar() ) : ?>
<?php endif; ?>
	</div>
	<!--/sidebar -->

