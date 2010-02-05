<?php
/*
Template Name: Full Page (No Sidebar)
*/
?>
<?php $arjunaOptions = arjuna_get_options(); ?>
<?php get_header(); ?>

<div class="contentArea contentAreaFull">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="postHeader">
			<h1 class="postTitle"><span><a href="<?php the_permalink() ?>" title="<?php _e('Permalink to', 'Arjuna'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></span></h1>
			<div class="bottom"><div>
				<span class="postDate"><?php the_time(get_option('date_format')); ?><?php
					//Time
					if($arjunaOptions['postsShowTime'])
						print _e(' at ', 'Arjuna'); the_time(get_option('time_format'));
				?></span>
				<?php if($arjunaOptions['postsShowAuthor']): ?>
				<span class="postAuthor"><?php the_author_posts_link(); ?></span>
				<?php endif; ?>
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
			<a href="<?php print get_edit_post_link( $post->ID ) ?>" class="postEdit"><span><?php _e('Edit in Admin', 'Arjuna'); ?></span></a>
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
