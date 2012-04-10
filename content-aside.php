<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package BestCorporate
 * @since BestCorporate 1.2
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'best_corporate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h1>
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
  <?php if ( is_search() ) : // Only display Excerpts for search pages ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'best_corporate' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'best_corporate' ), 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
  <?php endif; ?>
</article>
<!-- #post-<?php the_ID(); ?> -->
