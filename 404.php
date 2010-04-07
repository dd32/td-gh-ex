<?php get_header(); ?>

<?php
global $options;
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>

	 <?php if ($altop_sidebar_align == "right") { ?> <div id="content" class="con_left"> <?php } ?>	
		<?php if ($altop_sidebar_align == "left") { ?> <div id="content" class="con_right">	<?php } ?>		
			<?php if ($altop_sidebar_align == "none") { ?> <div id="content" class="con_wide"> <?php } ?>	
				<?php if ($altop_sidebar_align == "") { ?> <div id="content" class="con_left">	<?php } ?>	

	<div class="post_content">
		<h2><?php echo _e('Error 404 - Not found', 'altop'); ?></h2>
		<p><?php echo _e('Sorry, but here is no content. <br /> Take a look at my pages and categories.', 'altop'); ?></p>
		
		
		<div class="alignleft">
		<h3><?php echo _e('Pages on this site', 'altop'); ?></h3>
		<ul>
		<?php wp_list_pages('title_li='); ?>
		</ul>
		</div>
		
		<div class="alignright">
		<h3><?php echo _e('Categories', 'altop'); ?></h3>
		<ul>
		<?php wp_list_categories('show_count=1&title_li='); ?>
		</ul>
		</div>
		
	<br clear="all" />		
	
	</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
