<?php get_header();?>

	<div id="middle">

		<div id="container">
			<div id="content">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post">
					
						<div class="title"><h1><a href="<?php the_permalink() ?>" target="_self"><?php the_title(); ?></a></h1></div>
						
						<div class="ptb_lt"><div class="ptb_lb"><div class="ptb_rt"><div class="ptb_rb">
							<?php _e("Posted by: "); ?><?php the_author() ?><?php _e(" in "); ?><?php the_category(',') ?><?php _e(" on "); ?><?php the_time('F jS, Y') ?>
						</div></div></div></div>
						
						<?php the_content(__('(more...)')); ?>
						<div class="clear"></div>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

						<div class="permalink">
						<div class="ptb_lt"><div class="ptb_lb"><div class="ptb_rt"><div class="ptb_rb">
							<p class="pleft"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
							<p class="pright"><span class="comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></span></p>
							<div class="clear"></div>
						</div></div></div></div>
						</div>
				
						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry','','.'); ?>
						
						<?php comments_template(); ?>
					
				</div>
				<?php endwhile; else: ?>
				<div class="post">
					<div class="ptb_t"><div class="ptb_b"><div class="ptb_l"><div class="ptb_r"><div class="ptb_lt"><div class="ptb_rt"><div class="ptb_lb"><div class="ptb_rb">
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					</div></div></div></div></div></div></div></div>
				</div>
				<?php endif; ?>
			
				
				<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
				
				
			</div><!-- #content-->
		</div><!-- #container-->

		<div class="sidebar sl"><div class="sb_padd">
			<?php get_sidebar(); ?>
		</div></div><!-- .sidebar.sl -->

	</div><!-- #middle-->
	
<?php get_footer(); ?>
