<?php
/**
 * @package BestCorporate
 * @since BestCorporate 1.4
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if (has_post_thumbnail()){?>
    
    <div class="thumbImg"><a href="<?php the_permalink() ?>"><?php echo the_post_thumbnail('thumbnail');?></a></div>
    <?php }?>
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>
    <div class="entry-meta">
      <?php best_corporate_posted_on(); ?>
      <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
      <?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'best_corporate' ) );
				if ( $categories_list && best_corporate_categorized_blog() ) :
			?>
      <span class="cat-links"> <?php printf( __( 'in %1$s', 'best_corporate' ), $categories_list ); ?> </span> <span class="sep"> | </span>
      <?php endif; // End if categories ?>
      <?php endif; // End if 'post' == get_post_type() ?>
      <?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
      <span class="comments-link">
      <?php comments_popup_link( __( 'Leave a comment', 'best_corporate' ), __( '1 Comment', 'best_corporate' ), __( '% Comments', 'best_corporate' ) ); ?>
      </span> <span class="sep"> | </span>
      <?php endif; ?>
      <?php edit_post_link( __( 'Edit', 'best_corporate' ), '<span class="edit-link">', '</span>' ); ?>
    </div>
    <!-- .entry-meta -->
    </header>
    <!-- .entry-header -->
    <div class="entry-content">
      <?php the_content(); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'best_corporate' ), 'after' => '</div>' ) ); ?>
    </div>
    <!-- .entry-content -->
    <footer class="entry-meta">
      <?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'best_corporate' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! best_corporate_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'best_corporate' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'best_corporate' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'best_corporate' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'best_corporate' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>
      <?php edit_post_link( __( 'Edit', 'best_corporate' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
    <!-- .entry-meta -->
</article>
<!-- #post-<?php the_ID(); ?> -->
