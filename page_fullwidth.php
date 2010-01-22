<?php
/*
Template Name: Full Page (No Sidebar)
*/
?>
<?php get_header(); ?>

<div class="contentArea contentAreaFull">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="postHeader">
			<h2 class="postTitle"><span><a href="<?php the_permalink() ?>" title="<?php _e('Permalink to', 'Arjuna'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
			<div class="bottom"><div>
				<span class="postDate"><?php the_time(__('F jS, Y', 'Arjuna')); ?></span>
				<a href="<?php comments_link(); ?>" class="postCommentLabel"><span><?php
					if (function_exists('post_password_required') && post_password_required()) {
						_e('Pass required', 'Arjuna');
					} elseif(0 == $post->comment_count && !comments_open() && !pings_open()) {
						_e('Comments off', 'Arjuna'); 
					} else {
						comments_number(__('No comments', 'Arjuna'), __('1 comment', 'Arjuna'), __('% comments', 'Arjuna'));
					}
				?></span></a>
			</div></div>
		</div>
		<div class="postContent">
			<?php the_content(__('continue reading...', 'Arjuna')); ?>
		</div>
		<div class="postLinkPages"><?php wp_link_pages('before=<strong>'.__('Pages:', 'Arjuna').'</strong>&pagelink=<span>'.__('Page %', 'Arjuna').'</span>'); ?></div>
		<div class="postFooter"><div class="r"></div>
			<?php edit_post_link(__('Edit', 'Arjuna'),'<span class="postEdit">','</span>'); ?>
		</div>
	</div>
	<div class="postComments" id="comments">
		<?php comments_template(); ?>
	</div>
	<?php endwhile; ?>


	<?php else : ?>
  <p><?php _e('There is nothing here.', 'Arjuna'); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
