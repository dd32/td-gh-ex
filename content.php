<?php
/**
 * @package B3
 */
?>

<div <?php b3_content_wrap_class(); ?>>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ('post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php b3_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content clearfix">
		<?php
			if ('Y' == b3_option('excerpt')) {
				if (b3_option('post_thumbnail')) {
					the_post_thumbnail('thumbnail', array('class' => 'thumbnail attachment-thumbnail alignleft'));
				}
				the_excerpt(); ?>
	 <?php
			}
			else {
				the_content( __('Continue reading <span class="meta-nav">&rarr;</span>', 'b3') );
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __('Pages:', 'b3'),
					'after'  => '</div>',
				));
			}
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta clearfix">
		<?php if ('post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __(', ', 'b3') );
				if ( $categories_list && b3_categorized_blog() ) :
			?>
			<span class="cat-links"><span class="glyphicon glyphicon-folder-open"></span> <?php echo $categories_list; ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				$tags_list = get_the_tag_list('', ', ' );
				if ( $tags_list ) :
			?>
			<span class="tag-links"><span class="glyphicon glyphicon-tag"></span>
				<?php echo $tags_list; ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __('Leave a comment', 'b3'), __('1 Comment', 'b3'), __('% Comments', 'b3') ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( '<span class="glyphicon glyphicon-pencil"></span> ' . __('Edit', 'b3'), '<span class="edit-link">', '</span>'); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
</div>
