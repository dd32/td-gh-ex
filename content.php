<?php
/**
* The default template for displaying content. Used for both single and index/archive/search.

 * @package rootstrap
 */
?>


<div class="col-2 left-meta">
	<div class="postdate">
		<?php the_time('M'); ?>
		<span><?php the_time('d'); ?></span>
	</div>
	<div class="postcoment"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></div>
</div>
<div class="col-10">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
	<div class="post-thumb-home">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();	
		} ?>
	</div>
		<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rootstrap_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search and Archive Pages ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'rootstrap' ) );
				if ( $categories_list && rootstrap_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'rootstrap' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'rootstrap' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'rootstrap' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'rootstrap' ), __( '1 Comment', 'rootstrap' ), __( '% Comments', 'rootstrap' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'rootstrap' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	
</article></div>
<!-- #post-## -->
