<?php
/*
Template Name: Page without Sidebar
*/
?> 

<?php get_header(); ?>

<?php
global $options;
foreach ($options as $value) 
		if (isset($value['id']))
			{ if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>
			
<div id="content" class="con_wide">
      <div id="content_inner">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<div class="post_content" id="post-<?php the_ID(); ?>">
									
				<h2><?php the_title(); ?></h2>
				<div class="postdate">
					<span class="postdate_day"><?php the_time(__('jS', 'altop')); ?></span><br />
					<span class="postdate_month"><?php the_time(__('F Y', 'altop')); ?></span><br />
					<img src="<?php echo bloginfo('template_directory'); ?>/images/comments.png" alt="Comments" align="bottom" /> <?php comments_popup_link(__('0 Comments', 'altop'), __('1 Comment', 'altop'), __('% Comments', 'altop'), '', __('Closed', 'altop') ); ?><br />
					
				</div>
				
				<div class="entry_wide"> 
				            <div class="entry_inner"> 

					<?php if ($altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('medium'); ?> <?php } ?>
					
					<?php the_content('<p>' . __('Continue reading &raquo;', 'altop') . '</p>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'altop') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="postinfo"> 				
					<?php if ($altop_posts_author == "true") : ?> <?php echo _e('posted by&nbsp;', 'altop'); the_author(); ?> <?php endif ?>
					
					<?php edit_post_link(__('Edit', 'altop'), ' &int; ', ' &int; '); ?> <br />
					<?php the_tags(__('Tags:', 'altop') . ' ', ', ', '<br />'); ?>
				</p>
				</div>
        </div>
			
			<br clear="all" />
			</div>

	<?php if (comments_open() && ($altop_work == "") ) { //Load the default comments.php
		comments_template('',true); 
	} ?>
	
	<?php if (comments_open() && ($altop_work == "true") ) { //Load the Workaound.php
		comments_template('/workaround.php'); 
	} ?>
			
	<?php endwhile; else: ?>
		<h2><?php _e('Sorry, nothing found.', 'altop'); ?></h2>
		<p><?php _e('Here is no content. Maybe it was moved or deleted. Try to search for some related content.', 'altop'); ?></p>
		

	<?php endif; ?>
</div>
			</div>			
					
<?php get_footer(); ?>