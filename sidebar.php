<?php
/**
 * @package WordPress
 * @subpackage Belle
 */
?>
	<?php
if ($_GET["dynamic"]!='true'): ?>
<!-- Sidebar ON-->
<div id="sidebar">
		 <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
		<h3><?php _e('Category',belle); ?></h3>
		<ul class="ul-cat">
			<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>
		<h3><?php _e('Archives',belle); ?></h3>
		<ul class="ul-archives">
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<?php endif; ?>
</div>
<!-- Sidebar OFF-->

<?php endif; ?>
