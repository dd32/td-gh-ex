<?php
/**
 * Template part post content
 *
 * @package Fmi
 */

?>
<article <?php post_class( 'entry' ); ?>>
  
    <?php
    if ( has_post_thumbnail() ) {
    ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail();?>
    </div>
    <?php
    }
    ?>

  <div class="post-content">

      <div class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </div>

      <?php
      $post_date = get_theme_mod( 'post_date', 1 );
      $post_author = get_theme_mod( 'post_author', 1 );
      $post_comments = get_theme_mod( 'post_comments', 1 );
      if ( $post_date || $post_author || $post_comments ) {
      ?>
      <div class="entry-meta">
        <?php
        if ( $post_date || $post_author ) {
        ?>
        <div class="entry-meta-inner">
          <?php
          if ( $post_date ) { vs_get_meta_date(); }
          if ( $post_author ) { vs_get_meta_author(); }
          ?>
        </div>
        <?php
        }
        if ( $post_comments ) {
        ?>
        <div class="entry-meta-inner">
          <?php
          if ( $post_comments ) { vs_get_meta_comments(); }
          ?>
        </div>
        <?php
        }
        ?>
      </div>
      <?php
      }
      ?>

    <div class="entry-content">
      <?php
      the_content();

      wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fmi' ),
        'after' => '</div>',
      ));
      ?>
    </div>

      <?php
      $post_categorys = get_theme_mod( 'post_categorys', 1 );
      $post_tags = get_theme_mod( 'post_tags', 1 );
      if ( $post_categorys || $post_tags ) {
      ?>
      <div class="entry-details">
        <div class="entry-details-inner">
          <?php
          if ( $post_categorys ) { vs_get_meta_categorys(); }
          if ( $post_tags ) { vs_get_meta_tags(); }
          ?>
        </div>
      </div>
      <?php
      }
      ?>
  </div>
</article>
