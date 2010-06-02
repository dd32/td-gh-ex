<?php get_header();?>

	<div id="middle">

		<div id="container">
			<div id="content">
				
				<?php if (have_posts()) : ?>
				<div class="post">
						<h3>Search Results</h3>					
				</div>
				
				<?php next_posts_link('&laquo; Previous Entries') ?>
				<?php previous_posts_link('Next Entries &raquo;') ?>

				<?php while (have_posts()) : the_post(); ?>
				<div class="post">
					<div class="title"><h1><a href="<?php the_permalink() ?>" target="_self"><?php the_title(); ?></a></h1></div>
						<div class="ptb_lt"><div class="ptb_lb"><div class="ptb_rt"><div class="ptb_rb">
							<?php _e("Posted by: "); ?><?php the_author() ?><?php _e(" in "); ?><?php the_category(',') ?><?php _e(" on "); ?><?php the_time('F jS, Y') ?>
						</div></div></div></div>
						
						<?php the_content(__('(more...)')); ?>
						<div class="clear"></div>

						<div class="permalink">
						<div class="ptb_lt"><div class="ptb_lb"><div class="ptb_rt"><div class="ptb_rb">
							<p class="pleft"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
							<p class="pright"><span class="comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></span></p>
							<div class="clear"></div>
						</div></div></div></div>
						</div>
				
				</div>
				<?php endwhile; ?>
					<?php next_posts_link('&laquo; Previous Entries') ?>
					<?php previous_posts_link('Next Entries &raquo;') ?>
				<?php else : ?>
				<div class="post">
					
						<div class="title"><h1>Nothing found. Try again.</h1></div>
				</div>
				<?php endif; ?>
				
			</div><!-- #content-->
		</div><!-- #container-->

		<div class="sidebar sl"><div class="sb_padd">
			<?php get_sidebar(); ?>
		</div></div><!-- .sidebar.sr -->

	</div><!-- #middle-->
	
<?php get_footer(); ?>