<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

		<div id="content">
					<h1 class="archive-title"><?php the_title() ?></h1>

					<ul id="sitemap-list">
						<li>
							<h3><?php _e('Archives by Category', 'blogtxt') ?></h3>
							<ul>
								<?php wp_list_categories('title_li=&sort_column=name&optioncount=1&feed=RSS&show_count=1') ?> 
							</ul>
						</li>
						<li>
							<h3><?php _e('Archives by Month', 'blogtxt') ?></h3>
							<ul>
								<?php wp_get_archives('type=monthly&show_post_count=1') ?>
							</ul>
						</li>
						<li>
							<h3><?php _e('Archives by Tag', 'blogtxt') ?></h3>
							<p><?php wp_tag_cloud() ?></p>
						</li>
					</ul>

<?php edit_post_link(__('Edit&hellip;', 'simplish'),'<p class="admin-edit"> [ ',' ]</p>') ?>

		</div>	

<?php get_footer(); ?>
