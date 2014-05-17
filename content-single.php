<?php
/**
 * @package A Piece Of Cake
 * @since available since Release 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php apoc_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="apoc-featured-image">';
			the_post_thumbnail( 'apoc-thumbnail', array( 'class' => 'aligncenter' ) );
		echo '</div>';
	}
	?>

	<div class="clear"></div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'apoc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$apoc_category_list = get_the_category_list( __( ', ', 'apoc' ) );

			/* translators: used between list items, there is a space after the comma */
			$apoc_tag_list = get_the_tag_list( '', __( ', ', 'apoc' ) );

			if ( ! apoc_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $apoc_tag_list ) {
					$apoc_meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'apoc' );
				} else {
					$apoc_meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'apoc' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $apoc_tag_list ) {
					$apoc_meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'apoc' );
				} else {
					$apoc_meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'apoc' );
				}

			} // end check for categories on this blog

			printf(
				$apoc_meta_text,
				$apoc_category_list,
				$apoc_tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'apoc' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->