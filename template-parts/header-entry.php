<?php
/**
 * Template for displaying entry headers
 *
 * @package Bidnis
 * @since 1.2.0
 */
?>
<header class="entry-header">
  <?php
  if ( is_single() ) {
    printf(
      '<h1>%s</h1>',
      get_the_title() === '' ? __( 'Untitled post', 'bidnis' ) : get_the_title()
    );
  } else {
    printf(
      '<h3><a href="%2$s">%1$s</a></h3>',
      get_the_title() === '' ? __( 'Untitled post', 'bidnis' ) : get_the_title(), 
      esc_url( get_permalink() )
    );
  }
  ?>

  <div class="entry-meta">
    <?php
    if( get_theme_mod( 'entry_meta_author', true ) ) {
      printf(
        '<span class="entry-meta-author"><a href="%2$s">%1$s</a></span>',
        get_the_author(),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
      );
    }
    ?>

    <?php
    if( get_theme_mod( 'entry_meta_date', true ) ) {
      printf(
        '<span class="entry-meta-date"><a href="%1$s">%2$s</a></span>',
        esc_url( get_permalink() ),
        get_the_date()
      );
    }
    ?>

    <?php
    $bidnis_comment_count = get_comments_number();
    if ( $bidnis_comment_count && comments_open() && get_theme_mod( 'entry_meta_comments', true ) ) {
      printf(
        '<span class="entry-meta-comments"><a href="%2$s#comments">%1$s</a></span>',
        $bidnis_comment_count,
        esc_url( get_permalink() )
      );
    }
    ?>

    <?php
    if ( wp_attachment_is_image() ) {
      $metadata = wp_get_attachment_metadata();

      printf( '<span class="entry-meta-image-size">%1$sx%2$s</span>',
        absint( $metadata['width'] ),
        absint( $metadata['height'] )
      );
    }
    ?>

    <?php
    if ( has_post_format() && get_theme_mod( 'entry_meta_post_format', true ) ) {
      $bidnis_post_format = get_post_format();
      printf(
        '<span class="entry-meta-post-format"><a href="%1$s">%2$s</a></span>',
        esc_url( get_post_format_link(  $bidnis_post_format ) ),
        get_post_format_string( $bidnis_post_format )
      );
    }
    ?>

    <?php
    if ( has_category() && get_theme_mod( 'entry_meta_categories', true ) ): ?>
      <span class="entry-meta-categories">
        <?php the_category( ', ' ); ?>
      </span><!-- .entry-meta-categories -->
    <?php endif; ?>

    <?php
    edit_post_link(
      sprintf(
        '%1$s<span class="screen-reader-text">%1$s "%2$s"</span>',
        __( 'Edit', 'bidnis' ),
        get_the_title()
      )
    );
    ?>
  </div><!-- .entry-meta -->

</header><!-- .entry-header -->