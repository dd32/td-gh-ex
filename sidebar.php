<?php
global $options;
foreach ($options as $value) 
		if (isset($value['id']))
			{ if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>

	 <?php if ($altop_sidebar_align == "right") { ?> <div id="sidebar" class="sb_right"> <?php } ?>
		<?php if ($altop_sidebar_align == "left") { ?> <div id="sidebar" class="sb_left"> <?php } ?>
			<?php if ($altop_sidebar_align == "none") { ?> <div id="sidebar" class="sb_wide">	<?php } ?>	
				<?php if ($altop_sidebar_align == "") { ?> <div id="sidebar" class="sb_right"> <?php } ?>			
      <div id="sidebar_inner">
		
		    <?php if ( is_page() ) { ?>
    
				<?php
				if($post->post_parent)
				$children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0'); else
				$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
				if ($children) { ?>
			
				<ul>	
				<li>
					<h4><?php $parent_title = get_the_title($post->post_parent); echo $parent_title; ?></h4>
					<ul><?php echo $children; ?></ul>
				<br /><br /></li>
				</ul>
			
				<?php } } ?>
		
		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

		<?php get_search_form(); ?> 			
					
		<ul>
			<li><h2><?php _e('Archives', 'altop'); ?></h2></li>
			<li><ul><?php wp_get_archives('type=monthly&show_post_count=1'); ?></ul></li>
		</ul>
		
		<ul>
			<?php wp_list_pages('title_li=<h2>' . __('Pages', 'altop') . '</h2>' ); ?>
		</ul>
				
		<ul>
			<?php wp_list_categories('show_count=1&title_li=<h2>' . __('Categories', 'altop') . '</h2>'); ?>
		</ul>
		
		
		<?php if ( is_home() ) { ?>
		<ul> <?php wp_list_bookmarks(); ?> </ul>
		<?php } ?>
	
		<ul>
		<li><h2><?php echo _e('The Tags', 'altop'); ?></h2></li>
		<li><?php wp_tag_cloud('number=30&smallest=8&largest=16&orderby=name'); ?></li>
		</ul>
			
			
	<?php endif; ?>

			</div>

	</div>