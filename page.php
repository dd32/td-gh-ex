<?php get_header(); ?>

	<!-- start of Content part -->
	<div id="content" class="grid_8">
		<!-- start of Single post -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="box single-post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
<?php
	$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
	if ($children) { ?>
<h3><?php _e("Subpages", "5years"); ?></h3>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>
			<div class="box">
				<div class="singlepostinfo">
					<strong><?php _e("Published:", "5years"); ?></strong> <?php the_time(__('F jS, Y', "5years")); ?> <?php _e("at", "5years"); ?> <?php the_time(__('G:i', "5years")); ?><br/>
					<strong><?php _e("Categories:", "5years"); ?></strong> <?php the_category(', '); ?><br/>
<?php the_tags(__('<strong>Tags:</strong> ', '5years'), ', ', ''); ?><br />
<?php if (function_exists('the_ratings')) { the_ratings(); echo "<br />"; } ?>
<?php if (function_exists('sociable_html')) { echo sociable_html(); } ?>
<?php edit_post_link(__('[ Edit this entry ]', '5years'),'',''); ?>
				</div>
			</div>
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
