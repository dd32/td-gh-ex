<?php $arjunaOptions = arjuna_get_options(); ?>
<?php get_header(); ?>

<div class="contentArea">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="postHeader">
			<a href="<?php the_permalink() ?>" title="<?php _e('Permalink to', 'Arjuna'); ?> <?php the_title(); ?>"><h2 class="postTitle"><span><?php the_title(); ?></span></h2></a>
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
				<?php if(!$arjunaOptions['comments_hideWhenDisabledOnPosts'] || ( 0 != $post->comment_count || comments_open() || pings_open() )): ?>
				<a href="<?php comments_link(); ?>" class="postCommentLabel"><span><?php
					if (function_exists('post_password_required') && post_password_required()) {
						_e('Pass required', 'Arjuna');
					} elseif(0 == $post->comment_count && !comments_open() && !pings_open()) {
						_e('Comments off', 'Arjuna'); 
					} else {
						comments_number(__('No comments', 'Arjuna'), __('1 comment', 'Arjuna'), __('% comments', 'Arjuna'));
					}
				?></span></a>
				<?php endif; ?>
			</div></div>
		</div>
		<div class="postContent">
			<?php 
			if($arjunaOptions['excerpts_index'])
				the_excerpt();
			else the_content(__('continue reading...', 'Arjuna'));
			?>
		</div>
		<?php if($arjunaOptions['excerpts_index'] || $arjunaOptions['archives_includeCategories'] || $arjunaOptions['archives_includeTags']): ?>
		<div class="postFooter"><div class="r"></div>
			<div class="left">
			<?php if($arjunaOptions['archives_includeCategories']): ?>
				<span class="postCategories"><?php the_category(', '); ?></span>
			<?php endif; ?>
			<?php if($arjunaOptions['archives_includeTags'] && function_exists('the_tags')): ?>
				<span class="postTags"><?php
					if (get_the_tags()) the_tags('', ', ', '');
					else print '<span>'.__('<i>none</i>', 'Arjuna').'</span>';
				?></span>
			<?php endif; ?>
			</div>
			<?php if($arjunaOptions['excerpts_index']): ?>
				<a href="<?php the_permalink() ?>" class="btn btnReadMore"><span><?php _e('Read more', 'Arjuna'); ?></span></a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	<?php endwhile; ?>

	<?php
	if($arjunaOptions['pagination']) {
		arjuna_get_pagination(__('Previous Page', 'Arjuna'), __('Next Page', 'Arjuna'));
	} elseif(function_exists('wp_paginate')) {
		print '<div class="pagination">';
		wp_paginate();
		print '</div>';
	} elseif(function_exists('wp_pagenavi')) {
		print '<div class="pagination">';
		wp_pagenavi();
		print '</div>';
	} elseif(has_pages()) {
		print '<div class="pagination"><div>';
		arjuna_get_previous_page_link(__('Newer Entries', 'Arjuna'));
		arjuna_get_next_page_link(__('Older Entries', 'Arjuna'));
		print '</div></div>';
	}
	?>

	<?php else : ?>
  <p><?php _e('There is nothing here (yet).', 'Arjuna'); ?></p>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
