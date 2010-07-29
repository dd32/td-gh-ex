<?php get_header(); ?>

<?php
global $options;
foreach ($options as $value) 
		if (isset($value['id']))
			{ if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>

	 <?php if ($altop_sidebar_align == "right") { ?> <div id="content" class="con_left"> <?php } ?>	
		<?php if ($altop_sidebar_align == "left") { ?> <div id="content" class="con_right">	<?php } ?>		
			<?php if ($altop_sidebar_align == "none") { ?> <div id="content" class="con_wide"> <?php } ?>	
				<?php if ($altop_sidebar_align == "") { ?> <div id="content" class="con_left">	<?php } ?>		
      <div id="content_inner">				
				
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post_content" id="post-<?php the_ID(); ?>">
									
				<h2><?php the_title(); ?></h2>
				<div class="postdate">
					<span class="postdate_day"><?php the_time(__('jS', 'altop')); ?></span><br />
					<span class="postdate_month"><?php the_time(__('F Y', 'altop')); ?></span><br />
					<img src="<?php echo bloginfo('template_directory'); ?>/images/comments.png" alt="Comments" align="bottom" /> <?php comments_popup_link(__('0 Comments', 'altop'), __('1 Comment', 'altop'), __('% Comments', 'altop'), '', __('Closed', 'altop') ); ?><br />
					
				</div>
				
				<?php if ($altop_sidebar_align == "none") { ?> <div class="entry_wide"> <?php } //Wide content and NO sidebar ?>
					<?php if ($altop_sidebar_align != "none") { ?> <div class="entry"> <?php } // content AND sidebar ?>
					            <div class="entry_inner"> 

					<?php if ($altop_sidebar_align == "none" && $altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('medium'); ?> <?php } //A bigger thumbnail if there is no sidebar ?>
					<?php if ($altop_sidebar_align != "none" && $altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('thumbnail'); ?> <?php } //Smaller thumbnail if there is a sidebar ?>
					
					<?php the_content('<p>' . __('Continue reading &raquo;', 'altop') . '</p>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'altop') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="postinfo"> 				
					<?php if ($altop_posts_author == "true") : ?> <?php echo _e('posted by&nbsp;', 'altop'); the_author(); ?> <?php endif ?>
					
					<?php edit_post_link(__('Edit', 'altop'), ' &int; ', ' &int; '); ?> <br />
					<?php the_tags(__('Tags:', 'altop') . ' ', ', ', '<br />'); ?>
					<?php printf(__('Filed under: %s', 'altop'), get_the_category_list(', ')); ?>
				</p>
        </div>
			
		</div>
		
		<div id="post-navigation">
			<div class="alignleft"><?php next_post_link(__("&laquo; %link", 'altop')) ?></div>
			<div class="alignright"><?php previous_post_link(__('%link &raquo;', 'altop')) ?></div>
		</div>
		
		<br clear="all" />
		</div>
		
	<?php if ($altop_work == '') { //Load the default comments.php 
		comments_template('',true);
	} ?>
	
	<?php if ($altop_work == "true") { //Load the Workaround for older IE-Versions
		comments_template('/workaround.php');
	} ?>

					<p class="post-tools">
					<?php if (comments_open() ) { ?>
						<img src="<?php echo bloginfo('template_directory'); ?>/images/small-rss.png" alt="Comments RSS" /> <?php printf(__("Subscribe to the <a href='%s'>Comments RSS</a>. <br />", "altop"), get_post_comments_feed_link()); ?>
					<?php } ?>
					
					<?php if (pings_open() ) { ?>
						<img src="<?php echo bloginfo('template_directory'); ?>/images/ping-small.png" alt="Trackback" /> <?php printf(__("Leave a <a href='%s'>trackback</a> from your site.", 'altop'), get_trackback_url(false));; ?><br /><small>Trackback URL: <?php echo get_trackback_url(); ?></small>
					<?php } ?>
						
					</p>
	
	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts found...', 'altop'); ?></p>

<?php endif; ?>
</div>
	</div>
					
<?php get_sidebar(); ?>
<?php get_footer(); ?>
