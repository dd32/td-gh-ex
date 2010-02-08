<?php $arjunaOptions = arjuna_get_options(); ?>
<?php get_header(); ?>

<div class="contentArea">
	<?php if (have_posts()) : ?>
	<h3 class="contentHeader"><?php 
		if (is_category()) { 
			printf(__('Browsing Posts in <em>%s</em>', 'Arjuna'), single_cat_title(NULL, false));
		} elseif( is_tag() ) {
			printf(__('Browsing Posts tagged <em>%s</em>', 'Arjuna'), single_tag_title(NULL, false));
		} elseif (is_day()) {
			printf( __('Browsing Posts published on %s', 'Arjuna'), get_the_time(get_option('date_format')) );
		} elseif (is_month()) {
			printf( __('Browsing Posts published in %s', 'Arjuna'), get_the_time(__('F, Y', 'Arjuna')) );
		} elseif (is_year()) {
			printf( __('Browsing Posts published in %s', 'Arjuna'), get_the_time(__('Y', 'Arjuna')) );
		} elseif (is_author()) {
			$currentAuthor = $wp_query->get_queried_object();
			printf(__('Browsing Posts published by <em>%s</em>', 'Arjuna'), $currentAuthor->display_name?$currentAuthor->display_name:$currentAuthor->nickname);
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { 
			_e('Blog Archives', 'Arjuna');
		} ?>
	</h3>
	
	<?php while (have_posts()) : the_post(); ?>
	<div class="post">
		<div class="postHeader">
			<h2 class="postTitle"><span><a href="<?php the_permalink() ?>" title="<?php _e('Permalink to', 'Arjuna'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
			<div class="bottom"><div>
				<span class="postDate"><?php the_time(get_option('date_format')); ?><?php
					//Time
					if($arjunaOptions['postsShowTime']) {
						print _e(' at ', 'Arjuna'); the_time(get_option('time_format'));
					}
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
		<div class="postFooter"><div class="r"></div>
			<div class="left">
				<span class="postCategories"><?php the_category(', '); ?></span>
				<?php if ( function_exists('the_tags') ): ?>
				<span class="postTags"><?php
					if (get_the_tags()) the_tags('', ', ', '');
					else print '<span>'.__('<i>none</i>', 'Arjuna').'</span>';
				?></span>
				<?php endif; ?>
			</div>
			<a href="<?php the_permalink() ?>" class="postReadMore"><span><?php _e('Read more', 'Arjuna'); ?></span></a>
		</div>
	</div>
	<?php endwhile; ?>

	<?php
	if(function_exists('wp_paginate')) { ?>
		<div class="pagination"><div><?php wp_paginate(); ?></div></div>
	<?php	} elseif(function_exists('wp_pagenavi')) { ?>
		<div class="pagination"><?php wp_pagenavi(); ?></div>
	<?php } elseif(has_pages()) {	?>
		<div class="pagination"><div>
			<?php arjuna_get_previous_page_link(__('Newer Entries', 'Arjuna')); ?>
			<?php arjuna_get_next_page_link(__('Older Entries', 'Arjuna')); ?>
		</div></div>
	<?php } ?>

	<?php else : ?>
  <p><?php _e('There is nothing here (yet).', 'Arjuna'); ?></p>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
