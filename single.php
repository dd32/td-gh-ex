<?php get_header(); ?>

	<!-- start of Content part -->
	<div id="content" class="grid_8">
		<!-- start of Single post -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="box single-post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>

			<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', '5years') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
			<div class="box">
				<div class="singlepostinfo">
					<strong><?php _e("Published:", "5years"); ?></strong> <?php the_time(__('F jS, Y', '5years')); ?> <?php _e("at", "5years"); ?> <?php the_time(__('G:i', "5years")); ?><br/>
					<strong><?php _e("Categories:", "5years"); ?></strong> <?php the_category(', '); ?><br/>
<?php the_tags(__('<strong>Tags:</strong> ', '5years'), ', ', ''); ?><br />
<?php if (function_exists('the_ratings')) { the_ratings(); echo "<br />"; } ?>
<?php if (function_exists('sociable_html')) { echo sociable_html(); } ?>
<?php edit_post_link(__('[ Edit this entry ]', '5years'),'',''); ?>
				</div>
			</div>

			<!-- start of Pagination -->
			<div class="pagination">
				<div class="levo" title="<?php _e("Go to previous post", "5years"); ?>"><?php previous_post_link('&larr; %link') ?></div><div class="desno" title="<?php _e("Go to next post", "5years"); ?>"><?php next_post_link('%link &rarr;') ?></div>
			</div>
			<!-- end of Pagination -->
			<div class="clear"></div>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', '5years'); ?></p>

	<?php endif; ?>
		<!-- end of Single post -->

		<div class="clear"></div>

	</div>
	<!-- end of Content part -->

<?php get_footer(); ?>
