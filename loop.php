<article id="post-<?php the_ID(); ?>" <?php post_class('blog-view'); ?>>

<div class="entry-header">
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>">
		<?php
			if ( the_title( '', '', false ) != '' ){
				echo the_title();
			}
			else {
				echo __('Untitled', 'asteroid');
			}
		?>
	</a></h2>
</div>

<?php if ( ( asteroid_option('ast_blog_date') == 1 ) && ( get_post_type() == 'post' ) ) : ?>
	<div class="entry-date"><?php the_time(get_option('date_format')); ?></div>
<?php endif; ?>

<div class="entry-meta-top">
	<?php if ( asteroid_option('ast_blog_author') == 1 ) : ?>
		<span class="entry-author"><?php _e('Posted by', 'asteroid'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
	<?php endif; ?>

	<span class="entry-categories"><?php the_category(' '); ?></span>
</div>

<div class="entry-content">

	<?php if ( ( asteroid_option('ast_post_display_type') == 1 ) && ( (get_post_type() == 'post') || (get_post_type() == 'page') ) ) : ?>

		<?php if ( asteroid_option('ast_excerpt_thumbnails') == 1 ) : ?>
			<?php if ( has_post_thumbnail()) : ?>
				<a class="entry-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail') ; ?></a>
			<?php endif ; ?>
		<?php endif ; ?>

		<div class="entry-excerpt"><?php the_excerpt(); ?></div>

	<?php else : ?>

		<?php the_content(); ?>

	<?php endif ; ?>

	<?php wp_link_pages( array(
		'before'           => '<div class="page-nav">' . __('<span>Pages</span>', 'asteroid'),
		'after'            => '</div>',
		'link_before'      => '<span>',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'nextpagelink'     => __('Next page', 'asteroid'),
		'previouspagelink' => __('Previous page', 'asteroid'),
		'pagelink'         => '%',
		'echo'             => 1 )
		);
	?>

</div>

<?php if ( ( asteroid_option('ast_post_display_type') == 1 ) && ( (get_post_type() == 'post') || (get_post_type() == 'page') ) ) : ?>
	<div class="read-more">
		<a href="<?php the_permalink(); ?>" class="read-more-button">
			<?php echo ( apply_filters(	'ast_filter_read_more_button', __('Read More', 'asteroid') ) ); ?>
		</a>
	</div>

	<!-- Widgets: Below Excerpts -->
	<?php if ( is_active_sidebar('widgets_below_excerpts') )  : ?>
		<div id="widgets-wrap-below-excerpts"><?php dynamic_sidebar('widgets_below_excerpts'); ?></div>
	<?php endif ; ?>

<?php else : ?>
	<div class="entry-tags"><?php the_tags(); ?></div>
<?php endif ; ?>

<?php if ( ( asteroid_option('ast_blog_comment_links') == 1 ) && ( (get_post_type() == 'post') || (get_post_type() == 'page') ) ) : ?>
	<div class="blog-comment-links">
		<a class="comment-count" href="<?php the_permalink(); ?>#comments-wrap"><?php comments_number(); ?></a>
		<a class="reply-link" href="<?php the_permalink(); ?>#comments-wrap"><?php _e('Leave a Reply', 'asteroid'); ?></a>
	</div>
<?php endif ; ?>
</article>