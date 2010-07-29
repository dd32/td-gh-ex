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
			
			
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post_content" id="post-<?php the_ID(); ?>">
									
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Link to %s', 'altop'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				

				<div class="postdate">
					<span class="postdate_day"><?php the_time(__('jS', 'altop')); ?></span><br />
					<span class="postdate_month"><?php the_time(__('F Y', 'altop')); ?></span><br />					
					<img src="<?php echo bloginfo('template_directory'); ?>/images/comments.png" alt="Comments" align="bottom" /> <?php comments_popup_link(__('0 Comments', 'altop'), __('1 Comment', 'altop'), __('% Comments', 'altop'), '', __('Closed', 'altop') ); ?><br />
					
					<?php if (is_sticky()) { ?> 
						<img src="<?php echo bloginfo('template_directory'); ?>/images/sticky.png" alt="Sticky Post" />
					 <?php } ?>
				</div>
				
				<?php if ($altop_sidebar_align == "none") { ?> <div class="entry_wide"> <?php } //Wide content and NO sidebar ?>
				<?php if ($altop_sidebar_align != "none") { ?> <div class="entry"> <?php } // content AND sidebar ?>
				<div class="entry_inner"> 

					<?php if ($altop_sidebar_align == "none" && $altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('medium'); ?> <?php } //A bigger thumbnail if there is no sidebar ?>
					<?php if ($altop_sidebar_align != "none" && $altop_post_thumbnail == "true") { ?> <?php the_post_thumbnail('thumbnail'); ?> <?php } //Smaller thumbnail if there is a sidebar ?>
					
					
					<?php the_content(__("Continue reading &rsaquo;", 'altop')); ?>
				
				<p class="postinfo"> 				
					<?php if ($altop_posts_author == "true") : ?> <?php echo _e('posted by&nbsp;', 'altop'); the_author(); ?> <?php endif ?>
				
					<?php edit_post_link(__('Edit', 'altop'), ' &int; ', ' &int; '); ?> <br />
					<?php the_tags(__('Tags:', 'altop') . ' ', ', ', '<br />'); ?>
					<?php printf(__('Filed under: %s', 'altop'), get_the_category_list(', ')); ?>
				</p>
				</div>
        </div>
			
			<br clear="all" />
			</div>

		<?php endwhile; ?>
		
		<div id="post-navigation">
			<div class="alignleft"><?php next_posts_link(__("&laquo;&lsaquo; Older Entries", 'altop')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &rsaquo;&raquo;', 'altop')) ?></div>
		</div>

	<?php else : ?>

		<h2><?php _e('Nothing found', 'altop'); ?></h2>
		<p><?php _e('Sorry, but here is no content... Not yet... Try again later!', 'altop'); ?></p>
		

	<?php endif; ?>
</div>

	</div>

<?php get_sidebar(); ?>
<br clear="all" />
<?php get_footer(); ?>
