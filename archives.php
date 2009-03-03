<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

		<!-- start of Archive list -->
		<div id="content" class="grid_8">

			<div class="box single-post">
				<h2><?php _e('Archives by Month:', '5years'); ?></h2>
				<ul>
<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
				</ul>
			</div>

			<div class="box single-post">
				<h2><?php _e('Archives by Categories:', '5years'); ?></h2>
				<ul>
<?php wp_list_categories('show_count=1&title_li='); ?>
				</ul>
			</div>
<div class="clear"></div>
		</div>

<?php get_footer(); ?>
