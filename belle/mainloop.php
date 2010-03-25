<?php while (have_posts()) : the_post(); ?>
			<div class="post">
			   <div class="post-title">
			    <div class="post-date"><span class="post-day"><?php the_time('j'); ?></span><span class="post-month"><?php the_time('M'); ?></span></div>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-info"> <?php the_author() ?> | Category: <span class="entry-categories"><?php the_category(', ') ?></span> | <span class="entry-comments"><?php comments_popup_link(__('No Comments',belle), __('1 Comment',belle), __('% Comments',belle)); ?> </span></div>
				<div style="clear:both;"></div>
			   </div>
			   <div class="post-tags"><?php the_tags(); ?></div>
				<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;',belle)); ?>
				</div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<span class="previous-entries"><?php next_posts_link(__('&laquo; Older Entries',belle)) ?></span>
			<span class="next-entries"><?php previous_posts_link(__('Newer Entries &raquo;',belle)) ?></span>
		</div>

	