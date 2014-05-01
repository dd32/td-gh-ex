<?php
/**
 * @package A Piece Of Cake
 * @since available since Release 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php apoc_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>
	</header><!-- .entry-header -->
	
	<?php 
	if ( has_post_thumbnail() ) {
		echo '<div class="apoc-featured-image">';
			the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) );
		echo '</div>';
	}
	?>

	<div class="clear"></div>
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'apoc' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'apoc' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php 
		if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
			/* translators: used between list items, there is a space after the comma */
			$apoc_categories_list = get_the_category_list( __( ', ', 'apoc' ) );
			if ( $apoc_categories_list && apoc_categorized_blog() ) :
			?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'apoc' ), $apoc_categories_list ); ?>
				</span>
			<?php endif; // End if categories ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$apoc_tags_list = get_the_tag_list( '', __( ', ', 'apoc' ) );
			
			if ( $apoc_tags_list ) :
			?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'apoc' ), $apoc_tags_list ); ?>
				</span>
			<?php endif; // End if $apoc_tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'apoc' ), __( '1 Comment', 'apoc' ), __( '% Comments', 'apoc' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'apoc' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->